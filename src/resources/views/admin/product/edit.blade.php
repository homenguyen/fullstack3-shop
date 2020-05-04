@extends('adminlte::page')

@section('title', 'Sửa danh mục')

@section('content_header')
    <h1>Sửa danh mục</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                    @include('admin.product.form')
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
