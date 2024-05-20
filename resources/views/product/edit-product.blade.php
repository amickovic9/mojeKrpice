<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni proizvod</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <h1 class="my-4">Izmeni proizvod</h1>
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

            <button type="submit" class="btn btn-primary">Ažuriraj proizvod</button>

        </form>
        <a href="/moji-proizvodi" class="btn btn-danger">Otkaži</a>
    </div>
</body>
</html>
