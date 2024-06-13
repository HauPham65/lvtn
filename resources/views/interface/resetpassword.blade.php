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
                    <h2 class="text-align-center">Đặt lại mật khẩu 🧑🏻‍💻</h2>
                    <form action="{{ route('interface.updatepass') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                        @error('password')
                            <div class='text-danger'>{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="">
                        </div>
                        @error('password_confirmation')
                        <div class='text-danger'>{{ $message }}</div>
                    @enderror
                            <button type="submit" style="background-color:#00FFFF" class="btn mx-auto">Đặt lại nào!</button>
                    </form>
            </div>
        </div>
    </section><!--/form-->
@endsection
