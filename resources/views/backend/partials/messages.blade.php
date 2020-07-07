@if ($errors->any())
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))

<div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
</div>
    
@endif


{{-- @if (Session::has('errors'))

<div class="alert alert-danger">
    <p>{{ Session::get('errors') }}</p>
</div>
    
@endif --}}