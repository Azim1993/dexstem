@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors.flash')
        <div class="well">
            <h1 class="text-danger">You Do not have permission to access this page!</h1>
        </div>
    </div>
@endsection