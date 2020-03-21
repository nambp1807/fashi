@extends("admin.layout")
@section("top_content")
    <div class="col-md-12 col-md-offset-3">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm danh mục sản phẩm</h2>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <form method="post" action="{{url("admin/category/store")}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput2">Name</label>
                    <input type="text" class="form-control cc-name @if($errors->has("category_name"))is-invalid @endif" id="cc-name" name="category_name" value="{{old("category_name")}}" placeholder="Name Category">
                    @if($errors->has("category_name"))
                        <p style="color:red">{{$errors->first("category_name")}}</p>
                    @endif
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-lock fa-lg"></i>
                        <span id="payment-button-amount">Gửi Đi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('main_content')

@endsection
