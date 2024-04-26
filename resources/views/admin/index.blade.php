<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users and Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Users</h2>
                @foreach ($users as $user)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Username: {{ $user->username }}</h5>
                        <p class="card-text">Name: {{ $user->firstName }} {{ $user->lastName }}</p>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">Date of registration: {{ $user->created_at }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2>Products</h2>
                @foreach ($products as $product)
                <div class="card mb-3">
                    <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Description: {{ $product->description }}</p>
                        <p class="card-text">Size: {{ $product->size }}</p>
                        <p class="card-text">Contact: {{ $product->contact }}</p>
                        <p class="card-text">Price: {{ $product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
