<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poruka sa odgovorima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            background-color: #f2eef2 !important;
            color: #000 !important;
        }
        .card-header {
            background-color: #b22d64 !important;
            color: #fff !important;
            text-align: center;
        }
        .submit {
            border: none;
            outline: none;
            padding: 8px 30px;
            border-radius: 5px;
            color: #fff !important;
            font-size: 16px;
            transform: .8s ease;
            background-color: #b22d64 !important;
            margin-bottom: 5px;
            display: block;
            margin-left: 41%;
            margin-right: auto;
        }
        .submit:hover {
            background-color: #512940 !important;
            transition: .8s ease;
            transform: scale(1.05);
        }
        .form-group {
            text-align: center;
            background-color: #f2eef2 !important;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Poruka
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $message->message }}</p>
                        <p class="card-text">Objavio: {{ $message->user->firstName }} {{ $message->user->lastName }}</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <form action="/reply" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" value="{{ $message->id }}" name="contactMessage_id">
                        <div class="form-group">
                            <label for="reply">Vaš odgovor:</label>
                            <textarea class="form-control" id="reply" name="reply" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn submit">Pošalji odgovor</button>
                    </form>
                    <div class="card-header">
                        Odgovori
                    </div>
                    <div class="card-body">
                        @foreach ($replies as $reply)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $reply->user->firstName }} {{ $reply->user->lastName }}</strong>
                                        </div>
                                        <div>
                                            <small>{{ $reply->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $reply->reply }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@include('footer')
</html>