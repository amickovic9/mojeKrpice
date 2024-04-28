<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('home.navbar')
    <div class="container">
        <h1 class="my-4">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="available">Available:</label>
                <select id="available" name="available" class="form-control">
                    <option value="1" {{ $product->available == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $product->available == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Current Image:</label>
                <br>
                    <img src="{{ asset('uploads/' . $product->image) }}" alt="Current Image" style="max-width: 200px;">
                    <br><br>
               
                <label for="new_image">Choose New Image:</label>
                <input type="file" id="new_image" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>

        </form>
        <a href="/my-products" class="btn btn-danger">Cancel</a>
    </div>
</body>
</html>
