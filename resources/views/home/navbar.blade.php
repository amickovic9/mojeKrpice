<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .navbar {
            background-color: #b22d64; 
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            border: 1px solid #fff;
            border-radius: 4px; 
            padding: 10px 12px;
            margin: 5px; 
            white-space: nowrap; 
        }
        
        .navbar-brand {
            font-weight: 600;
            color: #fff !important;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        .nav-item a {
            transition: color 0.2s, background-color 0.2s;
        }

        .nav-item a:hover {
            color: #f2eef2 !important;
            background-color: #512940;
            transition: .3s ease;
            transform: scale(1.05);
        }

        .fa-icon {
            font-size: 1.25em; 
            margin-right: 8px;
        }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/all-products"><i class="fas fa-home fa-icon"></i>Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/add-product"><i class="fas fa-plus fa-icon"></i>Dodaj Proizvod</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt fa-icon"></i>Prijava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><i class="fas fa-user-plus fa-icon"></i>Registracija</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        @if (Auth::user()->admin)
                            <a class="nav-link" href="/admin"><i class="fas fa-user-shield fa-icon"></i>Admin</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-cart"><i class="fas fa-shopping-cart fa-icon"></i>Moja Korpa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-orders"><i class="fas fa-box fa-icon"></i>Moje Porudžbine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-products"><i class="fas fa-boxes fa-icon"></i>Proizvodi i Porudžbine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us"><i class="fas fa-envelope fa-icon"></i>Kontaktirajte nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt fa-icon"></i>Odjava</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
