@extends('admin.master')

@section('main_content')
    <section class="content-header">
        <style> 
        input[type=searchtext] {

            height: 44px;
            width: 130px;
            font-size: 10px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=searchtext]:focus {
            width: 65%;
        }
        </style>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style-large.css')}}">

        <div class="container" style="width: 1050px;">                       
         <div class="thumbnail" style="width: 100%;box-shadow: 1px 1px 1px black; margin-right: 10%;">
          <div class="row">
  


        <div id="stores" class="panel-heading" style="margin-right: 2%; margin-left: 0%;">
            <div class="well well-sm" style="height: 70px; width:100%; margin-left: 0%;">
                <form action="{{URL::to('/admin/stores/')}}"  class="col-xs-4 col-lg-4" method="GET" class="" style="width: 70%;">
                   <input type="submit" class="btn btn-success" value="SEARCH" style="height: 48px;">
                   <input type="searchtext" placeholder="Search..." name="searchtext" >
                </form>

            @if(Auth::user()->isStore())
                <a class="btn btn-success" href="{{URL::to('/admin/stores/create')}}" style="height: 40px;font-size: 18px;float: right;"><i class="fa fa-plus fa-fw" style="color:white;"></i>
                </a>
            @endif
                <!-- <strong>Category Title</strong> -->
               <!--  <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grid</a>
                </div> -->
       
            </div>
        @foreach($storelist as $store)

             <div class="col-sm-3">
                <div class="product-image-wrapper smth" style="box-shadow: 1px 2px 2px gray; height: 340px; width: 200px; margin-left: 10%;">
                <a href="{{ route('stores.index', $store->id)}}"></a>

                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ url('/store') . '?' . http_build_query(['store_id' => $store->id, 'store_name' => $store->name]) }}" style="font-size: 20px;color: orange;">
                            <img src="{{ $store->profile_url}}" alt="" style="box-shadow: 0px 2px 4px 0px gray; width: 100%; height: 200px;"/>
                           <br>  <span>{{$store->name}}</span></a><p><i> {{$store->email}}</i></p>
                          </div>

                    </div>
                    </a>
                     <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <form action="{{ URL::to('/admin/stores/'.$store->id) }}" method="POST" id = "deleteStore">
                                <input name="_token" type="hidden" value="{{csrf_token()}} " >
                                <input name="_method" type="hidden" value="DELETE" >
                                <button type = "button" onclick="ensure(this)" class="deleteStore btn btn-danger" value="@lang('words.delete')" style="margin-left: 15%;background-color: #f48064;border:0;">@lang('words.delete')</button>
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a href="{{ URL::to('/admin/stores/'.$store->id.'/edit') }}" class="btn btn-danger" style="background-color: #5fbe28; border: 0;"><i class="fa fa-pencil-square-o"> </i> Edit</a>
                        </div>


                    </div>
                </div>

            </div>

        @endforeach
            </div>
        </div>

       

        <div class="container">
        {{$storelist->appends(request()->only('searchtext'))->render()}}
        </div>
</div>
            </div>
    </section>

     <script src="{{asset('js/deleteStore.js')}}"></script>


@stop