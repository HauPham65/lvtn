@extends('interface.master')
@section('content')
<div class="container">
    <div class="row" style="width: 100%;margin-left:0px">
        <div class="col-sm-4" style="text-align: center;height:250px;border-color: #FE980F">
            <img style="width: 80px;" src="{{asset('interface/images/contact/images.png')}}" alt="">
            <h5>CỬA HÀNG:<p>Nguyễn Thị Minh Khai, Phường 6, Quận 3, Thành phố Hồ Chí Minh 700000</p></h5>

            <h5>VĂN PHÒNG <p>9 - 11 Nguyễn Thị Thập, Bình Thuận, Quận 7, Thành phố Hồ Chí Minh 70000</p></h5>
        </div>
        <div class="col-sm-4" style="text-align: center;height:250px;border-color: #FE980F">
            <img style="width: 80px;" src="{{asset('interface/images/contact/email.png')}}" alt="">
            <h5>E-MAIL</h5>
            <p>HTSHOP@gmail.com</p>
            <h5>E-mail Văn Phòng</h5>
            <p>thienvo08102000@gmail.com</p>
        </div>
        <div class="col-sm-4" style="text-align: center;height:250px;border-color: #FE980F">
            <img style="width: 80px;" src="{{asset('interface/images/contact/phone.png')}}" alt="">
            <h5>LIÊN HỆ:</h5>
            <p>Hotline: 0939867442</p>
            <h5>VĂN PHÒNG:</h5>
            <p>Hotline: 0901483332</p>
        </div>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4885844435867!2d106.68671597486909!3d10.773841659241729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3b5e579381%3A0xbad3d6d98221b778!2zUGhvbmcgVsWp!5e0!3m2!1svi!2s!4v1701454193651!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection
@push('scripts')
    @php $showFooter = false; @endphp
@endpush
