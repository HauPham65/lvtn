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
                        <h2 class="text-align-center">Quên mật khẩu</h2>
                        <p>vui lòng nhập email mà bạn đã đăng ký tài khoản của cửa hàng chúng tôi!!</p>
                        <form action="{{ route('interface.forgotPost') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-warning">gửi mail xác nhận</button>
                        </form>

                </div>
            </div>
        </div>

    </section><!--/form-->
@endsection
