@if(count($errors->all()) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('verify_contact'))
    <div class="alert alert-danger" role="alert">
        {{ session('verify_contact') }}
    </div>
@endif


@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

