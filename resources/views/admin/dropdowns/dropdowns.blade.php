@extends('admin.master')

@section('main_content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <col width="400">
                <col width="400">
                <col width="50">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($dropdowns as $dropdown)
                        <tr>
                        <td>{{$dropdown->id}}</td>
                        <td>{{$dropdown->name}}</td>
                        <td>
                            <button data-toggle="tooltip" data-placement="top" title="Edit Record" type="button"
                                    class="btn btn-warning">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('deleteD', ['id' => $dropdown->id]) }}"  data-placement="top"
                                    title="Delete Record"  class="btn btn-danger" id="deleteDropdown">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <br>
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"
                                    aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel">Approval</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Are you sure to delete the record?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/dropdownsForm') }}" class="btn btn-success">Add New
            </a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
