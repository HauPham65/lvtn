@extends('interface.master')
@section('title')
    {{ $title }}
@endsection
<style>
</style>
@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                                 <!--Hình to -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-3">
                                    <h1><span>HT</span>-SHOP</h1>
                                    <p style="color:#000;">Chào mừng bạn đến với cửa hàng của chúng tôi 💻  </p>
                                    <button type="button" class="btn btn-default get">LapTop Nổi Bật H&T 🧑‍💻</button>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-banner-css" src="{{ asset('interface/images/banner/banner1.jpg') }}"
                                        class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-3">
                                    <h1><span>HT</span>-Shop</h1>
                                    <p style="color:#000">TOP 4 LAPTOP GAMING 💻</p>
                                    <button type="button" class="btn btn-default get">LapTop Nổi Bật H&T 🧑‍💻</button>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-banner-css" src="{{ asset('interface/images/banner/banner2.jpg') }}"
                                        class="girl img-responsive" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-3">
                                    <h1><span>HT</span>-Shop</h1>
                                    <p style="color:#000">Dòng máy MSI GAMING 💻</p>
                                    <button type="button" class="btn btn-default get">LapTop Nổi Bật H&T 🧑‍💻</button>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-banner-css" src="{{ asset('interface/images/banner/banner3.jpg') }}"
                                        class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-3">
                                    <h1><span>HT</span>-Shop</h1>
                                    <p style="color:#000">LAPTOP GAMING ĐỒ HỌA SIÊU MƯỢT 💻 </p>
                                    <button type="button" class="btn btn-default get">LapTop Nổi Bật H&T 🧑‍💻</button>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-banner-css" src="{{ asset('interface/images/banner/banner4.jpg') }}"
                                        class="girl img-responsive" alt="" />
                                </div>
                            </div>
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    {{-- <div class="left-sidebar">
                        <h2>Danh Mục</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach ($categories as $citem)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">{{ $citem->name }}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Hãng Sản Xuất </h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($manufacts as $mitem)
                                        <li><a href="#">{{ $mitem->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->



                        <div style="background-color: #fff" class="shipping text-center"><!--shipping-->
                            <img src="{{ asset('interface/images/home/pricing.png') }}" alt="" />
                        </div><!--/shipping-->

                    </div> --}}
                    @include('interface.widgets.left_sidebar')
                </div>
             
            </div>
        </div>
    </section>
@endsection
