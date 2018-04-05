@extends('layouts.app')
@section('content')
<div class="container">
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Hello, {{Auth::user()->name}}</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel panel-title">
                        My Events
                    </div>

                    <br>

                    @foreach ($events as $item)
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{$item->url}}" class="img-rounded" alt="{{$item->header}}" height="150" width="230">
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <b>{{$item->header}}</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <br><b>Begin:</b> {{date("d.m.Y H:i:s",strtotime($item->date_time_start))}}
                                    </div>
                                    <div class="col-sm-5">
                                        <br><b>End:</b> {{date("d.m.Y H:i:s",strtotime($item->date_time_end))}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <br> <b>Cost:</b> {{$item->cost}}
                                    </div>
                                    <div class="col-sm-5">
                                        <br>
                                        <div class="freePlaces">
                                            Free places:{{$item->free_count}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <br>
                                        <a href="javascript:ajaxLoad('{{url('events/show/'.$item->id)}}')"
                                           class="btn btn-info"
                                           title="Detail...">Detail...</a>
                                    </div>
                                        <div class="col-sm-5">
                                            <br>
                                            <a href="javascript:ajaxLoad('{{url('events/show/'.$item->id)}}')"
                                               class="btn btn-info"
                                               title="Refuse">Refuse</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{--<table class="table table-bordered">--}}
{{--<th>Date time event</th>--}}
{{--<th>Details</th>--}}
{{--<th>Departure address</th>--}}
{{--<th></th>--}}
{{--@foreach ($events as $item)--}}
{{--<tr>--}}
{{--<td>{{ date("d.m.Y H:i:s",strtotime($item->date_time_start)) }} </td>--}}
{{--<td>{{ $item->information }} </td>--}}
{{--<td>{{ $item->address_start }} </td>--}}
{{--<td><a href="#" class="btn btn-block" id="refuse" data-id="{{$item->id}}">Refuse</a></td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</table>--}}
{{--<script type="text/javascript">--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}
{{--});--}}
{{--//-------- Refuse sign to event--}}
{{--$(document).on('click','#refuse',function (e) {--}}
{{--e.preventDefault();--}}
{{--var id = $(this).data('id');--}}
{{--alert(id);--}}
{{--$.post('{{URL::to("event/destroy")}}',{id:id}, function (data) {--}}
{{--console.log(data);--}}
{{--})--}}
{{--})--}}
{{--</script>--}}

@endsection
