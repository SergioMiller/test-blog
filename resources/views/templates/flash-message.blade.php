@if ($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

@if ($message = session('error'))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif

@if ($message = session('warning'))
    <div class="alert alert-warning">
        {{ $message }}
    </div>
@endif

@if ($message = session('info'))
    <div class="alert alert-info">
        {{ $message }}
    </div>
@endif

@if ($message = session('danger'))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif
