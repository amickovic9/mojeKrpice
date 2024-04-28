<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('home.navbar')
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-dark text-white p-4 rounded-lg shadow">
                    <h1 class="text-center mb-4">Order Form</h1>
                    <h2 class="text-center mb-4">Total: {{$total}} rsd</h2>
                    <form action="/submit-order" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" id="phone" name="phone_number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
