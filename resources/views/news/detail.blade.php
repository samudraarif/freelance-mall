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
            /* Set a max-width for the image */
            height: auto;
            /* Maintain aspect ratio */
            display: block;
            /* Center the image */
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
        <h1 style="text-align: center">{{ $news->title }}</h1>
        <p style="text-align: center" class="author-name">by {{ $news->author }}</p>
        @if ($news->image)
            <img src="{{ asset('storage/images/' . $news->image) }}" class="news-image" alt="{{ $news->title }}">
        @endif
        <div class="news-content">
            <p>{{ $news->description }}</p>
        </div>
    </div>
    @include('layouts.guest.footer')
@endsection
