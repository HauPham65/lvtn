<header id="header">
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                {{-- <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0939867442</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>HauT@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="contactinfo">
                    <img src="{{ asset('interface/images/home/headertop.png') }}">
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo pull-left">
                        <a href="{{route('interface.home')}}"><img style="height:70px"
                            src="{{ asset('interface/images/home/logo1.png') }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                            @if (Auth::check())
                                @if(Auth::user()->role == 1) 
                                    <!-- Hiển thị thông tin đối với người dùng có vai trò là 1 (Khách hàng) -->
                                    <li>
                                        <a class="relative01">
                                            <p style="color: #000;">Chào khách hàng:🎅 <strong>{{ Auth::user()->username }}</strong></p>
                                        </a>
                                    </li>
                                @elseif(Auth::user()->role == 2)
                                    <!-- Hiển thị thông tin đối với người dùng có vai trò là 2 (Admin) -->
                                    <li>
                                        <a class="relative01">
                                            <p style="color: #000;">Chào Quản lý:👨‍💻 <strong>{{ Auth::user()->username }}</strong></p>
                                        </a>
                                    </li>
                                    {{-- <li><a href="{{ route('interface.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li> --}}
                                @endif
                            @endif  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    <i class="fa fa-lock" style="color: #000;"></i> Tài khoản<b class="caret" ></b>
                                </a>
                                <ul class="dropdown-menu" >
                                    <!-- Hiển thị các lựa chọn của dropdown menu -->
                                    @guest
                                        <!-- Cho phép đăng nhập và đăng ký cho người dùng chưa đăng nhập -->
                                        <li><a href="{{ route('interface.login') }}"><i class="fa fa-user" style="color: #FF8C00;"></i>Đăng nhập</a></li>
                                        <li><a href="{{ route('interface.register') }}"><i class="fa fa-google-plus" style="color: #FF8C00;"></i>Đăng ký</a></li>
                                    @else
                                        @if(Auth::user()->role == 2)
                                            <!-- Đối với người dùng có vai trò là 2 -->
                                            <li><a href="{{ route('interface.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                                        @else
                                            <!-- Ẩn các lựa chọn mua hàng và thay đổi thông tin đối với vai trò không phải 2 (người dùng)-->
                                            <li><a href="{{route('interface.logout')}}"><i class="fa fa-shopping-cart" style="color: #FF8C00;" ></i>Đăng xuất</a></li>
                                            <li ><a href=""><i class="fa fa-info-circle" aria-hidden="true" style="color: #FF8C00;"></i>Thay đổi thông tin</a></li>
                                           
                                        @endif
                                    @endguest
                                </ul>
                            </li>
                            <!-- Hiển thị giỏ hàng cho tất cả người dùng -->
                            <li>
                                                <a class="relative01" href="" >
                                                    <img src="{{ asset('interface/images/cart/cart.png') }}" alt="" >
                                                    @if(session('cart'))<span>{{ count(session('cart')) }}</span> @endif Giỏ hàng <!-- Đếm số lượng tăng theo giỏ hàng -->
                                                </a>
                                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style="margin-left: 14px;
                width: 97.5%;
                background-color: #00FFFF; text-align:center">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left" style="padding-top:6px">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('interface.home') }}" class="active" style="color:#000;">Trang chủ 🏠</a></li>
                            <li class="dropdown"><a href="{{route('interface.product')}}" style=" color:#000" >Danh mục💻 <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($categories as $caitem)
                                        <li><a href="">{{$caitem->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a style=" color:#000" href="">Liên Hệ 📞</a></li>
                            <li><a style=" color:#000" href="">Khuyến mãi 💲</a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-sm-6">
                    <form action="" method="POST">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Tìm kiếm" />
                            <button type="submit" class="btn btn-warning">Tìm kiếm </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div><!--/header-bottom-->
</header>
