@php
    use App\Models\Setting;
    $setting = Setting::where('Is_deleted', 0)
         ->orderBy('id', 'desc')->take(1)->get();
       
@endphp
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    @foreach ($setting as $item)
      <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="{{ $item->getLogo()}}" alt="">
          <h1>BLOG</h1>
      </a>
      @endforeach

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
          <ul>
              <li><a href="index.html" class="active">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="pricing.html">Pricing</a></li>
              <li class="dropdown"><a href="#"><span>Drop Down</span> <i
                          class="bi bi-chevron-down dropdown-indicator"></i></a>
                  <ul>
                      <li><a href="#">Drop Down 1</a></li>
                      <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                  class="bi bi-chevron-down dropdown-indicator"></i></a>
                          <ul>
                              <li><a href="#">Deep Drop Down 1</a></li>
                              <li><a href="#">Deep Drop Down 2</a></li>
                              <li><a href="#">Deep Drop Down 3</a></li>
                              <li><a href="#">Deep Drop Down 4</a></li>
                              <li><a href="#">Deep Drop Down 5</a></li>
                          </ul>
                      </li>
                      <li><a href="#">Drop Down 2</a></li>
                      <li><a href="#">Drop Down 3</a></li>
                      <li><a href="#">Drop Down 4</a></li>
                  </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
              <li><a class="get-a-quote" href="get-a-quote.html">Get a Quote</a></li>
          </ul>
      </nav><!-- .navbar -->
  </div>
</header>