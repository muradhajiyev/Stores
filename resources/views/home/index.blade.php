@extends('layouts.main')
@section('title',' Home')

@section('content')

    @include('layouts.headerbottom')

    <section>
        <div class="container">

            <div class="row">

            @include('layouts.left-sidebar')


            <!-- Stores in Home -->
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->

                        @if(!empty($categoryName))
                            <h2 class="title text-center">{{$categoryName}} Selling Stores</h2>
                        @else
                            <h2 class="title text-center">Top Stores</h2>
                        @endif
                        @if(count($stores)==0)
                            <div class="text-center">
                                <br><br>

                                <div class="content-404">
                                    <img src="" class="img-responsive" alt=""/>
                                    <h1><b>OPPS!</b> We Couldn’t Find A Store with this name</h1>
                                    <p>Uh... So it looks like you brock something. The page you are looking for has up
                                        and Vanished.</p>
                                    <h2><a href="{{ url('/') }}">Bring me back Home</a></h2>
                                </div>
                                <br><br>
                            </div>
                        @else
                            @foreach($stores as $store)
                                <div class="col-sm-4 ">
                                    <div class="product-image-wrapper smth_table"
                                         style="; height: 320px;">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id, 'store_name' => $store->name]) }}"
                                                   style="font-size: 25px; color: gray;"><img
                                                            src="{{ $store->profile_url }}" alt=""
                                                            style="box-shadow: 0px 1px gray;height: 220px;"/>
                                                    <br><br>

                                                    {{$store->name}} </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>
                    <div>
                        {{$stores->links()}}

                    </div>
                @endif
                <!--features_items-->



                    {{--<div class="recommended_items"><!--recommended_items-->--}}
                        {{--<h2 class="title text-center">recommended items</h2>--}}

                        {{--<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
                            {{--<div class="carousel-inner">--}}
                                {{--<div class="item active">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend1.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend2.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend2.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend2.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend2.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<div class="product-image-wrapper">--}}
                                            {{--<div class="single-products">--}}
                                                {{--<div class="productinfo text-center">--}}
                                                    {{--<img src="{{asset("product/images/home/recommend2.jpg")}}" alt=""/>--}}
                                                    {{--<h2>$56</h2>--}}
                                                    {{--<p>Easy Polo Black Edition</p>--}}
                                                    {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                                                {{--class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                                {{--</div>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<a class="left recommended-item-control" href="#recommended-item-carousel"--}}
                               {{--data-slide="prev">--}}
                                {{--<i class="fa fa-angle-left"></i>--}}
                            {{--</a>--}}
                            {{--<a class="right recommended-item-control" href="#recommended-item-carousel"--}}
                               {{--data-slide="next">--}}
                                {{--<i class="fa fa-angle-right"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div><!--/recommended_items-->--}}

                </div>
            </div>
        </div>
    </section>

@endsection
