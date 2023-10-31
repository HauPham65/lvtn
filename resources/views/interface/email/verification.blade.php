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
                    <h2 class="text-align-center">Xác minh để đặt lại mật khẩu</h2>
                    <p>vui lòng nhập mã xác minh</p>
                    <form action="{{ route('interface.verifipost') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Mã xác minh</label>
                            <input type="text" name="token" class="form-control" placeholder="">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-warning">xác minh</button>
                    </form>
                </div>
            </div>
        </div>

    </section><!--/form-->
@endsection
