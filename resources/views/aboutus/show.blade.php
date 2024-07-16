@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
{{-- title
description
image
pdf_url --}}

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Detail About Us</h1>
    <a href="{{ route('news.index') }}" class="btn btn-primary" style="background-color: #38877f;">Back</a>
</div>
<hr />
<div class="row">
    <div class="col">
        <div class="card">
            <div class="container mt-5">
                <h2>Show About Us</h2>
                <div class="mb-3">
                    <strong>Title:</strong>
                    {{ $aboutu->title }}
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    {{ $aboutu->description }}
                </div>
                <a href="{{ route('aboutus.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
