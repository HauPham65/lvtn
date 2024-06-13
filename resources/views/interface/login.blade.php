@extends('interface.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<section><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @if(session('msg'))
                <div class="alert alert-{{session('type')}}" role="alert">
                    <strong>{{session('msg')}}</strong>
                </div>
                @endif
                <h2 class="text-align-center">Đăng nhập </h2>
                <form action="{{route('interface.loginPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control" placeholder="">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a href="{{route('interface.forgotpass')}}" ><i class="fa fa-key" aria-hidden="true"></i>Quên Mật Khẩu</a>
                    <br><br>
                    <div class="form-group">
                        <a href="{{route('interface.register')}}" ><i class="fa fa-user" aria-hidden="true" ></i>Đăng ký tài khoản</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" style="background-color:#00FFFF" class="btn mx-auto">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

</section><!--/form-->
@endsection