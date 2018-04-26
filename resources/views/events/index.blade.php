<div class="row">
    <div class="col-lg-8">
        <input type="text" id="search" name="search"
               class="form-control"
               value="{{request()->session()->get('search')}}"
               onkeydown="if (event.keyCode==13) ajaxLoad('{{url('events')}}?search='+this.value)"
               placeholder="Search event">
        <button type="submit" id="button-search" name="button"
                onclick="ajaxLoad('{{url('events')}}?search='+$('#search').val())"
                class="btn">
            <i class="fas fa-search" aria-hidden="true"></i>
        </button>
        @guest
        @else
            <a href="javascript:ajaxLoad('{{url('news/create')}}')" class="btn btn-success">
                <i class="far fa-plus-square" aria-hidden="true"></i> News</a>
            @endguest
    </div>
</div>

<div class="panel panel-body col-sm-offset-1 col-md-10">
Events Blade PHP
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
                    @guest
                    <div class="col-sm-5">
                        <br>
                        <a href="javascript:ajaxLoad('{{url('events/show/'.$item->id)}}')"
                           class="btn btn-info"
                           title="Detail...">Detail...</a>
                    </div>
                    @else
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
                               title="Want to go">Want to go</a>
                        </div>
                        @endguest
                </div>
            </div>
        </div>
        <br>
    @endforeach
</div>
{{--<table class="table">--}}
{{--<thead>--}}
{{--<tr>--}}
{{--<th>Date time event Start</th>--}}

{{--<th>Information</th>--}}
{{--{{request()->session()->get('field')=='information'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}--}}
{{--<th>Date time event End</th>--}}
{{--<th>Person count</th>--}}
{{--</tr>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--@foreach ($events as $item)--}}
{{--<tr>--}}
{{--<td><b>{{ date("d.m.Y ",strtotime($item->date_time_start))}}</b><br/>--}}
{{--{{ date("H:i:s",strtotime($item->date_time_start))}}</td>--}}
{{--<td>{{ $item->information}}</td>--}}
{{--<td><b>{{ date("d.m.Y ",strtotime($item->date_time_end))}}</b><br/>--}}
{{--{{ date("H:i:s",strtotime($item->date_time_end))}}</td>--}}
{{--<td>{{ $item->person_count}}</td>--}}

{{--<td>--}}
{{--<a href="javascript:ajaxLoad('{{url('events/show/'.$item->id)}}')" class="btn btn-info"--}}
{{--title="Show">Show</a>--}}
{{--</td>--}}
{{--@guest--}}
{{--@else--}}
{{--<td>--}}
{{--<a href="#" class="btn btn-block" id="sign" data-id="{{$item->id}}">Want to go</a>--}}
{{--</td>--}}
{{--@endguest--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
{{--</table>--}}
<ul class="pagination">
    {{$events->links()}}
</ul>
</div>
