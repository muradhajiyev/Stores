@include('layouts.header')
<!DOCTYPE html>
<html>
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
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:73%;
}

td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
	<title></title>
</head>
<body>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
              $("#toggle").click(function(){
                 
              });
          });
        
          </script>
<center>

 

    @foreach($prod as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper smth_table">
                                    <div class="single-products" style="height: 390px;">
                                        <div class="productinfo text-center">
                                            <a href="/productdetails/{{$product->id}}" style="cursor: pointer;">
                                                <img src="{{$product->profile_url}}" alt=""
                                                     style="height: 260px;box-shadow: 0px 1px gray;"/>
                                                <p style="margin-left: 0px; text-align: left; font-size: 12px"><i
                                                            class="fa fa-eye"
                                                            aria-hidden="true"></i> {{$product->views}}</p>
                                                <h2>{{$product->price}} {{$product->currency->iso}}</h2>
                                                <p>{{$product->name}}</p></a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                      <div class="choose">
                                         <ul class="nav nav-pills nav-justified">
                                           <li><a id="preven"  target="Iframe" href="{{route('remove', ['pro' => $cat->product_id, 'user'=>Auth::user()->id])}}"><i class="fa fa-plus-square"></i>remove from wishlist</a></li>
                                            <iframe name="Iframe" style="display:none"></iframe>
                                             <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                         </ul>
                                     </div> 
                                </div>
                            </div>
                        @endforeach

 <!--  <table id='tablee' class="tablee">
  <tr>
    <th>Number</th>
    <th>Product_ID</th>
    <th>User_ID</th>
  </tr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){
                      $.ajax({
                type:'get',
                url:'{!!URL::to('wishlisttable')!!}',
                dataType:'json',//return data will be json
                success:function(data){
                    //console.log("price");
                    console.log(data);
                      for(var i=0;i<data.length;i++){
                    
                    $('<tr>').html("<td>" + data[i].id + "</td><td>" + data[i].product_id + "</td><td>" + data[i].user_id + "</td><td>" + "</td>").appendTo('#tablee');
                      }
                },
                error:function(){

                }
            });



        });
</script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<script src="{{asset("js/addwish.js")}}"></script>
</table>
</center>
</body>
</html>

