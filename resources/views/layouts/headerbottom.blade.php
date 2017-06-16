
<headerbottom id="headerbottom"><!--header-bottom-->
    <div class="header-bottom">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
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
                            <li><a href="{{ url('/') }}">Home</a></li>
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
                @if(app('request')->input('id'))
                    <form action="/" method="get">
                        <div class="col-sm-6">
                            <div class="search_box pull-right">
                                <input hidden id="tags" name="id" value="{{app('request')->input('id')}}"
                                       placeholder="Search" type="text">
                                <input hidden id="tags" name="category_name"
                                       value="{{app('request')->input('category_name')}}" placeholder="Search"
                                       type="text">
                                <input id="storeName" name="searchStoreName" placeholder="Search" type="text">
                                <button id="searchByStoreName" type="submit" class="btn btn-md btn-warning">
                                    Search
                                </button>

                            </div>

                        </div>
                    </form>
                @else
                    <form method="get" action="/">
                        <div class="col-sm-6">
                            <div class="search_box pull-right">
                                <input id="storeName" name="searchStoreName" type="text" placeholder="Search"/>
                                <button id="searchByStoreName" type="submit" class="btn btn-md btn-warning">Search
                                </button>
                                <a href="" data-toggle="modal" data-target="#advancedSearchModal">Advanced search</a>
                            </div>
                        </div>

                    </form>
                @endif
            </div>
        </div>
    </div>


</headerbottom>
<!--/header-bottom-->