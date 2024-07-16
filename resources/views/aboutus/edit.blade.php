@extends('layouts.app')

@section('title', 'Edit About Us')

@section('contents')
    <h1 class="mb-0">Edit About Us</h1>
    <hr />
    <form action="{{ route('aboutus.update',$aboutu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $aboutu->title }}" placeholder="Enter Title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter Description">{{ $aboutu->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
@endsection
