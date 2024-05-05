<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message with Replies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Message
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $message->message }}</p>
                        <p class="card-text">Posted by: {{ $message->user->firstName }} {{ $message->user->lastName }}</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <form action="/reply" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" value="{{ $message->id }}" name="contactMessage_id">
                            <div class="form-group">
                                <label for="reply">Your Reply:</label>
                                <textarea class="form-control" id="reply" name="reply" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Reply</button>
                        </form>
                    <div class="card-header">
                        Replies
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
</html>
