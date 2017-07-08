@extends('layouts.main')
@section('title','Create Blog')

@section('content')

    <section>
        @if(Auth::check())
            <meta name="csrf-token" content="{{ csrf_token() }}" />
        @endif
        <div class="container">


            @include('layouts.storeheaderbottom')

            <div class="row">

                @include('layouts.left-sidebar')

                <div class="col-sm-9">
                    <div class="blog-post-area">

                        <div class="single-blog-post">
                            <form    action="{{URL::to('store/blog')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <input type="hidden" value="{{$store->id}}" name="store_id">
                            <h3>Blog Title:<br> <input type="text" name="title">
                            </h3>


                            <h3> Blog Text :
                                <br>
                                <textarea name="text"></textarea>
                            </h3>

                                <input type="file" name="image" class="btn btn-primary">
                                <br>
                                <input type="submit" value="Add" class="btn btn-primary">
                                <br>
                           </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>



@endsection