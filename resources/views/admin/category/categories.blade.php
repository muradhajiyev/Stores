@extends('admin.master')

@section('main_content')

<link href="{{ asset('css/treeview.css') }}" rel="stylesheet">

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
</div>

<button type="button" name="button">add new category</button>

@stop
