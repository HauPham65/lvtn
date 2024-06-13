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
                    <h2 style="text-align: center">Đăng ký tài khoản 📝</h2>
                    <form action="{{ route('interface.registerPost') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="username" class="form-control" placeholder="">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="">
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
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{route('interface.login')}}"><i class="fa fa-user" aria-hidden="true"></i>Đã có tài khoản</a>
                        <div class="form-group">
                            <button style="background-color:#00FFFF" class="btn mx-auto" >Đăng ký</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section><!--/form-->
@endsection

