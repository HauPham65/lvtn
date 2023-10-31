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
                    <h2 class="text-align-center">Đăng nhập</h2>
                    <form action="{{route('interface.loginPost')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                         <a href="{{route('interface.forgotpass')}}"><i class="fa fa-key" aria-hidden="true"></i>Quên Mật Khẩu</a>
                        <br><br>
                        <a href="{{route('interface.register')}}"><i class="fa fa-user" aria-hidden="true"></i>Đăng ký tài khoản</a>
                        <div class="form-group">
                        <button type="submit" class="btn btn-warning mx-auto">Login</button>
                    </form>
                </div>
            </div>
        </div>

    </section><!--/form-->
@endsection
