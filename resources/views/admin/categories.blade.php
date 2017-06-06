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


         <form class="form-horizontal">
            <label class="control-label">Test:</label>
            <select name="employee" class="form-control">
               <option value="">Salam</option>
            </select>
         </form>
      </div>

      <div class="col-md-6">
         <h3>Remove Category</h3>
         <div class="form-group">
            <label class="control-label">Category:</label>
            <select name="customer" class="form-control " placeholder="select my name">
               @foreach($categories as $category)
                  <option value="">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
      </div>

   </div>

@stop