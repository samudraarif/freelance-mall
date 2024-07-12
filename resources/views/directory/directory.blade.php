@extends('layouts.guest.header')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/menu/slider.jpg" class="d-block w-100 h-80" alt="Slide 1">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="fw-bold">Directory</h1>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card custom-card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Find a Shop</h2>
                    <!-- <form method="GET" action="{/**{route('search') }*/}" class="row g-3 align-items-center"> -->
                    <form method="GET" action="#" class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-select custom-input" id="category" aria-label="Select category">
                                <option value="">Select Category</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Beauty">Beauty</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="floor" class="form-label">Floor</label>
                            <select name="floor" class="form-select custom-input" id="floor" aria-label="Select floor">
                                <option value="">Select Floor</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search by Name</label>
                            <div class="input-group">
                                <input type="text" name="tenant_name" class="form-control custom-input" id="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <button type="submit" class="btn btn-primary custom-btn" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center" id="pagination-container">
        <!-- Items will be dynamically loaded here -->
    </div>
    <div class="row justify-content-center mt-4">
        <div id="pagination-controls">
            <!-- Pagination controls will be dynamically added here -->
        </div>
    </div>
</div>
<br>

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- Kolom pertama dengan informasi tentang Metropolitan Mall Bekasi -->
          <h2 class="fw-bold">Metropolitan Mall Bekasi</h2>
          <p class="header-text"><i class="fas fa-map-marker-alt me-2"></i>KH. Noer Ali Mall Metropolitan Building South Bekasi 17148</p>
          <p class="header-text"><i class="fas fa-mobile-alt me-2"></i>(021) 855 5555 </p>
          <p class="header-text"><i class="fa fa-shopping-cart me-2"></i>Opening Hours: 10.00 - 22.00</p>
          <p class="header-text"><i class="fa fa-envelope me-2"></i>marketing@malmetropolitan.com</p>
        </div>
        <div class="col-md-6">
          <!-- Kolom kedua dengan informasi tentang Metland Groups dan follow us -->
          <div>
            <h2 class="fw-bold">Metland Groups</h2>
            <p class="mb-1">Metland.</p>
            <p class="mb-1">Metland Card. </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          <div class="col-md-6">
            <h5>Follow Us On</h5>
            <!-- Ikuti kami di media sosial -->
            <ul class="list-unstyled">
                <a href="#" class="me-3"><i class="fab fa-facebook text-light fa-2x"></i></a>
                <a href="#" class="me-3"><i class="fab fa-twitter text-light fa-2x"></i></a>
                <a href="#" class="me-3"><i class="fab fa-tiktok text-light fa-2x"></i></a>
                <a href="#" class="me-3"><i class="fab fa-instagram text-light fa-2x"></i></a>
                <a href="#" class="me-3"><i class="fab fa-youtube text-light fa-2x"></i></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
    // JavaScript for handling pagination

    const data = @json($data); // Convert PHP array to JavaScript array

    const itemsPerPage = 16; // Assuming 16 items per page (4 rows x 4 columns)
    const totalPages = Math.ceil(data.length / itemsPerPage);
    let currentPage = 1;
   
    function displayPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageItems = data.slice(start, end);

        const container = document.getElementById('pagination-container');
        container.innerHTML = ''; // Clear previous items
        
        pageItems.forEach(item => {
            const col = document.createElement('div');
            col.classList.add('col-md-3');

            const card = document.createElement('div');
            card.classList.add('card', 'directory-green-card');
            
            const img = document.createElement('img');
            img.classList.add('card-img-top');
            img.src = item.TENANT_LOGO;
            img.alt = item.TENANT_NAME;
            img.style.maxHeight = '200px';  // Set maksimum tinggi
            img.style.backgroundColor = 'white';
            img.style.width = 'auto';  // Atur lebar agar dapat menyesuaikan
            img.style.maxWidth = '100%';  // Maksimum lebar 100% dari kontainer
            

            const body = document.createElement('div');
            body.classList.add('card-body');
            // body.style.maxWidth = '152px';

            const title = document.createElement('h5');
            title.classList.add('text-center', 'fw-bold');
            title.textContent = item.TENANT_NAME;

            const category = document.createElement('p');
            category.classList.add('card-text');
            category.style.fontSize = '12px';  // Mengatur ukuran font menjadi 12px
            category.textContent = `Category = ${item.TENANT_CATEGORY}`;

            const floor = document.createElement('p');
            floor.classList.add('card-text');
            floor.textContent = `Floor = ${item.TENANT_FLOOR}`;

            body.appendChild(title);
            body.appendChild(category);
            body.appendChild(floor);

            card.appendChild(img);
            card.appendChild(body);

            col.appendChild(card);
            container.appendChild(col);
        });
    }

    function updatePaginationControls() {
        const controlsContainer = document.getElementById('pagination-controls');
        controlsContainer.innerHTML = '';

        const prevButton = document.createElement('button');
        prevButton.classList.add('btn', 'btn-primary', 'me-2');
        prevButton.textContent = 'Previous';
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                displayPage(currentPage);
                updatePaginationControls();
            }
        });

        const nextButton = document.createElement('button');
        nextButton.classList.add('btn', 'btn-primary');
        nextButton.textContent = 'Next';
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                displayPage(currentPage);
                updatePaginationControls();
            }
        });

        controlsContainer.appendChild(prevButton);
        controlsContainer.appendChild(nextButton);
    }

    displayPage(currentPage); // Display the first page by default
    updatePaginationControls(); // Display pagination controls

</script>

@endsection

