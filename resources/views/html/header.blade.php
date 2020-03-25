<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    hello.colorlib@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right">
                <a href="{{url('login')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
{{--                <div class="lan-selector">--}}
{{--                    <select class="language_drop" name="countries" id="countries" style="width:300px;">--}}
{{--                        <option value='yt' data-image="{{asset("img/flag-1.jpg")}}" data-imagecss="flag yt"--}}
{{--                                data-title="English">English</option>--}}
{{--                        <option value='yu' data-image="{{asset("img/flag-2.jpg")}}" data-imagecss="flag yu"--}}
{{--                                data-title="Bangladesh">German </option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{url("/")}}">
                            <img src="{{asset("img/logo.png")}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <form class="input-group" method="get" action="{{url('/search')}}">
                            <input type="text" name="key" placeholder="What do you need?">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                        @php
                                            $cart = session("cart");
                                            if($cart==null){
                                                $cart= [];
                                            }
                                        @endphp
                                        @forelse($cart as $p)
                                        <tr>
                                            <td class="si-pic"><img style="height: 50px;width: 70px"src="{{asset("$p->thumbnail")}}" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>{{$p->cart_qty}}</p>
                                                    <h6>{{$p->product_name}}</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                        @empty
                                            <p>Không có sản phẩm nào !</p>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$  </h5>
                                </div>
                                <div class="select-button">
                                    <a href="{{url("/cart")}}" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="{{url("/checkout")}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$150.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="{{url('listing/2')}}">Women’s Clothing</a></li>
                        <li><a href="{{url('listing/1')}}">Men’s Clothing</a></li>
{{--                        <li><a href="{{url('listing/2')}}">Underwear</a></li>--}}
{{--                        <li><a href="{{url('listing/2')}}">Kid's Clothing</a></li>--}}
                        <li><a href="{{url('listing/2')}}">Brand Fashion</a></li>
                        <li><a href="{{url('listing/3')}}">Accessories/Shoes</a></li>
{{--                        <li><a href="#">Luxury Brands</a></li>--}}
{{--                        <li><a href="#">Brand Outdoor Apparel</a></li>--}}
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="active"><a href="{{url("/")}}">Home</a></li>
                    <li><a href="{{url("/")}}">Shop</a></li>
                    <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            @foreach(\App\Category::all() as $c)
                            <li><a href="{{url("/listing/{$c->id}")}}">{{$c->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('blog')}}">Blog</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="{{url('blog-details')}}">Blog Details</a></li>
                            <li><a href="{{url('cart')}}">Shopping Cart</a></li>
                            <li><a href="{{url('checkout')}}">Checkout</a></li>
                            <li><a href="{{url('order-history/{id}')}}">History Purchase </a></li>
{{--                            <li><a href="{{url('register')}}">Register</a></li>--}}
{{--                            <li><a href="{{url('login')}}">Login</a></li>--}}
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
