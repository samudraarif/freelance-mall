@extends('layouts.guest.header')

@section('content')
    <style>
        .custom-carousel-control {
            background-color: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-carousel-control-icon {
            color: white;
            font-size: 24px;
        }

        .modal-content {
            border-radius: 0;
            overflow: hidden;
        }

        .modal-body {
            display: flex;
            align-items: center;
        }

        .instagram-photo-container {
            position: relative;
        }

        .instagram-photo-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .instagram-caption {
            padding: 15px;
        }

        .instagram-profile {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .instagram-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .instagram-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .instagram-actions button {
            font-size: 14px;
        }

        .instagram-actions .btn {
            margin-right: 10px;
        }

        .profile-img {
            width: 40px;
            height: auto;
            object-fit: cover;
        }
    </style>
    <style>
        .news-green-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-green-card .card-img-top {
            width: 100%;
            height: 200px;
            /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
            object-fit: contain;
            background-color: white;
        }

        .news-green-card .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .news-green-card .card-title,
        .news-green-card .card-text {
            margin-bottom: 1rem;
        }

        .news-green-card .custom-button {
            margin-top: auto;
        }

        .modal-body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* Add padding for margin around the image */
        }

        .modal-body img {
            max-height: 80vh;
            /* Adjust as needed to fit the viewport */
            max-width: 100%;
            object-fit: contain;
            /* Preserve aspect ratio */
            margin: auto;
            /* Center the image */
        }
    </style>


    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('storage/images/' . $dataPromo->image) }}" class="img-fluid" alt="Modal Image">
                </div>
            </div>
        </div>
    </div>



    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/slide1.svg" class="d-block w-100" alt="slider1">
                <div class="carousel-caption d-none d-md-block text-end text-white">
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;"> METROPOLITAN</h1>
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;">MALL BEKASI</h1>
                    <p style="font-size: 40px; text-align: right;">Dunia Belanja dan Rekreasi</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/slide1.svg" class="d-block w-100" alt="slider1">
                <div class="carousel-caption d-none d-md-block text-end text-white">
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;"> METROPOLITAN</h1>
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;">MALL BEKASI</h1>
                    <p style="font-size: 40px; text-align: right;">Dunia Belanja dan Rekreasi</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/slide1.svg" class="d-block w-100" alt="slider1">
                <div class="carousel-caption d-none d-md-block text-end text-white">
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;"> METROPOLITAN</h1>
                    <h1 class="fw-bold" style="font-size: 80px; text-align: right;">MALL BEKASI</h1>
                    <p style="font-size: 40px; text-align: right;">Dunia Belanja dan Rekreasi</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="promo-section">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($data->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                @foreach ($chunk as $banner)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="text-center">
                                            <a href="#">
                                                <img src="{{ $banner['BANNER_IMAGE'] }}" class="d-block w-100 promo-img"
                                                    alt="{{ $banner['BANNER_NAME'] }}">
                                            </a>
                                            <div class="promo-desc">
                                                {{-- <h5>{{ $banner['BANNER_NAME'] }}</h5>
                                                <p>{{ $banner['BANNER_DESC'] }}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#promoCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon custom-carousel-control-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#promoCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon custom-carousel-control-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col text-center">
            <a href="{{ url('/event') }}" id="read-more-btn" class="btn btn-primary mt-4 custom-button">Read More</a>
        </div>
    </section>




    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/menu/metlandcard.jpg" class="d-block w-100">
            </div>
        </div>
    </div>


    <section class="py-5 news-bg">
        <div class="container ">
            <h2 class="text-center mb-4">News</h2>
            <div class="row justify-content-center">
                @foreach ($dataNews as $index => $item)
                    <div class="col-md-3 {{ $index >= 4 ? 'd-none' : '' }}">
                        <a href="{{ route('news.detail', $item->id) }}" class="text-decoration-none">
                            <div class="card news-green-card">
                                <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top"
                                    alt="Gambar 1">
                                <div class="card-body">
                                    <h2 class="text-center fw-bold">{{ $item->title }}</h2>
                                    <p class="card-text">{{ Str::words($item->description, 10, '...') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="video-container">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/YOUTUBE_VIDEO_ID"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row section-mgz">
            <div class="row">
                <div class="col-md-6">
                    <!-- Bagian kiri dengan judul "Follow Us" dan gambar -->
                    <div class="text-center vertical-line d-none d-md-block">
                        <h2 class="fw-bold">Follow Us</h2>
                        <div class="row">
                            @foreach ($instagramItems->take(6) as $item)
                                <div class="col-4 mb-3">
                                    <img src="{{ $item['media_url'] }}" class="img-fluid instagram-photo"
                                        data-toggle="modal" data-target="#instagramModal"
                                        data-caption="{{ $item['caption'] }}">
                                </div>
                            @endforeach
                        </div>
                        <a href="https://www.instagram.com/metmalbekasi/?hl=en"
                            class="btn btn-primary mt-4 custom-button">Follow Us On Instagram</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text-center">
                        <h2>E-Magazine</h2>
                        @foreach ($dataMagazine as $index => $item)
                            <div class="{{ $index >= 1 ? 'd-none' : '' }}">
                                <img src="{{ asset('storage/images/' . $item->image) }}" class="img-fluid"
                                    alt="E-Magazine">
                                <div class="col text-center">
                                    <a href="/media" class="btn btn-primary mt-4 custom-button">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="instagramModal" tabindex="-1" aria-labelledby="instagramModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row no-gutters">
                        <!-- Image section -->
                        <div class="col-md-8">
                            <img src="" class="img-fluid w-100" id="instagramPhoto">
                        </div>

                        <!-- Caption section -->
                        <div class="col-md-4">
                            <div class="p-3">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="images/logo.png" class="profile-img rounded-circle mr-2"
                                        style="margin-right:10px" alt="Profile Image">
                                    <strong> metmalbekasi</strong>
                                </div>
                                <p id="instagramCaption"></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- jQuery dan Popper.js (diperlukan untuk komponen Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#imageModal').modal('show');

        document.addEventListener("DOMContentLoaded", function() {
            // Periksa apakah modal sudah ditampilkan sebelumnya
            var modalShown = localStorage.getItem('modalShown');

            // Jika belum ditampilkan sebelumnya, tampilkan modal
            if (!modalShown) {

                // $('#imageModal').modal('show');
                // Ganti dengan cara menampilkan modal sesuai dengan framework atau library yang digunakan

                // Set localStorage untuk menandai bahwa modal sudah ditampilkan
                localStorage.setItem('modalShown', true);
            }
        });
        // localStorage.clear();
    </script>


    {{-- <script>
        $(document).ready(function() {
            $('.instagram-photo').on('click', function() {
                var photoSrc = $(this).attr('src');
                var photoCaption = $(this).data('caption');
                var postUrl = $(this).data('post-url');
                $('#instagramPhoto').attr('src', photoSrc);
                $('#instagramCaption').text(photoCaption);
                $('#likeButton').data('url', postUrl);
                $('#commentButton').data('url', postUrl);
            });

            $('#likeButton').on('click', function() {
                var url = $(this).data('url');
                window.open(url, '_blank');
            });

            $('#commentButton').on('click', function() {
                var url = $(this).data('url');
                window.open(url, '_blank');
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('.instagram-photo').on('click', function() {
                var postUrl = 'https://www.instagram.com/metmalbekasi/';
                window.open(postUrl, '_blank');
            });
        });
    </script>
    @include('layouts.guest.footer')
@endsection
