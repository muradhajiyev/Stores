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
            @if(count($category->childs))
            @include('admin.manageChild',['childs' => $category->childs])
            @endif
         </li>
         @endforeach
      </ul>
   </div>
   <div class="col-md-6">
      <h3>Add New Category</h3>

      {!! Form::open(['route'=>'add.category']) !!}

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <strong>{{ $message }}</strong>
      </div>
      @endif

      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
         {!! Form::label('name','Title:') !!}
         {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
         <span class="text-danger">{{ $errors->first('name') }}</span>
      </div>

      <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
         {!! Form::label('parent_id','Category:') !!}
         <!-- {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!} -->
         <select class="form-control" name="parent0" id="parent0" >
            <<option selected value="" disabled="true">Select Category</option>
            @foreach($categories as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
         </select>
         <span class="text-danger">{{ $errors->first('parent_id') }}</span>
      </div>

      <div class="form-group">
         <button class="btn btn-success">Add New</button>
      </div>

      {!! Form::close() !!}

   </div>


   <div class="col-md-6">
      <h3>Remove Category</h3>
      <div class="form-group">
         <label>Customer:</label>
         <div>
            <select name="customer" class="form-control " placeholder="select my name">
               @foreach($categories as $category)
                  <option value="">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
      </div>
   </div>

</div>



<!-- <div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">
<h3 class="box-name">Hover Data Table</h3>
</div>

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Parent ID</th>
<th>Name</th>
</tr>
</thead>

<tbody>

</tbody>
</table>
</div>
</div>
</div>
</div> -->
@stop
