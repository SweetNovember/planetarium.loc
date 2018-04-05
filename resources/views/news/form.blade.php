{{--@extends('layouts.app')--}}
{{--@section('content')--}}
<div class="container">
    <div class="panel-body">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{isset($news) ? 'Edit' : 'New'}} news</h1>
            <hr>
        </div>

        @if(isset($news))
            {!! Form::model($news, ['method'=>'put', 'id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
        <div class="form-group row">
            {{--@include('news.listThemes')--}}
        </div>
        <div class="form-group row required">
            {!! Form::label("header","Header",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("header", null, ["class"=>"form-control".($errors->has('header') ? "is-invalid" : ""), "autofocus", "placeholder"=>"Header"]) !!}
                <span id="error-header" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("message","Message",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::textarea("message", null, ["class"=>"form-control".($errors->has('message') ? "is-invalid" : ""), "autofocus", "placeholder"=>"Message"]) !!}
                <span id="error-message" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("category",'Category',["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::select('theme', $themes, null, ['class' => 'form-control', 'id'=>'theme_id', 'name'=>'theme_id','type'=>'text']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::hidden(value(date_default_timezone_set('Europe/Minsk'))) !!}
            {!! Form::hidden('create_date', value(date('Y-m-d H:i:s'))) !!}
            {!! Form::hidden('user_id', value(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())) !!}
            {{--{!! Form::hidden('theme_id', value(1)) !!}--}}
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-10">
                    {{--<button class="btn btn-danger" onclick="ajaxLoad('{{url('news')}}')">Back</button>--}}
                    {{--<a href="javascript:ajaxLoad('{{url('news')}}')" class="btn btn-danger">Back</a>--}}
                    <button class="btn btn-danger" onclick="ajaxLoad('{{url('news')}}');">Back</button>
                    {!! Form::button('Save',['type' => 'submit','class'=>'btn btn-primary'])!!}
                </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
{{--@endsection--}}


