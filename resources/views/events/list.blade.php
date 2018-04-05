@foreach ($events as $item)
    <tr>
        <td><b>{{ date("d.m.Y ",strtotime($item->date_time_start))}}</b><br/>
            {{ date("H:i:s",strtotime($item->date_time_start))}}</td>
        <td>{{ $item->information}}</td>
        <td><b>{{ date("d.m.Y ",strtotime($item->date_time_end))}}</b><br/>
            {{ date("H:i:s",strtotime($item->date_time_end))}}</td>
        @guest
        <td><a class="btn btn-info" href="{{ route('events.show',$item->id) }}">Show</a></td>
        @else
            <td><a class="btn btn-info" href="{{ route('events.show',$item->id) }}">Show</a>
            </td>
            <td>
                <button class="btn btn-success btn-sign" data-toggle="modal" data-target="#myModal"> Sign</button>

                <input type="hidden" id="user_id" name="user_id"
                       value="{{\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()}}"/>
                <input type="hidden" id="event_id" name="event_id" value="{{$item->id}}"/>

            </td>
            @endguest
    </tr>
@endforeach