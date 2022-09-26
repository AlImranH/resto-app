<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{ route('index') }}">Restaurantly</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('index') }}/#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#about">About</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#events">Events</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#gallery">Gallery</a></li>
          
          <li><a class="nav-link scrollto" href="{{ route('index') }}/#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="{{ route('index') }}/#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header>