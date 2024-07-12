@extends('layouts.app')

@section('title', 'Edit magazine')

@section('contents')
    <h1 class="mb-0">Edit magazine</h1>
    <hr />
    <form action="{{ route('magazine.update', $magazine->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $magazine->title }}">
            </div>
            <div class="col">
                <label class="form-label">Description:</label>
                <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $magazine->description }}">
            </div>
        </div>
    
        <div class="row mb-3">
            <!-- Image -->
            <div class="col">
                <label class="form-label">Image</label>
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">PDF File:</label>
                <input type="file" name="pdf_file" accept="pdf" class="form-control">
            </div>
        </div>
    
        <div class="row mb-3">
            <!-- PDF File -->

            <div class="col">
                @if($magazine->image)
                    <img src="{{ asset('storage/images/'.$magazine->image) }}" class="img-fluid" alt="magazine Image" style="max-height: 100px">
                @else
                    <p>No image available</p>
                @endif
            </div>
            <div class="col">
                @if($magazine->pdf_url)
                    <a href="{{ asset('storage/pdfs/'.$magazine->pdf_url) }}" class="btn btn-danger">
                        <i class="fas fa-download"></i> Download PDF
                    </a>
                @else
                    <p>No PDF available</p>
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
