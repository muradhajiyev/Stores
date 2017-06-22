@include('layouts.header')
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset("product/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/prettyPhoto.css")}}" rel="stylesheet">
    <link href="{{asset("store")}}" rel="stylesheet">
    <link href="{{asset("product/css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/responsive.css")}}" rel="stylesheet">
    <link href="{{asset("css/dropzone.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset("product/css/price-range.css")}}">

    {{--<!--[if lt IE 9]>--}}
    <script src="{{asset("product/js/html5shiv.js")}}"></script>
    <script src="{{asset("product/js/respond.min.js")}}" ></script>
    {{--<![endif]-->--}}

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset("product/images/ico/apple-touch-icon-72-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset("product/images/ico/apple-touch-icon-57-precomposed.png")}}">
<style>
.col-sm-4 {text-align: center;}
.center {margin: auto 0px;}
.float_left {float: left;}
</style>
	<title></title>
</head>
<body>

 <center>
    @foreach($prod as $product)
                            <div id="hh" class="col-sm-4" style="height: 260px; width: 270px;" style="text-align: center;">
                                <div class="product-image-wrapper smth_table" >
                                    <div class="single-products" >
                                        <div class="productinfo text-center">
                                            <a href="/productdetails/{{$product->id}}" style="cursor: pointer;">
                                                <img src="{{$product->profile_url}}" alt=""
                                                     style="height: 260px; box-shadow: 0px 1px gray;"/>
                                                <p style="margin-right: 0px; text-align: center; font-size: 12px"><i
                                                            class="fa fa-eye"
                                                            aria-hidden="true"></i> {{$product->views}}</p>
                                                <h2>{{$product->price}} {{$product->currency->iso}}</h2>
                                                <p>{{$product->name}}</p></a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopp ing-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                      <div class="choose">
                                         <ul class="nav nav-pills nav-justified">

                                         <form method="post" action="{{ action('WishlistController@removewish') }}">
                                          <input type="hidden" name="product_id" value="{{ $product->id }}">{!! csrf_field() !!}
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                                                 <li><a id="preven"  target="Iframe" ><i class="fa fa-minus-square"></i><input type="submit" value="remove from wishlist"></a></li>
                                             
                                            </form>
                                            <iframe name="Iframe" style="display:none"></iframe>
                                             <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                         </ul>
                                     </div> 
                                </div>
                            </div>
                        @endforeach
                        <center>

<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("product/js/jquery.js")}}"></script>
<script src="{{asset("js/jquery.livequery.js")}}"></script>
<script src="{{asset("product/js/price-range.js")}}"></script>
<script src="{{asset("product/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("product/js/bootstrap.min.js")}}"></script>
<script src="{{asset("product/js/jquery.prettyPhoto.js")}}"></script>
<script src="{{asset("product/js/main.js")}}"></script>
<script src="{{asset("js/dynamicProductForm.js")}}"></script>
<script src="{{asset("js/dropzone.js")}}"></script>
</table>
</body>
</html>

