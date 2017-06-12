<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
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
                        <a href="#"><img
                                    src="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}" alt="" style="width:70px;height:70px;"/></a>
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
                                <button id="toggleButton" class="btn btn-warning dropdown-toggle"  type="button" data-toggle="dropdown">{{Auth::user()->name}}
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="{{ url('/store/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a>
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

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/store') }}">Home</a></li>
                            <li class="dropdown"><a href="{{ url('/store/shop') }}">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/store/shop') }}">Products</a></li>
                                    <li><a href="{{ url('/store/product-details') }}">Product Details</a></li>
                                    <li><a href="{{ url('/store/checkout') }}">Checkout</a></li>
                                    <li><a href="{{ url('/store/cart') }}">Cart</a></li>
                                    <li><a href="{{ url('/store/login') }}">Login</a></li>

                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="active">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/store/blog') }}" class="active">Blog List</a></li>
                                    <li><a href="{{ url('/store/blog-single') }}">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">404</a></li>
                            <li><a href="{{ url('/store/contactus') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->