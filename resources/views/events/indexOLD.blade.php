@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{--<script type="text/javascript" src="js/jquery-3.3.1.js"></script>--}}
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The nearest events</div>

                <div class="panel-body">
                    {{--{!! Form::open() !!}--}}
                    <table class="table">
                        @foreach ($events as $item)
                            <tr>
                                <td><b>{{ date("d.m.Y ",strtotime($item->date_time_start))}}</b><br/>
                                    {{ date("H:i:s",strtotime($item->date_time_start))}}</td>
                                <td>{{ $item->information}}</td>
                                <td><b>{{ date("d.m.Y ",strtotime($item->date_time_end))}}</b><br/>
                                    {{ date("H:i:s",strtotime($item->date_time_end))}}</td>
                                @guest
                                <td><a class="btn btn-block" href="{{ route('events.show',$item->id) }}">Show</a></td>
                                @else
                                    <td><a class="btn btn-block" href="{{ route('events.show',$item->id) }}">Show</a>
                                    </td>
                                    <td>
                                        {{--<button class="btn btn-success btn-sign" data-toggle="modal" data-target="#myModal"> Sign</button>--}}
                                        <a href="#" class="btn btn-block" id="sign" data-id="{{$item->id}}">Sign</a>
                                        {{--<input type="hidden" id="user_id" name="user_id"--}}
                                               {{--value="{{\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()}}"/>--}}
                                        {{--<input type="hidden" id="event_id" name="event_id" value="{{$item->id}}"/>--}}

                                    </td>
                                    @endguest
                            </tr>
                        @endforeach
                    </table>
                    {{--{!! Form::close() !!}--}}
                    <div id="result"></div>
                    {{--<ul id="pagination" class="pagination"></ul>--}}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        //-------- Refuse sign to event
        $(document).on('click','#sign',function (e) {
            var id = $(this).data('id');
            alert(id);
            $.post('{{URL::to("/destroy")}}',{id:id}, function (data) {
                console.log(data);
            })
        })
    </script>

@endsection

{{--<script type="text/javascript" src="js/ajax.js"></script>--}}
{{--{!! $n->render() !!}--}}
