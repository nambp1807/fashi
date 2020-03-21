@extends('layout')
@section('title',"Giỏ hàng")
@section('content')
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="cart-table">

                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><a href="{{url("/clear-cart")}}"><i class="ti-close"></i></a></th>
                            </tr>
                            </thead>
                            @forelse($cart as $p)
                            <tbody>

                                <tr>
                                    <td class="cart-pic first-row"><img style="height: 100px;width: 150px" src="{{asset($p->thumbnail)}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$p->product_name}}</h5>
                                    </td>
                                    <td class="p-price first-row"><p>{{$p->price}}</p></td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                           <p>{{$p->cart_qty}}</p>
                                        </div>
                                    </td>
                                    <td class="total-price first-row"><p>$ {{$p->price*$p->cart_qty}}</p></td>
                                    <td class="close-td first-row"><a href="{{url("/clear-one-cart/{$p->id}")}}"><i class="ti-close"></i></a></td>
                                </tr>

                            </tbody>
                            @empty
                                <P>Không có sản phẩm nào trong giỏ hàng</P>
                            @endforelse
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>0.0</span></li>
                                    <li class="cart-total">Total <span>$ {{$cart_total}}</span></li>
                                </ul>
                                <a href="{{url("/checkout")}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->


{{--    <ul>--}}
{{--        @forelse($cart as $p)--}}
{{--            <li>{{$p->product_name}}------{{$p->cart_qty}}</li>--}}
{{--            @empty--}}
{{--        <p>khong co</p>--}}
{{--        @endforelse--}}
{{--    </ul>--}}

@endsection
