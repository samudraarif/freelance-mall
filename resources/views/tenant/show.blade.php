@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Image</label>
            <div class="image-container">
                @if($tenant->image)
                    <img src="{{ asset('storage/images/'.$tenant->image) }}" class="img-fluid" alt="Tenant Image">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Tenant</label>
            <input type="text" name="tenant_name" class="form-control" placeholder="Nama Tenant" value="{{ $tenant->tenant_name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $tenant->category }}" readonly>
        </div>
    </div>
    <div class="row">


    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $tenant->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $tenant->updated_at }}" readonly>
        </div>
    </div>
@endsection
