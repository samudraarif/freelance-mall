@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
    {{-- title
description
image
pdf_url --}}

    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Detail Message Customer</h1>
        <a href="{{ route('contact.index') }}" class="btn btn-primary" style="background-color: #38877f;">Back</a>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>Name :</strong> {{ $contact->name }}</h5>
                    <p class="card-text"><strong>Contact :</strong> {{ $contact->contact }}</p>
                    <p class="card-text"><strong>Email :</strong> {{ $contact->email }}</p>
                    <p class="card-text"><strong>Description :</strong> {{ $contact->description }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
