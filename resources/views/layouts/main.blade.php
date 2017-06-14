<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head><!--/head-->

<body>


@include('layouts.header')

@yield('content')

@include('layouts.footer')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--<script src="{{asset("product/js/jquery.js")}}"></script>-->
<script src="{{asset("js/jquery.livequery.js")}}"></script>
<script src="{{asset("product/js/price-range.js")}}"></script>
<script src="{{asset("product/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("product/js/bootstrap.min.js")}}"></script>
<script src="{{asset("product/js/jquery.prettyPhoto.js")}}"></script>
<script src="{{asset("product/js/main.js")}}"></script>
<script src="{{asset("js/dynamicProductForm.js")}}"></script>
<script src="{{asset("js/dropzone.js")}}"></script>
<script src="{{asset("product/js/autocomplete.js")}}"></script>

</body>
</html>