@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body">
                <div class="panel-heading">
                    <h2>Selected Event</h2>
                </div>

            </div>
            <table class="table">
                <tr>
                    <td>Date Start:</td>
                    <td>{{ date("d.m.Y ",strtotime($event->date_time_start))}}</td>
                </tr>
                <tr>
                    <td>Information:</td>
                    <td>{{ $event->information}}</td>
                </tr>
                <tr>
                    <td>Date End:</td>
                    <td>{{ date("d.m.Y ",strtotime($event->date_time_start))}}</td>
                </tr>
                <tr>
                    <td>Person Count:</td>
                    <td>{{$event->person_count}}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection