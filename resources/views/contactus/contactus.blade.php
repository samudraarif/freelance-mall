@extends('layouts.guest.header')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<div id="map" style="height: 400px; width: 100%;"></div>

<section class="py-5 news-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="fw-bold">CONTACT US</h1>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function initMap() {
        var mapOptions = {
            zoom: 15,
            center: { lat: -6.24842066589307, lng: 106.99112692454408 } // Change the coordinates to your location
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: { lat: -6.24842066589307, lng: 106.99112692454408 }, // Change the coordinates to your location
            map: map,
            title: 'Metropolitan Mall Bekasi'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD580rvp02_PqQimurTpW90EjQ7dzqEcl8&callback=initMap" async defer></script>

@include('layouts.guest.footer')
@endsection
