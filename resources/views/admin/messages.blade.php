<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4">Admin Messages</h1>
                <!-- Forma za pretragu -->
                <form action="" method="GET">
                    <div class="form-row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="title" placeholder="Search by Title" value="{{ isset($_GET['title']) ? $_GET['title'] : '' }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="username" placeholder="Search by Username" value="{{ isset($_GET['username']) ? $_GET['username'] : '' }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="email" placeholder="Search by Email" value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <ul class="list-group">
                    @foreach ($messages as $message)
                        <li class="list-group-item">
                            <a href="/admin/message/{{ $message->id }}">{{ $message->title }}</a>
                            @if (!$message->read)
                                <span class="badge badge-danger">Unread</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
