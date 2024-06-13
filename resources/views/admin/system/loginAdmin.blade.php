@extends('admin.masterempty')
<style>
    .chu{
        color: #fff;
    }
</style>
@section('content')

    <div class="container">
        <h3 class="chu">ĐĂNG NHẬP</h3>
        <div class="login">
           @if(session('msg'))
        <div class="alert alert-{{session('type')}}" role="alert">
            <strong>{{session('msg')}}</strong>
        </div>
        @endif
        <form action="{{route('admin.loginpostAdmin')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="chu" >Email</label>
                <input type="text" required name="email" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for=""  class="chu">Mật khẩu</label>
                <input type="password" required name="password" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group" style="padding-top: 15px">
                <input type="submit" class="btn btn-success btn-sm" value="Đăng nhập">
            </div>
        </form>
        </div>
    </div>
 @endsection
