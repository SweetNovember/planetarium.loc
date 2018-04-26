<div class="container">
    <div class="detail">
        <div class="row">
            <div class="col-sm-4">
                <img src="{{$item->url}}" class="img-rounded" alt="{{$item->header}}" height="150" width="230">
            </div>
            <div class="col-sm-3 pull-right">
                <button class="btn btn-danger" onclick="ajaxLoad('{{url('news')}}');">Back</button>
            </div>
        </div>
        <div class="detail-header col-sm-4">
            {{$item->header}}
        </div>
        <div class="row">
            <div class="col-sm-4">
                <i class="far fa-clock">{{date("d.m.Y H:i:s",strtotime($item->create_date))}}</i>
            </div>
            <div class="col-sm-3">
                {{ $name_theme }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                {{ $item->message }}
                <div class="form-group">
                    <i>Author:</i> {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
