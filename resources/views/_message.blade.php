{{-- show success and error message  --}}

@if(!empty(session('success')))
<div class="alert alert-success" role="alert"> {{session('success')}}</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger" role="alert"> {{session('error')}}</div>
@endif

{{-- <div>
    @if(Session::has('error'))
        <div class="w3-panel w3-red" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="w3-panel w3-green" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
</div> --}}