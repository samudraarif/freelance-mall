@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
{{-- title
description
image
pdf_url --}}

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Detail Magazine</h1>
    <a href="{{ route('magazine.index') }}" class="btn btn-primary" style="background-color: #38877f;">Back</a>
</div>
<hr />
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $magazine->title }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('storage/images/'.$magazine->image) }}" class="img-fluid" alt="magazine Image">
                    </div>
                    <div class="col">
                        <p>{{ $magazine->description }}</p>
                        <a href="{{ asset('storage/pdfs/'.$magazine->pdf_url) }}" class="btn btn-danger">
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
