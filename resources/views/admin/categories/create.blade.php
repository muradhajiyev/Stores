@extends('admin.master')


@section('main_content')

    <div class="container">
        <form id="categoryForm" action="/admin/categories" method="post">
            {{csrf_field()}}
            @if(is_null($categories))
                <h1>Create Root Category</h1><br><br>
                <input type="hidden" value="0" name="parentId" id="parentId">
            @else
                <h1>Create Sub Category of {{$categories->name}}</h1><br><br>
                <input type="hidden" value="{{$categories->id}}" name="parentId" id="parentId">
            @endif

            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Category Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input style="width: 280px" type="text" name="categoryName" id="categoryName" class="form-control"
                           placeholder="Category Name..." required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Specifications:</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select id="multiSelect" name="specificationValues[]" multiple class="form-control">
                            @foreach($specifications as $specification)
                                <option value="{{$specification->id}}">{{$specification->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    <input style="width: 30%" type="submit" class="btn btn-md btn-primary" value="Approve">
                </div>
            </div>
        </form>
    </div>




@endsection