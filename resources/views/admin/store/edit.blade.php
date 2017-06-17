@extends('admin.master')

@section('main_content')
<section class="content-header">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

<div class="container" style="height: 100%;width: 100%;">
    <div class="" >
        <div class="item" style="margin-top: 1%; box-shadow: 1px 1px 1px black;">
            <div class="thumbnail" style="margin-top: 1%">
                <h1 style="margin-left: 5%">EDIT STORE</h1>
                <hr>
                <center>
                    Edit your cover photos
                </center>
                <br>

            <div class="row">
              @foreach($store->image_urls as $key=>$img)
                
                        <div class="col-sm-4" ">
                            <div class="thumbnail" style= "height: 340px; ">
                            <img src="{{$img->path}}" class="girl img-responsive" alt=""
                                 style="width: 100%; height: 85%; "/>
                             <br>
                             <button type="button" class="btn btn-danger deleteCover" id="deleteCover" value="{{$img->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('words.delete')</button>
                         </div>
                         </div>
                  
            @endforeach
            </div>
        


            <div class="row">
               <br>
            </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
               <br>
               <br>
               <br>       
                <center>
                  <!-- <p >Cover sekillerinizi asagidaki saheye click ederek artira bilersiniz</p> -->
                   <p>@lang('words.addcover')</p>
                </center>
                <div class="dropzone" id="fileUpload1" style="margin:10px;" > </div>

                <form class="form-horizontal form-label-left" novalidate style="margin-top: 5%; width:90%;margin-left: 5%;" action="{{ URL::to('/admin/stores') }}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="item form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> @lang('words.sname') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="{{$store->name}}" required="required" type="text">
                        </div>
                    </div>

                    <div id="imageIds"></div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> @lang('words.saddress')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="address" name="address"   value="{{$store->address}}" required="required"   class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phonenumber"> @lang('words.snumber')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="phonenumber" name="phonenumber"  value="{{$store->phone_number}}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('words.semail') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required"  value="{{$store->email}}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="decription">@lang('words.description') <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea type="text"  name="description" rows="8" required="required" maxlength="1000"   class="form-control col-md-7 col-xs-12">{{$store->description}}</textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slogan">Slogan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  name="slogan" rows="8" required="required" maxlength="100"  value="{{$store->slogan}}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <input type="hidden"  name="id" value="{{$store->id}}"><br>
                    <input type="hidden" name="settings" value="{{config('settings.max_cover_photo_count')}},{{config('settings.max_file_size')}},{{count($store->image_urls )}}" id="settings">


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('words.replaceprofile')
                            </label>
                            <input type="file" name="avatar" class="btn btn-file">
                            <br>
                            <br>
                            <button type="button" class="btn btn-primary"  onclick="redirect()">Cancel</button>
                            <input type="submit" class="btn btn-success" id="submitStore" value="@lang('words.save')" >
                        </div>
                    </div>
                </form>

                <!-- /page content -->
            </div>
        </div>
    </div>
</div>


    <script>
   function redirect(){
        window.location="{{URL::to('/admin/stores')}}";
    }
</script>
 <script src="{{asset('js/createStore.js')}}"></script>
 <script src="{{asset('js/dropzone.js')}}"></script>


</section>
@stop




