@extends('layouts.app')

@section('title', 'Create Magazine')

@section('contents')
    <hr />
    <form action="{{ route('magazine.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <div class="col">
                <label for="pdf_file">PDF File:</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
