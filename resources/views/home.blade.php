@extends('layouts.default')
@section('content')

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
                                        <a href="javascript:ajaxLoad('{{url('events/detail/'.$item->id)}}')"
                                           class="btn btn-info"
                                           title="Detail...">Detail...</a>
                                    </div>
                                        <div class="col-sm-5">
                                            <br>
                                            <a href="javascript:ajaxLoad('{{url('events/detail/'.$item->id)}}')"
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

@endsection
