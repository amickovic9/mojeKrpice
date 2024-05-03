<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Admin Panel</h2>
                <div class="d-grid gap-2">
                    <a href="/admin/users" class="btn btn-primary btn-lg mb-3">Manage Users</a>
                    <a href="/admin/orders" class="btn btn-primary btn-lg mb-3">Manage Orders</a>
                    <a href="/admin/products" class="btn btn-primary btn-lg mb-3">Manage Products</a>
                    <a href="/admin/messages" class="btn btn-primary btn-lg mb-3">Manage messages</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
