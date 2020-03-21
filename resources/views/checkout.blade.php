@extends('layout')
@section('title',"Thanh toán")
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{url("/")}}">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{url("checkout")}}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Biiling Details</h4>
                        <div class="row">

                            <div class="col-lg-12">
                                <label for="last">Full Name<span>*</span></label>
                                <input type="text" name="customer_name" placeholder="Tên khách hàng " required>
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Address<span>*</span></label>
                                <input type="text" name="shipping_address" placeholder="Address " required>
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" name="telephone" placeholder="Phone no " required>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">

                                <div class="od-warp">
                                    <table class="table table-bordered" id="table-additional-manage">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">PRODUCT</th>
                                            <th scope="col">QUANTITY</th>
                                            <th scope="col">PRICE</th>
                                            <th scope="col">TOTAL</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(session('cart') as $p)
                                            <tr>
                                                <td>{{$p->product_name}}</td>
                                                <td class="text-center">{{$p->cart_qty}}</td>
                                                <td>$ {{$p->getPrice()}}</td>
                                                <td>$ {{$p->price*$p->cart_qty}}</td>
                                            </tr>
                                        @empty
                                            <p>Khong co danh muc nao</p>
                                        @endforelse
                                        </tbody>

                                    </table>
                                    <span>Total : $ {{ $cart_total }}</span>

                                </div>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="two">
                                            Cheque Payment
                                            <input type="radio" value="cod" name="payment_total" id="two">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="one">
                                            Paypal
                                            <input type="radio" value="paypal" name="payment_total" id="one">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@endsection
