<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Contact Message</h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Title: {{ $message->title }}</h5>
                        <p class="card-text">Message: {{ $message->message }}</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Reply</h5>
                    </div>
                    <div class="card-body">
                        <form action="/reply" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $message->id }}" name="contactMessage_id">
                            <div class="form-group">
                                <label for="reply">Your Reply:</label>
                                <textarea class="form-control" id="reply" name="reply" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Reply</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Replies</h5>
                    </div>
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
