@extends('adminlte::page')

@section('title', 'Tạo danh mục')

@section('content_header')
    <h1>Tạo danh mục</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
            <form role="form" method="post" action="{{ route('adminCategory.store') }}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Tên danh mục:</label>
                    <input name="name" type="text" class="form-control" id="inputName" placeholder="Nhập tên">
                  </div>
                  <div class="form-group">
                    <label for="description">Miêu tả:</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Nhập miêu tả ..."></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo danh mục</button>
                </div>
              </form>

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
