@extends('layouts.app')

<style>
    .loading {
        background: lightgrey;
        padding: 15px;
        position: fixed;
        border-radius: 4px;
        left: 50%;
        top: 50%;
        text-align: center;
        margin: -40px 0 0 -50px;
        z-index: 2000;
        display: none;
    }

    .form-group.required label:after {
        content: " *";
        color: red;
        font-weight: bold;
    }
</style>
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div id="content">
        @include('news.index')
    </div>
    <div class="loading">
        <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
        <br>
        <span>Loading</span>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/ajax.js')}}"></script>
@endsection