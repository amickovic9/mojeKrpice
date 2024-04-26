<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Dodajte prilagođene stilove */
        .dropdown-menu {
            background-color: black;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-toggle {
            width: 120px; /* Širina dropdown dugmeta */
            text-align: left; /* Tekst se poravnava na levo */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Naslov -->
        <h2 class="text-center mb-4">Our Products</h2>

        <!-- Dropdown meni za sortiranje -->
        <div class="dropdown mb-3">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                Sort by
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="?sort=price_asc">Price Low to High</a></li>
                <li><a class="dropdown-item" href="?sort=price_desc">Price High to Low</a></li>
                <li><a class="dropdown-item" href="?sort=date_asc">Date Ascending</a></li>
                <li><a class="dropdown-item" href="?sort=date_desc">Date Descending</a></li>
            </ul>
        </div>
        
        <div class="row">
            <!-- Prikaz proizvoda -->
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->contact }}</p>
                        <p class="card-text">{{ $product->size }}</p>
                        <p class="card-text">{{ $product->price }} rsd</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript kod za omogućavanje dropdown menija
        var dropdownMenuButton = document.getElementById('dropdownMenuButton');
        dropdownMenuButton.addEventListener('click', function () {
            var dropdownMenu = dropdownMenuButton.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });
    </script>
</body>
</html>
