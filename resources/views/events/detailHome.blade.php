HOMEDETAIL
    <div class="col-md-10 col-md-offset-1">
        {{ $item->information }}
        <hr>
        <div class="form-group">
            {{ $item->address_start }}
        </div>

        <div class="form-group">
            {{ $item->person_count }}
        </div>

        <div class="form-group">
            {{ $item->date_time_start }}
        </div>

        <div class="form-group">
            {{ $item->date_time_end  }}
        </div>
        <button class="btn btn-danger" onclick="ajaxLoad('{{url('/home')}}');">Back</button>
    </div>

