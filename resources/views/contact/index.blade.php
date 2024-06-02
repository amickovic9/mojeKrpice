<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktirajte nas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .custom-btn {
            font-family: 'Montserrat', sans-serif;
            background-color: #b22d64 !important;
            color: #fff !important ;
        }
        .custom-btn:hover {
            background-color: #512940 !important;
            transition: .8s ease;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #f2eef2;">
                    <div class="card-body">
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
                            <button type="submit" class="btn custom-btn">Pošalji</button>
                        </form>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h2 class="mb-4">Pretraži poruke</h2>
                                <form action="" method="GET">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Pretraži po naslovu">
                                    </div>
                                    <button type="submit" class="btn custom-btn">Pretraži</button>
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('footer')
</body>
</html>
