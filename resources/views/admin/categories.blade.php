@extends('admin.master')

@section('main_content')
<div class="row">
   <div class="col-md-6">
      <h3>Category List</h3>
      <ul id="tree1" style="style: none">
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
         <select name="customer" class="form-control">
            @foreach($categories as $category)
            <option value="">{{ $category->name }}</option>
            @endforeach
         </select>
      </div>
   </div>
</div>

@stop
