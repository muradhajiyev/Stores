@extends('admin.master')

@section('main_content')

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="/css/treeview.css" rel="stylesheet"> -->

    <section class="content-header">
        <h1>
            Categories
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <br><br>

    <div class="row">
        <div class="col-md-6">
            <h3>Category List</h3>
            <ul id="tree1">
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }}
                        <i onclick="window.location='{{ route("categories.create", ['id' => $category->id]) }}'" class="fa fa-plus" aria-hidden="true"></i>
                        @if(count($category->childs))
                            @include('admin.categories.manageChild',['childs' => $category->childs])
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">

            <button type="button" onclick="window.location='{{ route("categories.create") }}'" class="btn btn-default">Add</button>
        </div>

    </div>

@stop
