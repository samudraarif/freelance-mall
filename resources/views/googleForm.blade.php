@extends('layouts.guest.header')

@section('content')
<div style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center;">
    @if ($formLink)
        <iframe src="{{ $formLink->url }}" width="90%" height="90%" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    @else
        <p>No form link available</p>
    @endif
</div>
@endsection
