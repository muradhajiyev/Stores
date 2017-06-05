@extends('admin.master')

@section('main_content')
    <div class="container">
        <form method="post" action="/admin/dropdowns">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Dropdown Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input type="text" name="dropdownName" id="dropdownName" class="form-control"
                           placeholder="name..." required>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Dropdown Values:</label>
                </div>
                <div class="col-md-4 ">
                    <input type="text" name="dropdownValues" id="dropdownValues" class="form-control"
                           placeholder="value1,value2,value3" required>
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    <input style="width: 30%" type="submit" class="btn btn-md btn-primary" value="Approve">
                </div>
            </div>
        </form>
    </div>
@endsection