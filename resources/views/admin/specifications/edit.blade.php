@extends('admin.master')

@section('main_content')
    <div class="container">
        <form method="post" action="/admin/specifications/{{$specification->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Specification Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input type="text" name="specificationName" value="{{$specification->name}}" id="specificationName" class="form-control"
                           placeholder="name..." required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Type:</label>
                </div>
                <div class="col-md-4 ">
                    <select class="form-control" id="specificationType" name="specificationType" required>
                        <option value="{{$specification->type->id}}" selected >{{$specification->type->name}}</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row" id="dropdownValue">
                <div class="col-md-2">
                    <label class="form-group">Dropdowns:</label>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="specificationDropdown" name="specificationDropdown">
                        @if($specification->dropdown)
                        <option value="{{$specification->dropdown->id}}" selected >{{$specification->dropdown->name}}</option>
                        @endif
                        @foreach($dropdowns as $dropdown)
                            <option value="{{$dropdown->id}}">{{$dropdown->name}}</option>
                        @endforeach
                    </select><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Unit:</label>
                </div>
                <div class="col-md-4 ">
                    <select class="form-control" id="specificationUnit" name="specificationUnit" required>
                        @if($specification->unit)
                        <option value="{{$specification->unit->id}}" selected >{{$specification->unit->name}}</option>
                        @endif
                        <option value="">No unit applicable</option>
                    @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
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