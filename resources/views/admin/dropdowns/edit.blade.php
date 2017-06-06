@extends('admin.master')

@section('main_content')
    <div class="container">
        <form method="post" action="/admin/dropdowns/{{$dropdown->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Dropdown Name:</label>
                </div>
                <div class="col-md-4 ">
                    <input type="text" name="dropdownName" value="{{$dropdown->name}}" id="dropdownName"
                           class="form-control"
                           placeholder="name..." required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label class="form-group">Dropdown Values:</label>
                </div>
                <div class="col-md-2" id="dropdownValues">
                    @foreach($dropdown->dropdownValues as $dropdownValue)

                        <a class="editDropdownValue" data-id="{{$dropdownValue->id}}" data-name="{{$dropdownValue->dropdown_value}}"><span class="glyphicon glyphicon-edit"></span></a>

                        <div class="form-group">
                            <input type="text"  readonly
                                   value="{{$dropdownValue->dropdown_value}}"
                                   id="dropdown_value" class="form-control" required>

                        </div>
                    @endforeach

                </div>

            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <button id="addDropdownValue" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    <input style="width: 30%" type="submit" class="btn btn-md btn-primary" value="Approve">
                </div>
            </div>
        </form>


        <div class="modal fade modalEditDropdownValue" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Dropdown value</h4>
                    </div>
                    <form method="Post" action="/admin/dropdownValues/update">
                        {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="dropdownValueId" id="dropdownValueId" type="hidden">
                            <input type="text" name="editedDropdownValue" id="editedDropdownValue" class="form-control">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                       <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>

@endsection