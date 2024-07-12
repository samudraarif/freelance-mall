@extends('layouts.app')

@section('title', 'Edit Promo')

@section('contents')
    <h1 class="mb-0">Edit Promo</h1>
    <hr />
    <form action="{{ route('promopopup.update', $promopopup->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $promopopup->title }}">
            </div>
            <div class="col">
                <label class="form-label">Status:</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $promopopup->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $promopopup->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Image</label>
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col">
                @if($promopopup->image)
                    <img src="{{ asset('storage/images/'.$promopopup->image) }}" class="img-fluid" alt="Promo Image" style="max-height: 100px">
                @else
                    <p>No image available</p>
                @endif
            </div>          
        </div>
    
        <div class="row">
            <div class="col">
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
    
@endsection
