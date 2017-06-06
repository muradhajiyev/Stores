@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        @if(\Illuminate\Support\Facades\Auth::user()->isStore())

                            <strong> You are logged As Store!</strong>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <strong> You are logged As Admin!</strong>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->isUser())
                            <strong> You are logged As User!</strong>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
