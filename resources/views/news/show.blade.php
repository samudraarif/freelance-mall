@extends('layouts.app')

@section('title', 'Detail News')

@section('contents')
{{-- title
description
image
pdf_url --}}

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Detail News</h1>
    <a href="{{ route('news.index') }}" class="btn btn-primary" style="background-color: #38877f;">Back</a>
</div>
<hr />
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $news->title }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('storage/images/'.$news->image) }}" class="img-fluid" alt="news Image">
                    </div>
                    <div class="col">
                        <p>{{ $news->description }}</p>
                        <p>Author: {{ $news->author }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
