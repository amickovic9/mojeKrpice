<!DOCTYPE html>
<html lang="sr">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forma</title>
    <style>
         .submit {
            border: none;
            outline: none;
            padding: 8px 30px;
            border-radius: 5px;
            color: #fff !important;
            font-size: 16px;
            transform: .8s ease;
            background-color: #b22d64 !important;
        }
        .submit:hover {
            background-color: #512940 !important;
            transition: .8s ease;
            transform: scale(1.05);
        }
        </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color:#b22d64; text-align: center;">
                        <h4>Dodaj stavku</h4>
                    </div>
                    <div class="card-body">
                        <form action="/add-product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Ime proizvoda</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Opis</label>
                                <textarea id="description" name="description" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Veličina</label>
                                <input type="text" id="size" name="size" class="form-control" required>
                            </div>
                           
                            <div class="mb-3">
                                <label for="contact" class="form-label">Cena u RSD</label>
                                <input type="text" id="contact" name="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Slika</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                            <button type="submit" class="btn submit" style="margin-left:40%">Potvrdi</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer')
</html>
