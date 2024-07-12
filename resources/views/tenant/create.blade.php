@extends('layouts.app')

@section('title', 'Create Tenant')

@section('contents')

    <hr />
    <form action="{{ route('tenant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="tenant_name">Tenant Name:</label>
                <input type="text" name="tenant_name" id="tenant_name" class="form-control" placeholder="Nama Tenant" required>
            </div>
            <div class="col">
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" class="form-control" placeholder="Category">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="floor">Floor:</label>
                <input type="text" name="floor" id="floor" class="form-control" placeholder="Floor">
            </div>
            <div class="col">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" value="no description" readonly>no description</textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
