<!DOCTYPE html>
<html>
<head>
    <title>Resto App</title>
</head>
<body>
    <h1>Thank you</h1>
    <h4>Reservation Informations</h4>
    <p>Reservation has been completed for {{ $details['res_date'] }}</p>
    <table style="text-align: left">
        <tr>
            <th>Name</th>
            <th>:</th>
            <td>{{ $details['first_name'] }} {{ $details['last_name'] }}</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <th>:</th>
            <td>{{ $details['tel_number'] }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <th>:</th>
            <td>{{ $details['email'] }}</td>
        </tr>
        <tr>
            <th>Number of guest</th>
            <th>:</th>
            <td>{{ $details['guest_number'] }}</td>
        </tr>
        <tr>
            <th>Table</th>
            <th>:</th>
            <td>{{ $details['table'] }}</td>
        </tr>
    </table>
    <p>Thank you</p>
</body>
</html>