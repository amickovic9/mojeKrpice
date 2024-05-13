<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktirajte nas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4">Kontaktirajte nas</h2>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Naslov:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Poruka:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Posalji</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4">Pretrazi poruke</h2>
                <form action="" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Search by title">
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Pretrazi</button>
                </form>
                <h2 class="mt-5 mb-4">Moje poruke</h2>
                <ul class="list-group">
                    @foreach($myMessages as $message)
                        <li class="list-group-item">
                            <a href="/contact-us/{{ $message->id }}">{{ $message->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@include('footer')
</html>
