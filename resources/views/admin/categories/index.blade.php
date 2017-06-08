@extends('admin.master')

@section('main_content')
<div class="row">
   <div class="col-md-8">
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
   <button type="button" onclick="window.location='{{ route("categories.create") }}'" class="btn btn-success col-md-3">Add New Category</button>
</div>
@stop
