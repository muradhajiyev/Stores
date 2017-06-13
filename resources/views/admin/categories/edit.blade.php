@extends('admin.master')

@section('main_content')

    <div class="container">
        <form method="post" action="/admin/categories/{{$category->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <h1>Edit {{$category->name}} Category</h1><br><br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Edit Category Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input style="width: 280px" type="text" name="categoryName" value="{{$category->name}}" id="categoryName"
                           class="form-control"
                           placeholder="name..." required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Edit Specifications:</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select id="multiSelect" name="specificationValues[]" multiple class="form-control">
                            {{ $temp=null }}
                            @foreach($specifications as $specification)
                                @if(count($selected_ids))
                                    @foreach($selected_ids as $selected_id)
                                        @if($specification->id == $selected_id->spec_id)
                                            <option value="{{$specification->id}}"
                                                    selected>{{$specification->name}}</option>
                                            @break
                                        @elseif($specification->id < $selected_id->spec_id)
                                            <option value="{{$specification->id}}">{{$specification->name}}</option>
                                            @break
                                        @elseif($specification->id != $selected_id->spec_id && $selected_id == $selected_ids->last())
                                            )
                                            <option value="{{$specification->id}}">{{$specification->name}}</option>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                @else
                                    <option value="{{$specification->id}}">{{$specification->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    <input style="width: 30%" type="submit" class="btn btn-md btn-primary" value="Update">
                </div>
            </div>
        </form>
    </div>

@endsection
