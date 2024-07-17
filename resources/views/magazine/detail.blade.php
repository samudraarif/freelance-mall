@extends('layouts.guest.header')

@section('content')
    <style>
        .news-container {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .news-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        .news-content {
            margin-top: 20px;
        }

        .author-name {
            font-style: italic;
            color: gray;
        }
    </style>
    <div class="container news-container">
        <h1 style="text-align: center">{{ $magazine->title }}</h1>
        <p style="text-align: center">
            <a href="{{ asset('storage/pdfs/' . $magazine->pdf_url) }}" class="author-name">Download PDF</a>
        </p>
        @if ($magazine->image)
            <img src="{{ asset('storage/images/' . $magazine->image) }}" class="news-image" alt="{{ $magazine->title }}">
        @endif
        <div class="news-content">
            <p>{{ $magazine->description }}</p>
        </div>
    </div>
    @include('layouts.guest.footer')
@endsection
