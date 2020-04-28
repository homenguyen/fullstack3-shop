@extends('adminlte::page')

@section('title', 'Xóa danh mục')

@section('content_header')
    <h1>Xóa danh mục</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
            <form role="form" method="post" action="{{ route('adminCategory.destroy', [$id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="card-body">
                  <div class="form-group">
                    <select name="move_to_category">
                      <option value="">Không di chuyển</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Xóa danh mục</button>
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
