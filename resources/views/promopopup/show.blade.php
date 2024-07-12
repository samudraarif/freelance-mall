@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
{{-- title
description
image
pdf_url --}}

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Detail Promo</h1>
    <a href="{{ route('promopopup.index') }}" class="btn btn-primary" style="background-color: #38877f;">Back</a>
</div>
<hr />
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $promopopup->title }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('storage/images/'.$promopopup->image) }}" class="img-fluid" alt="Promo Image">
                    </div>
                    <div class="col">
                        <p>{{ $promopopup->description }}</p>
                        <p>Status: {{ $promopopup->status == 1 ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
