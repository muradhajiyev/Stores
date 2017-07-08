@extends('layouts.main')
@section('title', "500 Server Error")

@section('content')
    <div class="container text-center">

        <div class="content-500">
            <h1><b>OPPS!</b>{{ $exception->getMessage() }}</h1>

            <h2><a href="/">Bring me back Home</a></h2>
        </div>
    </div>
@endsection
