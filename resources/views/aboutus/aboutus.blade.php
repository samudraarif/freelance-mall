@extends('layouts.guest.header')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/mall-home2.jpg') }}" class="d-block w-100 h-80" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="fw-bold"></h1>
            </div>
        </div>
    </div>

    <section class="py-5 news-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if ($aboutus)
                        <h1 class="fw-bold">{{ $aboutus->title }}</h1>
                        {!! nl2br(e($aboutus->description)) !!}
                    @else
                        <h1 class="fw-bold">Default Title</h1>
                        <p>Default description text.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('layouts.guest.footer')
@endsection
