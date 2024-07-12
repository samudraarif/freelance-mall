@extends('layouts.guest.header')

@section('content')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('storage/images/' . $dataPromo->image) }}" style="max-width: 100%; max-height: 80vh;" class="img-fluid" alt="Modal Image">
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
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Promo</h2>
            <div class="row">
                @foreach ($data as $index => $banner)
                    <div class="col-md-6 col-lg-3 promo-card {{ $index >= 4 ? 'd-none' : '' }}">
                        <div class="col text-center">
                            <a href="#">
                                <img src="{{ $banner['BANNER_IMAGE'] }}" class="card-img-top promo-img"
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
            <div class="col text-center">
                <button id="read-more-btn" class="btn btn-primary mt-4 custom-button">Read More</button>
            </div>
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
                        <div class="card news-green-card">
                            <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top" alt="Gambar 1">
                            <div class="card-body">
                                <h2 class="text-center fw-bold">{{ $item->title }}</h2>
                                <p class="card-text">{{ Str::words($item->description, 10, '...') }}</p>
                            </div>
                        </div>
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
                                    <img src="{{ $item['media_url'] }}" class="img-fluid">
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



    <!-- jQuery dan Popper.js (diperlukan untuk komponen Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#imageModal').modal('show');
        document.getElementById('read-more-btn').addEventListener('click', function() {
            var hiddenCards = document.querySelectorAll('.promo-card.d-none');
            hiddenCards.forEach(function(card) {
                card.classList.remove('d-none');
            });
            this.style.display = 'none'; // Sembunyikan tombol "Read More" setelah diklik
        });

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


    @include('layouts.guest.footer')
@endsection
