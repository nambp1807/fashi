@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Sửa danh mục sản phẩm</h2>
        </div>
    </div>
@endsection
@section('main_content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Edit Product</div>
            <div class="card-body">
                <form action="{{url("admin/product/update",['id'=>$product->id])}}" method="post">
                    @csrf
                    <div class="form-group has-success">
                        <label  class="control-label mb-1">Product Name</label>
                        <input  name="product_name" type="text" value="{{$product->product_name}}"
                                class="form-control cc-name @if($errors->has("product_name"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("product_name"))
                            <p style="color:red">{{$errors->first("product_name")}}</p>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('product_desc'))has-error @endif">
                        <label  class="control-label mb-1">Product Desc</label>
                        <textarea class="form-control " name="product_desc" id="product_desc"
                                  placeholder="Product Description" rows="3" required>{{$product->product_desc}}</textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group @if($errors->has('thumbnail'))has-error @endif">
                        <label  class="control-label mb-1">Product Thumbnail</label>
                        <input type="text" name="thumbnail" class="form-control " id="thumbnail"
                               placeholder="Thumbnail" minlength="4" value="{{$product->thumbnail}}" required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group @if($errors->has('gallery'))has-error @endif">
                        <label  class="control-label mb-1">Product Gallery</label>
                        <textarea class="form-control " name="gallery" id="gallery"
                                  placeholder="Product gallery" rows="3" required>{{$product->gallery}}</textarea>
                    </div>
                    <div class="form-group has-success">
                        <label  class="control-label mb-1">Category Name</label>
                        <select class="form-group form-control" name="category_id" required>
                            @php
                                $category = \App\Category::all();
                            @endphp
                            <option selected value="{{$product->category_id}}">{{ $product->Category->category_name }}</option>
                            @foreach($category as $c)
                                @if($c->id != $product->category_id )
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-success">
                        <label  class="control-label mb-1">Brand Name</label>
                        <select class="form-group form-control" name="brand_id" required>
                            @php
                                $brand = \App\Brand::all();
                            @endphp
                            <option selected value="{{$product->brand_id}}">{{ $product->Brand->brand_name }}</option>
                            @foreach($brand as $b)
                                @if($b->id != $product->brand_id )
                                    <option value="{{$b->id}}">{{$b->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group @if($errors->has('price'))has-error @endif">
                        <input type="number" name="price" class="form-control " id="price"
                               placeholder="Price" min="1" value="{{$product->price}}" step="0.1" required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group @if($errors->has('quantity'))has-error @endif">
                        <input type="number" name="quantity" class="form-control " id="quantity"
                               placeholder="Quantity" min="1" value="{{$product->quantity}}" required>
                        <div class="validate"></div>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Gửi đi</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection