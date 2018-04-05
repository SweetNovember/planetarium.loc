@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <table class="table">
                    @foreach($rss->channel->item as $item)
                        <tr>
                            <td rowspan="4">
                                <img src="{{$item->enclosure['url']}}"
                                     class="img-rounded" alt="{{$item->enclosure['url']}}"
                                     width="140px" height="140px">
                            </td>
                        </tr>
                        <tr>
                            <td>{{date("d.m.Y H:i:s",strtotime($item->pubDate))}}</td>
                            <td><b>{{$item->category}}</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>{{$item->title}}</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">{{$item->description}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{$item->link}}" class="btn btn-info" >Подробнее</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection