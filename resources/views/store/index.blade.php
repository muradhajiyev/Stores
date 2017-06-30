@extends('layouts.main')
@if($store)
    @section('title', "Store | {$store->name}")

@section('content')
    <br>


    <section id="slider"><!--slider-->

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            @foreach($store->image_urls as $key=>$img)
                                <div class="item {{ $key==0 ? 'active' : '' }}" style="width:1350px;margin-left: -10%;">
                                    <div class="col-sm-12" style="height: 380px;">
                                        <img src="{{$img->path}}" class="girl img-responsive" alt=""
                                             style="width: 100%; height: 100%; "/>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev"
                           style="margin-left: 1%;">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"
                           style="margin-right: 2%;">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row" style="">

                <div class="col-sm-2" style="margin-left: 6%;">
                    <img src="{{ $store->profile_url }}"
                         style="height: 180px;width: 160px; border-radius: 35%; box-shadow: 2px 2px 2px 2px black; margin-top: 7%;"/>
                </div>

                <div class="col-sm-4 descript" style=" margin-top: 2%;">
                    <a href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id, 'store_name' => $store->name]) }}"

                       style="color: orange;font-size: 30px;"><span>{{$store->name}}</span></a>

                    <div style="height: 200px;border-right: 4px gray solid; right: 300px;margin-left: 0px;height: 110px; background-color: white; ">
                        <p style="margin-top: 2%; ">
                            <i>{{$store->slogan}}</i>
                        </p>
                        <span style="text-align: justify;">{{substr($store->description, 0, 250)}}</span>
                        @if(strlen($store->description)>250)
                            <style type="text/css">
                                .forheight {
                                    height: 250px;
                                }
                            </style>
                            <span id="show"
                                  style="display: none; text-align:justify;">{{substr($store->description,250)}}</span>

                            <span id="toggle" style="color: blue" class="hideLink"><u>see more</u></span>
                        @else
                            <style type="text/css">
                                .forheight {
                                    height: 100%;
                                }
                            </style>
                        @endif

                    </div>
                </div>

                <div class="col-sm-3" style="margin-top: 7%; margin-left: -3%;">

                    <ul>
                        <li type="circle"><i class="fa fa-phone" style="color:orange;"></i> <b>Email: </b><i
                                    style="color: blue;cursor:pointer;">{{$store->email}}</i></li>
                        <br>
                        <li>
                            <i class="fa fa-map-marker" style="color:orange;"></i> <b>Location: </b><span
                                    style="text-transform: uppercase;">{{$store->address}}</span></li>
                        <br>
                        <li>
                            <i class="fa fa-envelope" style="color:orange;"></i> <b>Phone: </b><span
                                    style="color:blue;cursor:pointer;">{{$store->phone_number}}</span></li>
                    </ul>
                </div>

            </div>
            <hr style="border-color: orange;">
        </div>
        <header id="headerbottom"><!--header-bottom-->
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
                                    <li class="dropdown"><a href="{{ url('/store/shop') }}">Shop<i
                                                    class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{ url('/store/shop') }}">Products</a></li>
                                            <li><a href="{{ url('/store/product-details') }}">Product Details</a></li>
                                            <li><a href="{{ url('/store/checkout') }}">Checkout</a></li>
                                            <li><a href="{{ url('/store/cart') }}">Cart</a></li>
                                            <li><a href="{{ url('/store/login') }}">Login</a></li>

                                        </ul>
                                    </li>


                                    <li><a href=" {{ URL::to('/store/blog/'.$store->id) }}">Blog</a></li>
                                    <li><a href=" {{ URL::to('/store') }}">Store</a></li>
                                    <li><a href="{{URL::to('/store/contactus') }}">Contact</a></li>

                                </ul>
                            </div>
                        </div>
                        @if(!empty($store))
                            <form action="/store" method="get">
                                @else
                                    <form action="/" method="get">
                                        @endif
                                        <div class="col-sm-6">
                                            <div class="search_box pull-right">
                                                @if(!empty($store))
                                                    <input hidden name="store_id" value="{{$store->id}}">
                                                @endif
                                                <input hidden id="tags" name="id"
                                                       value="{{app('request')->input('id')}}"
                                                       placeholder="Search" type="text">
                                                <input hidden id="tags" name="category_name"
                                                       value="{{app('request')->input('category_name')}}"
                                                       placeholder="Search"
                                                       type="text">
                                                @if(!empty($store))
                                                    <input id="search_text_product" name="searchStoreName"
                                                           placeholder="Search" type="text">
                                                @else
                                                    <input id="search_text_store" name="searchStoreName"
                                                           placeholder="Search" type="text">
                                                @endif
                                                <button id="searchByStoreName" type="submit"
                                                        class="btn btn-md btn-warning">
                                                    Search
                                                </button>

                                                <a href="" data-toggle="modal" data-target="#advancedSearchModal">Advanced
                                                    search</a>
                                            </div>
                                        </div>
                                    </form>
                            </form>
                    </div>

                </div>
            </div>
        </header>


    </section>
    <!--cover/slider ended-->
    <section>
        <div class="container">
            <div class="row">

                @include('layouts.left-sidebar')
                <div class="col-sm-9 padding-right">

                    <div class="recommended_items"><!--recommended_items most viewed products-->

                        <h2 class="title text-center">Most Viewed Products</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                @for($i = 0; $i < intdiv(count($mostviewed),3); $i++)
                                    <div class="item {{ $i==0 ? 'active' : '' }}">
                                        <div class="col-sm-2"></div>
                                        @for($j = 0; $j < 3; $j++)
                                            <div class="col-sm-3">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">

                                                        <div class="productinfo text-center">
                                                            <a href="/productdetails/{{$mostviewed[$j + $i*3]->id}}"
                                                               style="cursor: pointer;">
                                                                <img src="{{$mostviewed[$j + $i * 3]->profile_url}}"
                                                                     alt=""
                                                                     style="height: 200px;box-shadow: 0px 1px gray;"/>
                                                                <p style="margin-left: 0px; text-align: left; font-size: 12px">
                                                                    <i class="fa fa-eye"
                                                                       aria-hidden="true"></i> {{$mostviewed[$j + $i*3]->views}}
                                                                </p>
                                                                <h2>{{$mostviewed[$j + $i*3]->price}} {{$mostviewed[$j + $i*3]->currency->iso}}</h2>
                                                                <p>{{$mostviewed[$j + $i*3]->name}}</p></a>
                                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                @endfor
                            </div>

                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">{{$store->name}} Products</h2>
                        @if(Auth::user())
                            @if(Auth::user()->isStoreOwner($store->id))
                                <div class="col-sm-12 col-sm-offset-9">
                                    <a href="{{URL::to("/products/create?store=$store->id")}}" class="btn btn-primary">Add
                                        Product</a>
                                </div>
                                <br/>
                            @endif
                        @endif


                        @foreach($store->products as $product)
                            <div class="col-sm-3" id="singleProduct">
                                <div class="product-image-wrapper smth_table">
                                    @if($product->is_new)
                                        <div class="ribbon red"><span>New</span></div>
                                    @endif
                                    <div class="single-products" style="height: 250px;">
                                        <div class="productinfo text-center">
                                            <a href="/productdetails/{{$product->id}}" style="cursor: pointer;">
                                                <img src="{{$product->profile_url}}" alt=""
                                                     style="height: 185px;box-shadow: 0px 1px gray;"/>

                                                <p>{{$product->name}}</p></a>
                                            <h3>{{$product->price}} {{$product->currency->iso}}</h3>

                                        </div>
                                    </div>
                                    @if(Auth::user())
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a id="preven" target="Iframe"
                                                       href="{{route('test', ['pro' => $product->id, 'user'=>Auth::user()->id])}}"><i
                                                                class="fa fa-plus-square"></i>Add to wishlist</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="col-sm-12">
                            {!! $store->products->appends(['store_id' => $store->id])->render() !!}

                        </div>
                    </div>


                    <!--features_items-->

                    <div class="category-tab"><!--category-tab  store profile cate-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                                <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset("product/images/home/gallery1.jpg")}}" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="blazers">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset("product/images/home/gallery4.jpg")}}" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="sunglass">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset("product/images/home/product3.jpg")}}" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="kids">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset("product/images/home/product5.jpg")}}" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="poloshirt">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset("product/images/home/product5.jpg")}}" alt=""/>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!--/category-tab-->

                </div>
            </div>
        </div>
    </section>
    @include('layouts.advancedSearchModal',['categories'=>$categories, 'brands'=>$brands, 'store'=>$store])
@endsection
@endif

