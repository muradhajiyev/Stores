@extends('admin.master')

@section('main_content')
    <section class="content-header">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

        <div class="container">
            <div class="well well-sm">
                <strong>Category Title</strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grid</a>
                </div>
            </div>


            <div id="stores" class="row list-group">

                @foreach($storelist as $store)
                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
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
                                    <form action="{{ URL::to('store/'.$store->id) }}" method="POST" >
                                        <input name="_token" type="hidden" value="{{csrf_token()}} " >
                                        <input name="_method" type="hidden" value="DELETE" >


                                        <input type="submit" class=" btn btn-danger" value="@lang('words.delete')" >
                                    </form>
                                    </div>
                                <div class="col-xs-12 col-md-6">
                                    <form action="{{ URL::to('store/'.$store->id.'/edit') }}" method="get" >
                                        @if(\Illuminate\Support\Facades\Auth::user()->isStore())
                                            <input type="submit" class=" btn btn-success" value="@lang('words.edit')" >
                                        @endif
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        <ol class="breadcrumb">


            @if(\Illuminate\Support\Facades\Auth::user()->isStore())
                <a class="btn btn-success" href="{{URL::to('store/create')}}">@lang('words.addstore')</a>

            @endif
        </ol>

        <div class="container">
            <ul class="pagination">

          @for($i=1; $i<=$count; $i++)
        <li><a href="#" onclick="senddata(); return false;" id="pages">{{$i}}</a></li>


    @endfor
            </ul>
            </div>
    </section>



@stop
