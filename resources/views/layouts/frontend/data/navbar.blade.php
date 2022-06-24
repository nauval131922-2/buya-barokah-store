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
                     <h1 class="title-logo">Anime Store</h1>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-7 text-center">
                 <nav class="header__menu">
                     <ul>
                         <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                         <li class="{{ request()->is('product*') ? 'active' : '' }}"><a href="{{ route('product.index') }}">Shop</a></li>
                         <li class="{{ request()->is('category*') ? 'active' : '' }}"><a href="#">Category</a>
                             <ul class="dropdown">
                                 <li><a href="./product-details.html">Product Details</a></li>
                                 <li><a href="./shop-cart.html">Shop Cart</a></li>
                                 <li><a href="./checkout.html">Checkout</a></li>
                                 <li><a href="{{ route('category.index') }}">Semua Kategori</a></li>
                             </ul>
                         </li>
                         <li><a href="./contact.html">Contact</a></li>
                         <li><a href="./contact.html">Donate</a></li>
                         @auth
                          <li class="{{ request()->is('category*') ? 'active' : '' }}"><a href="#"><i class="fa fa-angle-down"></i> {{ auth()->user()->name }}</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('transaction.index') }}">Riwayat Belanja</a></li>
                                <li><a href="{{ route('account.index') }}">Pengaturan Akun</a></li>
                                <li><a href="{{ route('category.index') }}">Logout</a></li>
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
                         <li><a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
                             <div class="tip">
                                 {{ $totalCart ?? 0 }}
                             </div>
                         </a></li>
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