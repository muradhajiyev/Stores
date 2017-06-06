<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog | @yield('title')</title>
    <link href="{{asset("product/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/prettyPhoto.css")}}" rel="stylesheet">
    <link href="{{asset("store")}}" rel="stylesheet">
    <link href="{{asset("product/css/animate.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/main.css")}}" rel="stylesheet">
    <link href="{{asset("product/css/responsive.css")}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset("product/js/html5shiv.js")}}"></script>
    <script src="{{asset("product/js/respond.min.js")}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset("product/images/ico/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset("product/images/ico/apple-touch-icon-72-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset("product/images/ico/apple-touch-icon-57-precomposed.png")}}">
</head><!--/head-->

<body>

@include('store.header')
@yield('content')

@include('store.footer')


<script src="{{asset("product/js/jquery.js")}}"></script>
<script src="{{asset("product/js/price-range.js")}}"></script>
<script src="{{asset("product/js/jquery.scrollUp.min.js")}}"></script>
<script src="{{asset("product/js/bootstrap.min.js")}}"></script>
<script src="{{asset("product/js/jquery.prettyPhoto.js")}}"></script>
<script src="{{asset("product/js/main.js")}}"></script>
</body>
</html>