@extends('admin.master')

@section('main_content')
    <div class="container">
        <form method="post" action="/admin/specifications">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Specification Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input type="text" name="specificationName" id="specificationName" class="form-control"
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
                        <option value="" selected disabled>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row" id="dropdownValue" hidden="true">
                <div class="col-md-2">
                    <label class="form-group">Dropdowns:</label>
                </div>
                <div  class="col-md-4">
                    <select  class="form-control" id="specificationDropdown" name="specificationDropdown">
                        <option value="" selected disabled>Select Dropdown</option>
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
                        <option value="" selected disabled>Select Unit</option>
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