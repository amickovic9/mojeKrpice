<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .product-image {
            width: 50px;
            height: auto;
        }
        .action-icons {
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <h1 class="my-4">My Products</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Available</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ asset('uploads/' . $product->image) }}" class="product-image" alt="{{ $product->name }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->available ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="/edit-product/{{$product->id}}"class="fas fa-pencil-alt text-primary mr-2 action-icons"></a>
                            <a href ="/delete-product/{{$product->id}}" class="fas fa-times text-danger action-icons"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
