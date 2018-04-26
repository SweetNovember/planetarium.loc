<div class="row">
    <div class="col-lg-8">
        <input type="text" id="search" name="search"
               class="form-control"
               value="{{request()->session()->get('search')}}"
               onkeydown="if (event.keyCode==13) ajaxLoad('{{url('news')}}?search='+this.value)"
               placeholder="Search header news">
        <button type="submit" id="button-search" name="button"
                onclick="ajaxLoad('{{url('news')}}?search='+$('#search').val())"
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

<div class="row">
    @foreach ($news as $item)
        {{--<div class="col-lg-8">--}}
        <div class="article centered">
            <div class="row">
                <img src="#" class="img" alt="IMG">
            </div>

            <div class="row">
                <i class="far fa-clock dt">
                    {{ date("d.m.Y ",strtotime($item->create_date))}}
                    {{ date("H:i:s",strtotime($item->create_date))}}
                </i>
            </div>

            <div class="row">
                <b>{{ $item->header}}</b>
            </div>

            <div class="row">
                @guest
                <a class="btn btn-link" href="{{url('news/show/'.$item->id)}}">More...</a>
                @else
                    <div class="btn">
                        <a href="javascript:ajaxLoad('{{url('news/show/'.$item->id)}}')"
                           class="btn btn-link"
                           title="Show">More...</a>
                        <a href="javascript:ajaxLoad('{{url('news/update/'.$item->id)}}')"
                           class="btn btn-link" title="Edit">Edit</a>
                        <input type="hidden" name="_method" value="delete"/>
                        <a href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('news/delete/'.$item->id)}}','{{csrf_token()}}')"
                           class="btn btn-link" title="Delete">Delete</a>

                    </div>
                    @endguest
            </div>
        </div>
        {{--</div>--}}
    @endforeach
</div>

<div class="row centered">
    <ul class="pagination">
        {{$news->links()}}
    </ul>
</div>










