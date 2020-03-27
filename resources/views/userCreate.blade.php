@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Thêm người dùng</h2>
        </div>
    </div>
@endsection
@section('main_content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Thêm người dùng</div>
            <div class="card-body">
                <form action="{{url("user/store")}}" method="post">
                    @csrf
                    <div class="form-group has-success">
                        <label  class="control-label mb-1"> Name</label>
                        <input  name="name" type="text" value="{{old("name")}}"
                                class="form-control cc-name @if($errors->has("name"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                    </div>
                    <div class="form-group @if($errors->has('age'))has-error @endif">
                        <label  class="control-label mb-1">Age</label>
                        <input class="form-control " name="age" id="age"
                                  placeholder="age" minlength="2" required>{{old("age")}}</input>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group @if($errors->has('address'))has-error @endif">
                        <label  class="control-label mb-1">Address</label>
                        <input type="text" name="address" class="form-control " id="address"
                               placeholder="address" minlength="4" value="{{old("address")}}" required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group @if($errors->has('telephone'))has-error @endif">
                        <label  class="control-label mb-1">Telephone</label>
                        <textarea class="form-control " name="telephone" id="telephone"
                                  placeholder="telephone" minlength="4" required>{{old("telephone")}}</textarea>
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