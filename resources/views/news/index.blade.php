<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="pull-right">
                <div class="input-group">
                    <input type="text" id="search" name="search"
                           class="form-control"
                           value="{{request()->session()->get('search')}}"
                           onkeydown="if (event.keyCode==13) ajaxLoad('{{url('news')}}?search='+this.value)"
                           placeholder="Search header news">
                    <div class="input-group-btn">
                        <button type="submit"
                                name="button"
                                onclick="ajaxLoad('{{url('news')}}?search='+$('#search').val())"
                                class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table">
        @guest
        @else
            <thead>
            <th colspan="3">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="javascript:ajaxLoad('{{url('news/create')}}')" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Add News</a>
                    </div>
                </div>
            </th>
            </thead>
            @endguest

            <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>
                        {{ $item->header}}
                        {{--{{request()->session()->get('field')=='information'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''}}--}}
                    </td>

                    <td>
                        <b>{{ date("d.m.Y ",strtotime($item->create_date))}}</b><br/>
                        {{ date("H:i:s",strtotime($item->create_date))}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @guest
                        <a class="btn btn-default" href="{{url('news/show/'.$item->id)}}">Show</a>
                        @else
                            <div class="btn-group">
                            <a href="javascript:ajaxLoad('{{url('news/show/'.$item->id)}}')" class="btn btn-info" title="Show">Show</a>
                            <a href="javascript:ajaxLoad('{{url('news/update/'.$item->id)}}')" class="btn btn-warning" title="Edit">Edit</a>
                            <input type="hidden" name="_method" value="delete"/>
                            <a href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('news/delete/'.$item->id)}}','{{csrf_token()}}')"
                               class="btn btn-danger" title="Delete">Delete</a>
                            </div>
                            @endguest

                    </td>
                </tr>

            @endforeach
            </tbody>
    </table>
    <ul class="pagination">
        {{$news->links()}}
    </ul>
</div>

