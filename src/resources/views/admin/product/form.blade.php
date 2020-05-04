<form role="form" method="post" action="" enctype='multipart/form-data'>
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName">Tên sản phẩm:</label>
                    <input name="name" type="text" class="form-control" id="inputName"
                           value="{{old('name',isset($product->name) ? $product->name :'')}}" placeholder="Nhập tên">
                    <div class="has-error">
                        @if($errors->has('name'))
                            <span class="text-danger">
                                    {{$errors->first('name')}}
                               </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName">Mô tả:</label>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="description"
                                  placeholder="Enter ..."> {{isset($product->description) ?$product->description :'' }}</textarea>
                        <div class="has-error">
                            @if($errors->has('description'))
                                <span class="text-danger">
                                    {{$errors->first('description')}}
                               </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName">Hình ảnh:</label>
                    <div class="custom-file" style="margin-bottom: 20px !important;">
                        <input type="file" name="image"
                               value="{{old('image',isset($product->image) ? $product->image :'')}}"
                               class="custom-file-input" id="customFile">
                        {{--                       @if($errors->has('image'))--}}
                        {{--                           <span class="text-danger">--}}
                        {{--                                    {{$errors->first('image')}}--}}
                        {{--                               </span>--}}
                        {{--                       @endif--}}
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @if(isset($product))
                            <img src="/images/products/{{$product->image}}" height="100px" width="100px"
                                 class="img-thumbnail">
                        @endif
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Chọn danh mục</label>
                    <select class="custom-select" name="categoryId">
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{old('categoryId',isset($product->category_id) ? $product->category_id :"") == $category->id ?  "selected" :""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">Số lượng:</label>
                    <input name="quantity" type="text"
                           value="{{old('price',isset($product->price) ? $product->price :'')}}" class="form-control"
                           id="inputName" placeholder="Nhập tên">
                    @if($errors->has('quantity'))
                        <span class="text-danger">
                                    {{$errors->first('quantity')}}
                               </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputName">Đơn giá:</label>
                    <input name="price" type="text"
                           value="{{old('price',isset($product->quantity) ? $product->quantity :'')}}"
                           class="form-control" id="inputName" placeholder="Nhập tên">
                    @if($errors->has('price'))
                        <span class="text-danger">
                                    {{$errors->first('price')}}
                               </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer" style="padding-top: 20px">
        @if(!isset($product))
            <button type="submit" class="btn btn-primary align-items-center">Thêm sản phẩm</button>
        @else
            <button type="submit" class="btn btn-primary  align-items-center">Chỉnh sửa sản phẩm</button>
        @endif
    </div>
</form>
