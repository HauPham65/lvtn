@extends('admin.master')
@section('content')
    <section class="section">
        <div class="container">

        <div class="row">

           <div class="col-lg-2 ">
            </div>
            <div class="col-lg-10 mt-5">
                @include('admin.widgets.breadcrumb')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản lý danh mục({{$list->total()}})dòng
                            <a name="" id="" class="btn btn-sm btn-success"
                                href="{{ route('categories.create') }}" role="button">Tạo mới</a>
                        </h5>
                        @include('admin.widgets.message')
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Mô Tả</th>
                                    <th scope="col">Ngày Tạo</th>
                                    <th scope="col">Tác Vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Ban co muon xoa khong?')"
                                                    class="btn btn-sm btn-danger" role="button">Xóa</button>
                                            </form>
                                            <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $item->id) }}"
                                                role="button"><span>Sửa</span></a>
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
