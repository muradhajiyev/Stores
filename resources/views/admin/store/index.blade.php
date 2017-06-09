
@extends('admin.master')

@section('main_content')
    <section class="content-header">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

        <div class="container">
            <div class="well well-sm">
                <form action="{{URL::to('/admin/store/')}}"  method="GET" >

                    <input type="search" class="search-field " placeholder="Search &hellip;" name="searchtext"  style="width: 79%">
                    <input type="submit" class=" btn btn-success" value="SEARCH"  style="width: 20%">
                </form>

            </div>


            <div id="stores" class="row list-group">

                @foreach($storelist as $store)
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <img class="group list-group-image" src="{{asset('storage/default-avatar.png')}}" alt="" />
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


                                        <a href="{{ URL::to('/admin/store/'.$store->id.'/edit') }}" style="text-decoration: none; float: right"> <i class="fa fa-cog fa-3x" aria-hidden="true" ></i></a>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <ol class="breadcrumb">
@if(Auth::user()->isStore())
                <a class="btn btn-success" href="{{URL::to('/admin/store/create')}}"><i class="fa fa-plus fa-fw" style="color:white;"></i>@lang('words.addstore')</a>
 @endif
        </ol>
        <div class="container">
        {{$storelist->appends(request()->only('searchtext'))->render()}}
        </div>

    </section>


@stop

