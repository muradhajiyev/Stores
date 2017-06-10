
@extends('admin.master')

@section('main_content')

    <section class="content-header">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

        <div class="container">                       
         <div class="thumbnail" style="box-shadow: 1px 1px 1px black; margin-right: 100px;">
          <div class="row">
            <div class="well well-sm">

                <form action="{{URL::to('/admin/store/')}}"  method="GET" class="item  col-xs-4 col-lg-4" style="margin-left: 1%;">

                    <input type="text" placeholder="Search" name="searchtext">
                    <input type="submit" class=" btn btn-success" value="SEARCH" >
                </form>
                
                <strong>Category Title</strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grid</a>
                </div>
         
            @if(Auth::user()->isStore())
                <a class="btn btn-success" href="{{URL::to('/admin/store/create')}}" style="margin-left: 29%"><i class="fa fa-plus fa-fw" style="color:white;"></i>@lang('words.addstore')</a>
            @endif
        
            </div>


            <div id="stores" class="row list-group" style="margin-right: 2%; margin-left: 2%;">

                @foreach($storelist as $store)
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <img class="group list-group-image" src="{{asset("images/home/default-avatar.png")}}" alt="StorePicture" />
                            <div class="caption">
                                <h3 class="group inner list-group-item-heading">
                                    {{$store->name}}</h3>
                                <p class="group inner list-group-item-text">
                                    {{$store->address}} </p>
                                <p class="group inner list-group-item-text">
                                    {{$store->phone_number}}</p>
                                <p class="group inner list-group-item-text">
                                    {{$store->email}}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <form action="{{ URL::to('/admin/store/'.$store->id) }}" method="POST" >
                                            <input name="_token" type="hidden" value="{{csrf_token()}} " >
                                            <input name="_method" type="hidden" value="DELETE" >
                                                                                     <input type="submit" class=" btn btn-danger" value="@lang('words.delete')" >
                                        </form>
                                    </div>
                                    <div class="col-xs-12 col-md-6">

                                        <a href="{{ URL::to('/admin/store/'.$store->id.'/edit') }}" class=" btn btn-danger" style="background-color: green; border: 0;"><i class="fa fa-pencil-square-o"> </i> Edit</a>
                                    </div>


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
    </section>


@stop

