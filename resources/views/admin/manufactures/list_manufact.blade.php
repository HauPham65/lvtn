@extends('admin.master')
@section('content')
    <section class="section">
    <div class="container">

        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-10 mt-5">
                @include('admin.widgets.breadcrumb')
                    <div class="card-body">
                        <h5 class="card-title">{{ucwords($title)}}({{ $list->total() }})dòng
                            <a name="" id="" class="btn btn-sm btn-success"
                                href="{{ route('manufact.create') }}" role="button">Tạo mới</a>
                        </h5>
                        @include('admin.widgets.message')
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã</th>
                                    <th scope="col">Tên</th>
                                    <!-- <th scope="col">Loại</th> -->
                                    <th scope="col">Ngày Tạo</th>
                                    <th scope="col">Tác Vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <!-- <td>{{ $item->categories->name ??'chưa có '}}</td> -->
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ route('manufact.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Ban co muon xoa khong?')"
                                                    class="btn btn-sm btn-danger" role="button">Xóa</button>
                                            </form>
                                            <a class="btn btn-sm btn-primary" href="{{ route('manufact.edit', $item->id) }}"
                                                role="button">Sửa</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
                @if ($list->lastPage())
                    {{ $list->links() }}
                @endif
            </div>
        </div>
    </div>
    </section>
@endsection
