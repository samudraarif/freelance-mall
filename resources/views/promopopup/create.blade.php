@extends('layouts.app')

@section('title', 'Create Promo')

@section('contents')
    <hr />
    <form action="{{ route('promopopup.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col">
                <label for="description">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
