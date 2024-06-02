<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni proizvod</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .card-header {
            background-color: #b22d64 !important;
            color: white !important;
            text-align: center;
        }
        .card-body {
            background-color: #f2eef2 !important;
        }
        .button-container {
            text-align: center;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <h1>Izmeni proizvod</h1>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Naziv:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Opis:</label>
                        <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Cena:</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}">
                    </div>

                    <div class="form-group">
                        <label for="available">Dostupno:</label>
                        <select id="available" name="available" class="form-control">
                            <option value="1" {{ $product->available == 1 ? 'selected' : '' }}>Da</option>
                            <option value="0" {{ $product->available == 0 ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Trenutna slika:</label>
                        <br>
                        <img src="{{ asset('uploads/' . $product->image) }}" alt="Trenutna slika" style="max-width: 200px;">
                        <br><br>
                   
                        <label for="new_image">Izaberi novu sliku:</label>
                        <input type="file" id="new_image" name="image" class="form-control-file">
                    </div>

                    <div class="button-container">
                        <button type="submit" class="submit">Ažuriraj proizvod</button>
                        <a href="/moji-proizvodi" class="btn btn-danger">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
</body>
</html>
