<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <title>@yield('page-title')</title>
        <link rel="icon" href="{!! asset('product/images/ico/apple-touch-icon-144-precomposed.png') !!}"/>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo pull-left">

                        <a href="{{ url('/') }}"><img
                                    src="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}" alt=""
                                    style="width:70px;height:70px;"/></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>

                            <a id="createStore" href="{{ url('/storeregister') }}" type="button"
                               class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Create Store</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                        <!-- <li><a href="{{ url('/store/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
                            @if(!Auth::check())
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login/Sign Up</a></li>




                            @elseif(Auth::check())
                                <div class="dropdown">
                                    <button id="toggleButton" class="btn btn-warning dropdown-toggle" type="button"
                                            data-toggle="dropdown">{{Auth::user()->name}}
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                        <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                        <li><a href="{{ url('/store/checkout') }}"><i class="fa fa-crosshairs"></i>
                                                Checkout</a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                        </li>

                                    </ul>
                                </div>
                        @endif



                        <!-- <a id="createStore" href="{{ url('/storeregister') }}" type="button"
                               class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Create Store</a> -->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->