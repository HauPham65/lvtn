<!--Giao diện quên mật khẩu-->
@extends('interface.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                        @if (session('msg'))
                            <div class="alert alert-{{ session('type') }}" role="alert">
                                <strong>{{ session('msg') }}</strong>
                            </div>
                        @endif
                        <h2 class="text-align-center">Quên mật khẩu 🛠️</h2>
                        <p style="background-color:#00FFFF;color:black;border:#f0ad4e;font-size:14px;";>Vui lòng nhập E-mail mà bạn đã đăng ký tài khoản và không được để trống E-mail !!</p>
                        <form action="{{ route('interface.forgotPost') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email 📧</label>
                                <input type="text" name="email" class="form-control" placeholder="">
                            </div>
                            <button type="submit" style="background-color:#00FFFF" class="btn mx-auto">Gửi E-mail xác nhận 💬</button>
                        </form>

                </div>
            </div>
        </div>

    </section><!--/form-->
@endsection
