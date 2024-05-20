<!DOCTYPE html>
<html lang="sr">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <style>
        .dropdown-menu {
            background-color: #212529;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-toggle {
            width: 120px;
            text-align: left;
        }
        .card {
            border: none;
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Naši Proizvodi</h2>

        <form method="GET" action="" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <div class="input-group ">
                <div class="input-container">
                    <input type="text" id="input" name="search" class="form-control" aria-label="Search" aria-describedby="searchButton" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" required="">
                    <label for="input" class="label">Pretraga</label>
                <div class="underline"></div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <select class="form-select" id="sortBy" name="sortBy">
                    <option value="none" {{ !isset($_GET['sortBy']) ? 'selected' : '' }}>Sortiraj</option>
                    <option value="Datum-najstariji" {{ isset($_GET['sortBy']) && $_GET['sortBy'] == 'date_asc' ? 'selected' : '' }}>Datum - Najstariji</option>
                    <option value="Datum-najnoviji" {{ isset($_GET['sortBy']) && $_GET['sortBy'] == 'date_desc' ? 'selected' : '' }}>Datum - Najnoviji</option>
                    <option value="Cena-najniza" {{ isset($_GET['sortBy']) && $_GET['sortBy'] == 'price_asc' ? 'selected' : '' }}>Cena - Najniža</option>
                    <option value="Cena-najvisa" {{ isset($_GET['sortBy']) && $_GET['sortBy'] == 'price_desc' ? 'selected' : '' }}>Cena - Najviša</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-container">
                <input type="text" id="size" name="size" class="form-control" aria-label="Size" value="{{ isset($_GET['size']) ? $_GET['size'] : '' }}" required="">
                <label for="size" class="label">Veličina</label>
            <div class="underline"></div>
        </div>
    </div>
</div>
<div class="col-md-4" style="margin-top: 20px; margin-left: 45%;">
    <div class="input-group">
        <button type="submit" class="btn btn-outline-dark" style="width: 150px;">Pretraga</button>
    </div>
</div>
</form>



        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card"style="border: 1px solid black;">
                        <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Slika Proizvoda">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->size }}</p>
                            <p class="card-text">{{ $product->price }} rsd</p>
                            <a href="/proizvod/{{$product->id}}" class="btn btn-outline-dark">Prikaži više</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var dropdownMenuButton = document.getElementById('dropdownMenuButton');
        dropdownMenuButton.addEventListener('click', function () {
            var dropdownMenu = dropdownMenuButton.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });
    </script>
    @include('footer')
</body>
</html>
