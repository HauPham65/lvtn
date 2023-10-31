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
                    <h2 class="text-align-center">Đặt lại mật khẩu</h2>
                    <form action="{{ route('interface.updatepass') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Xác Nhận Mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="">
                        </div>
                        <a href="{{ route('interface.login') }}"><i class="fa fa-user" aria-hidden="true"></i>Đăng nhập</a>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning mx-auto">Đặt lại</button>
                    </form>
                </div>
            </div>
        </div>

    </section><!--/form-->
@endsection
