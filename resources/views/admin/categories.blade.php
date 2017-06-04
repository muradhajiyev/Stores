@extends('admin.master')

@section('main_content')
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

<!-- <div class="col-md-4 col-md-offset-1">
@foreach ($categories as $category)
<button type="button" name="button">delete</button><span>{{ $category->name }}</span>
<br>
@endforeach
</div> -->

<div class="row">
   <div class="col-xs-12">
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
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
               <!-- <tfoot>
               <tr>
               <th>Rendering engine</th>
               <th>Browser</th>
               <th>Platform(s)</th>
               <th>Engine version</th>
               <th>CSS grade</th>
            </tr>
         </tfoot> -->
      </table>
   </div>
   <!-- /.box-body -->
   <!-- /.box -->
<!-- /.col -->
</div>

@stop
