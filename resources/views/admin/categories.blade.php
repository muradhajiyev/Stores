@extends('admin.master')

@section('main_content')
<section class="content-header">
   <h1>
      Categories
      <small>Control panel</small>
   </h1>

   <br>

</section>

<div class="col-md-3">
   <div class="box box-default collapsed-box">

      <div class="box-header with-border">
         <h3 class="box-title">Expandable</h3>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
         </div>
      </div>

      <div class="box-body" style="display: none;">
         The body of the box
      </div>

   </div>
</div>

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
<div id="demo" class="collapse">
   Lorem ipsum dolor sit amet, consectetur adipisicing elit,
   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
</div>

<div class="row">
   <div class="col-xs-12">
      <div class="box">

         <div class="box-header">
            <h3 class="box-title" id="hoverTableID">Categories</h3>
         </div>

         <div class="box-body" id="body">

            <table id="example2" class="table table-bordered table-hover">

               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                  </tr>
               </thead>

               <tbody>
                  @foreach ($categories as $category)
                  <tr>
                     <td>{{ $category->id }}</td>
                     <td>{{ $category->name }}</td>
                  </tr>
                  @endforeach
               </tbody>

            </table>

         </div>

      </div>
   </div>
</div>
@stop
