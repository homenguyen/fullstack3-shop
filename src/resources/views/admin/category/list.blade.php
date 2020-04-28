@extends('adminlte::page')

@section('title', 'Quản lý danh mục')

@section('content_header')
    <h1>Quản lý danh mục</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('adminCategory.create') }}" class="btn btn-block btn-default">Tạo mới</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th style="width: 150px"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('adminCategory.edit', [$category->id]) }}" class="btn btn-default">Sửa</a>
                        <a href="{{ route('adminCategoryDeleteForm', [$category->id]) }}" class="btn btn-default btn-danger">Xóa</a>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
