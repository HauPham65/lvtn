@extends('admin.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 mt-5">
                    @include('admin.widgets.breadcrumb')
                    <div class="card">
                        <div class="card-body">
                            <h2 style="text-align: center">{{$title}}</h2>
                            @include('admin.widgets.message')
                            <form action="{{ $action }}" method="post">
                                @csrf
                                @method($method)
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ $item->name ?? '' }}"
                                        class="form-control" required>
                                </div>
                                @error('name')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                                <!-- <div class="form-group">
                                    <label for="">Loại</label>
                                    <select required class="form-control" name="categories_id">
                                        <option value=""> --- Chọn loại --- </option>
                                        @foreach ($categories as $citem)
                                            <option @if (($item->categories_id ?? '') == $citem->id) selected @endif
                                                value="{{ $citem->id ?? '' }}">
                                                {{ $citem->name }}</option>
                                        @endforeach
                                       
                                    </select>
                                </div> -->
                                @error('categories_id')
                                    <div class='text-danger'>{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-sm">{{ $submit ?? 'Thêm' }}</button>
                                    <a type="button" class="btn btn-success btn-sm" href="{{ route('manufact.index') }}"
                                        role="button">Xem danh sách</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
