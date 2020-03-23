@extends('layout')
@section('title',"Trang chủ")

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section>
        <section class="contact-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-title">
                            <h4>Checkout Success</h4>
                            <p>
                                Congratulations on your successful purchase pressing <a href="{{asset("/")}}">continue</a> to return to the homepage.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection