<header id="header">
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0939867442</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>Hậu_thiện@gmail.com</a></li>
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
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="{{ asset('interface/images/home/logo.png') }}"
                                alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-lock"></i> Tài khoản<b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a href="{{ route('interface.login') }}"><i class="fa fa-user"></i>Đăng nhập</a></li>
                                    <li><a href="{{ route('interface.register') }}"><i class="fa fa-google-plus"></i></i>Đăng ký</a></li>
                                    <li><a href="{{ route('interface.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                                    <li><a href="{{ route('interface.logout') }}"><i class="fa fa-info-circle" aria-hidden="true"></i>Thay đổi thông tin</a></li>
                                </ul>
                            </li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('interface.home') }}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Latop</a></li>
                                    <li><a href="blog-single.html">Chuột</a></li>
                                    <li><a href="blog-single.html">Bàn Phím</a></li>
                                    <li><a href="blog-single.html">Tai nghe</a></li>

                                </ul>
                            </li>
                            <li ><a href="#">Khuyến mãi</a></li>

                            <li><a href="contact-us.html">Liên Hệ</a></li>
                            <li><a href="contact-us.html">Giới thiệu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <form action="" method="POST">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="tìm kiếm" />
                            <button type="submit" class="btn btn-warning">tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header>
