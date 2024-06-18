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
                    <h2 class="text-align-center">Xác minh để đăng ký tài khoản</h2>
                    <p><span style="font-size: 16px; line-height: 22.4px; background-color:#00FFFF"> Vui lòng nhập mã xác thực đăng ký tài khoản </span></p>
                    <form action="{{route('interface.verification_register_post')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mã xác thực đăng ký tài khoản</label>
                            <input type="text" name="token" class="form-control" placeholder="">
                        </div>
                        <button style="background-color:#00FFFF" class="btn mx-auto">Xác thực</button>
                    </form>
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
