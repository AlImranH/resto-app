<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Menu</h2>
        <p>Check Our Tasty Menu</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="menu-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($categories as $category)
            <li data-filter=".filter-{{ strtolower($category->name) }}">{{ $category->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($categories as $category)
        @foreach ($category->menus as $menu)
        <div class="col-lg-6 menu-item filter-{{ strtolower($category->name) }}">
          <img src="{{ Storage::url($menu->image) }}" class="menu-img" alt="{{ $menu->name }}">
          <div class="menu-content">
            <a href="#">{{ $menu->name }}</a><span>${{ $menu->price }}</span>
          </div>
          <div class="menu-ingredients">
            {!! $menu->description !!}
          </div>
          <a href="{{ route('order', $menu->id) }}" class=" mx-2">Order</a>
        </div>
        @endforeach
        
        @endforeach

      </div>

    </div>
  </section>