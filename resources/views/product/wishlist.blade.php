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

  @foreach($prod as $cat)
                        <div class="col-sm-4" style="height: 380px;width: 300px;">
                            <div class="product-image-wrapper">
                                <div class="single-products" >
                                    <div class="productinfo text-center">

                                        <a href="#"><img src="{{asset("product/images/home/product5.jpg")}}" alt="" />
                                        <h2 id="h2color">{{$cat->price}}</h2>
                                        <p>{{$cat->name}}</p></a>
                                        <script type="text/javascript">
                                            console.log($cat->price);
                                        </script>
                                        <input type="hidden" id="idd" value="{{$cat->id}}">
                                        <input type="hidden" id="iss" value="{{Auth::user()->id}}">
                                         
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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

