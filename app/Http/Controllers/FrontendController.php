<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('menus')->get();
        return view('frontend.index', compact('categories'));
    }

    public function order(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $request->session()->put('menu', $menu);
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservation.step-one', compact('menu', 'reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required'],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return redirect()->route('reservation.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation) {
            return Carbon::parse($value->res_date)->format('Y-m-d') == Carbon::parse($reservation->res_date)->format('Y-m-d');
        })->pluck('table_id');
        $tables = Table::where('status', 'available')
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $res_table_ids)->get();
        return view('reservation.step-two', compact('reservation', 'tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $table = Table::findOrFail($request->table_id);
        $table->update(['status' => 'pending']);
        // dd(env('APP_URL') . Storage::url($request->session()->get('menu')->image));
        $details = [
            'first_name' => $request->session()->get('reservation')->first_name,
            'last_name' => $request->session()->get('reservation')->last_name,
            'email' => $request->session()->get('reservation')->email,
            'tel_number' => $request->session()->get('reservation')->tel_number,
            'guest_number' => $request->session()->get('reservation')->guest_number,
            'table' => $table->name,
            'res_date' => $request->session()->get('reservation')->res_date,
            'menu_img' => env('APP_URL') . Storage::url($request->session()->get('menu')->image)
        ];

        Mail::to($request->session()->get('reservation')->email)->send(new ReservationMail($details));

        $request->session()->forget('reservation');
        $request->session()->forget('menu');

        return redirect()->route('index')->with('success', 'Thank you');
    }
}
