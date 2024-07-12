@extends('layouts.guest.header')

@section('content')

<section class="promo-section">
  <div class="container">
      <h2 class="text-center mb-4 fw-bold">Promo</h2>
      <div class="row">
          @foreach($data as $index => $banner)
              <div class="col-md-6 col-lg-3 promo-card {{ $index >= 4 ? 'd-none' : '' }}">
                  <div class="col text-center">
                      <a href="#">
                          <img src="{{ $banner['BANNER_IMAGE'] }}" class="card-img-top promo-img" alt="{{ $banner['BANNER_NAME'] }}">
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
<script>
  document.getElementById('read-more-btn').addEventListener('click', function() {
      var hiddenCards = document.querySelectorAll('.promo-card.d-none');
      hiddenCards.forEach(function(card) {
          card.classList.remove('d-none');
      });
      this.style.display = 'none'; // Sembunyikan tombol "Read More" setelah diklik
  });
</script>
  @include('layouts.guest.footer')
@endsection

