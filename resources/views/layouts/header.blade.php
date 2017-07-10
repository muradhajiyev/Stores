<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <title>@yield('page-title')</title>
        <link rel="icon" href="{!! asset('product/images/ico/apple-touch-icon-144-precomposed.png') !!}"/>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i>+994 (012) 404 18 60</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> info@shopin1.az</a></li>
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
            <div class="row" style="border-color:orange;">
                <div class="col-sm-6">
                    <div class="logo pull-left">

                        <a href="{{ url('/') }}"><img
                                    src="{{asset("/product/images/shop/shopin1.png")}}" alt=""
                                    style="width:260px;height:80px;"/></a>
                    </div>

                </div>
                <div class="col-sm-6">

                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            @if(!Auth::check())
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i> Login/Sign Up</a></li>

                            @elseif(Auth::check())
                                <div class="dropdown">
                                    <button id="toggleButton" class="btn btn-warning dropdown-toggle" type="button"
                                            data-toggle="dropdown">{{Auth::user()->name}}
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                        <li><a href="{{route('userid', ['id'=>Auth::user()->id])}}"><i
                                                        class="fa fa-star"></i> Wishlist</a></li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i
                                                        class="fa fa-sign-out"></i>Logout</a>
                                        </li>

                                    </ul>
                                </div>
                        @endif



                        <!-- <a id="createStore" href="{{ url('/storeregister') }}" type="button"
                               class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Create Store</a> -->

                        </ul>
                    </div>
                    @if(!Auth::check())
                        <div class="btn-group pull-right">
                            <a id="createStore" href="{{ url('/storeregister') }}" type="button"
                               class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Create Store</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->