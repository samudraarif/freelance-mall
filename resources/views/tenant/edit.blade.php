@extends('layouts.app')

@section('title', 'Edit Tenant')

@section('contents')
    <h1 class="mb-0">Edit Tenant</h1>
    <hr />
    <form action="{{ route('tenant.update', $tenant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tenant Name</label>
                <input type="text" name="tenant_name" class="form-control" placeholder="Tenant Name" value="{{ $tenant->tenant_name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $tenant->category }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Floor</label>
                <input type="text" name="floor" class="form-control" placeholder="Floor" value="{{ $tenant->floor }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Description">{{ $tenant->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col">
                @if($tenant->image)
                    <img src="{{ asset('storage/images/'.$tenant->image) }}" class="img-fluid" alt="Tenant Image">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
