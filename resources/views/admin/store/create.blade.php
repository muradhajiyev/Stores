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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ URL::to('/admin/store') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @lang('words.sname')       <input class="group inner list-group-item-text" type="text"  name="name" /> <br>
                                @lang('words.saddress')   <input  class="group inner list-group-item-text"type="text"  name="address"  /><br>
                                @lang('words.snumber')<input  class="group inner list-group-item-text" type="text"  name="phonenumber"  /><br>
                                @lang('words.semail')   <input class="group inner list-group-item-text"type="text"   name="email"  /><br>

                                <input type="file" name="avatar">


                                <input type="hidden"  name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"><br>
                                <input type="submit" class="btn-success" value="@lang('words.create')" >

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

