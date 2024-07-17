@extends('layouts.guest.header')


@section('content')
    <style>
        .magazine-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .magazine-card .card-img-top {
            width: 100%;
            height: 200px;
            /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
            object-fit: contain;
        }

        .magazine-card .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .magazine-card .card-title,
        .magazine-card .card-text {
            margin-bottom: 1rem;
        }

        .magazine-card .custom-button {
            margin-top: auto;
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/menu/slider.jpg" class="d-block w-100 h-80" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold">Media</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="py-5 news-bg">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: #38877f;">Latest News</h2>
            <div class="row">
                @foreach ($dataNews as $index => $news)
                    <div class="col-md-12 mb-4 {{ $index >= 2 ? 'd-none' : '' }}">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-4 mb-md-2 d-flex justify-content-center">
                                <img src="{{ asset('storage/images/' . $news->image) }}" style="max-height: 300px" class="img-fluid"
                                    alt="News Image 1">
                            </div>
                            <div class="col-md-6" style="color: #38877f;">
                                <h2 class="fw-bold">{{ $news->title }}</h2>
                                <p>{{ Str::words($news->description, 10, '...') }}</p>
                                <a href="{{ route('news.detail', $news->id) }}" class="btn btn-primary mt-4 custom-button">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-5 mediapromo-section">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: #38877f;">Promo</h2>
            <div class="row justify-content-center">
                @foreach ($dataPromo as $index => $banner)
                    <div class="col-md-4 col-sm-6 mb-4 {{ $index >= 6 ? 'd-none' : '' }}">
                        <div class="mediapromo-item">
                            <img src="{{ $banner['BANNER_IMAGE'] }}" class="img-fluid" alt="{{ $banner['BANNER_NAME'] }}">
                            <div class="mediapromo-overlay">
                                {{-- <h5>{{ $banner['BANNER_NAME'] }}</h5>
                                <p>{{ $banner['BANNER_DESC'] }}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 news-bg">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: #38877f;">E-Magazine</h2>
            <div class="row">
                @foreach ($dataMagazine as $index => $item)
                    <div class="col-md-4 {{ $index >= 3 ? 'd-none' : '' }}">
                        <div class="card magazine-card">
                            <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top"
                                alt="Magazine Cover 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ Str::words($item->description, 10, '...') }}</p>
                                <a href="{{ route('magazine.detail', $item->id) }}"
                                    class="btn btn-primary custom-button">View</a>
                                <a href="{{ asset('storage/pdfs/' . $item->pdf_url) }}"
                                    class="btn btn-secondary custom-button">Download</a>
                                {{-- <button class="btn btn-info custom-button">Previous Edition</button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('layouts.guest.footer')
@endsection
