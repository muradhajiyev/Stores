@extends('admin.master')

@section('main_content')
    <section class="content-header">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
        <h1>
            Stores

        </h1>
        <ol class="breadcrumb">
            @if(\Illuminate\Support\Facades\Auth::user()->isStore())
                <input type="button" class="btn-success" value="Add new Store"  onclick="addStore()">
<div style="display: none;" id="div">

                <form action="{{route('addstore')}}" method="post" id="addform"  >

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    Store  name:       <input type="text"  name="name" /> <br>
                    Store address:     <input type="text"  name="address"  /><br>
                    Store phone number:<input type="text"  name="phonenumber"  /><br>
                    Store email:       <input type="text"   name="email"  /><br>
                    <input type="hidden"  name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"><br>
                    <input type="submit" class="btn-success" value="Add" >

                </form></div>
           @endif

        </ol>


    </section>

    <hr>

    @foreach($storelist as $store)
<form action="{{route('deleteeditstore')}}" method="post" class="form">


    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Store  name:       <input type="text" value="{{$store->name}}" name="name"   />
        Store address:     <input type="text" value="{{$store->address}}" name="address"   />
        Store phone number:<input type="text" value="{{$store->phone_number}}" name="phonenumber"   />
        Store email:       <input type="text" value="{{$store->email}}" name="email"   />
                           <input type="hidden" value="{{$store->id}}" name="storeid">

    <input type="submit" class="btn-danger" value="Delete" >


        @if(\Illuminate\Support\Facades\Auth::user()->isStore())
        <input type="submit" class="btn-success" value="Edit" >
        @endif

</form>
        <hr>
    @endforeach

    <script>
        $(".form").submit(function(event) {

            /* stop form from submitting normally */
            event.preventDefault();

               /* get the action attribute from the <form action=""> element */
            var $form = $( this ),
                    url = $form.attr( 'action' );
            /* find which button clicked */
            var btn = $(this).find("input[type=submit]:focus").val();
            /* get all  data of form */
            var formData = $(this).serializeArray();

            /* inserts  clicked button value to formdata */
            formData.push({ name: "button", value: btn });
if(btn=='Delete'){
    if (window.confirm("Are you sure?")) {
        var posting = $.post(url, formData);
    }

}
if(btn=='Edit') var posting = $.post(url, formData);
            /* reload  page */
            posting.done(function( data ) {
                location.href = "{{route('storelist')}}"
            });
        });
        $("#addform").submit(function(event) {

            /* stop form from submitting normally */
            event.preventDefault();

            /* get the action attribute from the <form action=""> element */
            var $addform = $( this ),
                    url = $addform.attr( 'action' );

            var posting = $.post( url, $(this).serialize());

            /* Reload page */
            posting.done(function( data ) {

                location.href = "{{route('storelist')}}"

            });

        });
function addStore(){
    $('#div').show();
}
    </script>
@stop
