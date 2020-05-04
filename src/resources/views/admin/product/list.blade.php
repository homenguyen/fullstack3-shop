@extends('adminlte::page')

@section('title', 'Quản lý  sản phẩm')

@section('content_header')
    <h1>Quản lý danh mục</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('create.product') }}" class="btn btn-block btn-default">Tạo mới</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $index => $product)
                            <tr class="product_{{$product->id}}">
                                <td>{{$index+1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <img src="/images/products/{{$product->image}}" height="80px" width="80px"
                                         class="img-thumbnail">
                                </td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    <a href="{{route('edit.product',$product->id)}}" class="btn btn-primary">Sửa</a>
                                    <button data-id="{{$product->id}}" class="btn btn-danger btnDeleteProduct">Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(function () {
            let body = $('body');

            body.on('click', '.btnDeleteProduct', function (event) {
                event.preventDefault();
                let id = $(this).attr('data-id');
                let url = '/admin/product/delete/' + id;
                let type = 'delete';
                destroyResource(url, type, 'Bạn chắc chắn có muốn xóa sản phẩm này không ?');
            });
        });
    </script>
@stop
