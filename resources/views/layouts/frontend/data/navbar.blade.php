 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper">
     <div class="offcanvas__close">+</div>
     <ul class="offcanvas__widget">
         <li><span class="icon_search search-switch"></span></li>
         <li><a href="#"><span class="icon_bag_alt"></span>
                 <div class="tip">2</div>
             </a></li>
     </ul>
     <div class="offcanvas__logo">
         <a href="{{ url('/') }}"><img src="{{ asset('ashion') }}/img/logo.png" alt=""></a>
     </div>
     <div id="mobile-menu-wrap"></div>
 </div>
 <!-- Offcanvas Menu End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-3 col-lg-2">
                 <div class="">

                    <style>
                        .logo-navbar-front-end {
                            max-width: 200px;
                        }
                    </style>

                     <h1 class="logo-navbar-front-end"><a href="{{ route('home') }}"><img
                                 src="{{ asset('me/img/logo/logo2.webp') }}" class="img-fluid"
                                 alt="Logo (Panjang) Percetakan Buya Barokah"></a></h1>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-7 text-center">
                 <nav class="header__menu">
                     <ul>
                         <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a>
                         </li>
                         <li class="{{ request()->is('product*') ? 'active' : '' }}"><a
                                 href="{{ route('product.index') }}">Shop</a></li>
                         <li class="{{ request()->is('category*') ? 'active' : '' }}"><a
                                 href="{{ route('category.index') }}">Category</a></li>
                         @auth
                             <li class="{{ request()->is('category*') ? 'active' : '' }}"><a href="#"><i
                                         class="fa fa-angle-down"></i> {{ auth()->user()->name }}</a>
                                 <ul class="dropdown">
                                     {{-- jika yang login adalah admin, maka tampilkan menu dashboard --}}
                                     @if (auth()->user()->id == '1')
                                         <li><a href="{{ route('master.category.index') }}">Dashboard</a></li>
                                     @endif

                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <li>
                                             <a href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                 Logout
                                             </a>
                                         </li>
                                     </form>
                                 </ul>
                             </li>
                         @else
                             <li><a href="{{ route('login') }}">Login</a></li>
                         @endauth
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__right">
                     <ul class="header__right__widget">
                         <li><span class="icon_search search-switch"></span></li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="canvas__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->
