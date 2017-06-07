@extends('admin.master')

@section('main_content')
    <section class="content-header">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>



        <div class="container">


            <div id="stores" class="row list-group">


                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">

                        <div class="caption">

                            <form action="{{ URL::to('/admin/store') }}" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @lang('words.sname')       <input class="group inner list-group-item-text" type="text"  name="name"  value="{{$store->name}}"/> <br>
                                @lang('words.saddress')   <input  class="group inner list-group-item-text"type="text"  name="address"   value="{{$store->address}}"/><br>
                                @lang('words.snumber')<input  class="group inner list-group-item-text" type="text"  name="phonenumber"  value="{{$store->phone_number}}" /><br>
                                @lang('words.semail')   <input class="group inner list-group-item-text"type="text"   name="email"  value="{{$store->email}}" /><br>
                                <input type="hidden"  name="id" value="{{$store->id}}"><br>
                                <input type="submit" class="btn-success" value="@lang('words.save')" >

                            </form>


                            <div >


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>


    </section>
@stop

