<style>
    .article{
        text-align: justify;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <label>Image</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
            {{date("d.m.Y H:i:s",strtotime($item->create_date))}}
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            {{ $name_theme }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 article">
            {{ $item->message }}
            <div class="form-group">
                <i>Author:</i> {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </div>

            <button class="btn btn-danger" onclick="ajaxLoad('{{url('news')}}');">Back</button>
        </div>
    </div>

</div>
