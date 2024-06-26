<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmena korisnika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .action-icons {
            font-size: 1.5rem; /* Povećaj veličinu ikona */
            margin-right: 10px; /* Dodaj malo razmaka između ikona */
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Izmena korisnika</h2>
                <form action="/admin/edit-user/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="username" class="form-label">Korisničko ime</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Ime</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="{{$user->firstName}}">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Prezime</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="{{$user->lastName}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="admin" name="admin" value="1" {{$user->admin == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="admin">Admin</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="productBlock" name="productBlock" value="1" {{$user->productBlock ? 'checked' : ''}}>
                        <label class="form-check-label" for="productBlock">Blokiraj proizvode</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="orderBlock" name="orderBlock" value="1" {{$user->orderBlock ? 'checked' : ''}}>
                        <label class="form-check-label" for="orderBlock">Blokiraj porudžbine</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
