<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li class="title"><span class="flaticon-energy"></span> NEWS </li>
                                    <li>Trang tin tức cập nhập 24/7 </li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date row list-unstyled m-0 ">
                                    <li><span class="flaticon-calendar"></span> (+84) 090 900 900</li>
                                    <li class="col-1 "><a href=""><i class="bi bi-facebook text-danger"></i></a></li>
                                    <li class="col-1"><a href=""><i class="bi bi-google text-danger"></i></a></li>
                                    <li class="col-1"><a href=""><i class="bi bi-twitter text-danger"></i></a></li>
                                    <li class="col-1"><a href=""><i class="bi bi-youtube text-danger"></i></a></li>
                                    <li class="col-1"><a href=""><i class="bi bi-pinterest text-danger"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid gray-bg d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 d-none d-md-block">
                            <div class="header-banner row align-items-center">
                                <div class="col-xl-8 col-lg-8 col-md-8">
                                    <form class="form-inline my-2 my-lg-0 ">
                                        <input class="form-control mr-sm-2 col-8" type="search" placeholder="Nhập để tìm kiếm..." aria-label="Search">
                                        <button class="btn btn-outline-success " type="button">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 ">
                                    <a class="position-relative col-2 h-100 w-100 p-1" href="">
                                        <i class="bi bi-suit-heart a">
                                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger text-light">
                                                99+
                                            </span>
                                        </i>
                                    </a>
                                    @if (Auth::user())
                                    <div class="dropdown d-inline ml-4 col-8 px-4 py-2 genric-btn danger-border radius user">
                                        <a class="dropdown-toggle my-2" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{Auth::user()->name}}
                                        </a>
                                        <ul class="dropdown-menu border-danger p-0">
                                            <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                            <li><a class="dropdown-item" href="#">Yêu thích</a></li>
                                            @if (Auth::user()->roles == 1 )
                                            <li>
                                                <a class="dropdown-item" href="{{route('admin.dashboard')}}">Vào Admin</a>
                                            </li>
                                            @endif
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Đăng xuất') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    <a class="col-8 a" href="/login"><i class="bi bi-person-circle"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <!-- <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="categori.html">Category</a></li>
                                        <li><a href="latest_news.html">Latest News</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div> -->
                            @include('layout.nav')
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
