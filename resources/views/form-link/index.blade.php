@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Manage Google Form Link</h1>

    <!-- Add/Edit Link Form -->
    <form action="{{ route('form-link.store') }}" method="POST">
        @csrf
        @if ($formLink)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="url">Google Form URL:</label>
            <input type="text" id="url" name="url" class="form-control" value="{{ $formLink ? $formLink->url : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ $formLink ? 'Update Link' : 'Add Link' }}</button>
    </form>

    <!-- Display the Link -->
    @if ($formLink)
        <div class="mt-4">
            <h2>Current Google Form Link</h2>
            <iframe src="{{ $formLink->url }}" width="640" height="480" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            <form action="{{ route('form-link.destroy', $formLink->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Link</button>
            </form>
        </div>
    @endif
</div>
@endsection
