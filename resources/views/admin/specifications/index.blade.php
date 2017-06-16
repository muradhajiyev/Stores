@extends('admin.master')

@section('main_content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <col width="150">
                <col width="150">
                <col width="150">
                <col width="150">
                <col width="200">
                <col width="50">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Unit</th>
                    <th>Dropdown</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($specifications as $specification)
                    <tr>
                        <td>{{$specification->id}}</td>
                        <td>{{$specification->name}}</td>
                        <td>@if($specification->type) {{$specification->type->name}} @endif</td>
                        <td>@if($specification->unit) {{$specification->unit->name}} @endif</td>
                        <td>@if($specification->dropdown) {{$specification->dropdown->name}} @endif</td>

                        <td>
                            <a href="/admin/specifications/{{$specification->id}}/edit" data-toggle="tooltip" data-placement="top" title="Edit Record" class="btn btn-warning">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        </td>
                        <td>
                            <form action="/admin/specifications/{{$specification->id}}" method="Post">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr> @endforeach

                </tbody>
            </table>
            <br>

            <a href="{{ url('/admin/specifications/create') }}" class="btn btn-success">Add New
            </a>
        </div>
    </div>

@endsection
