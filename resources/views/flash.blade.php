@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-block col-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{{ $error }}</p></li>
            @endforeach
        </ul>
    </div>
@endif
