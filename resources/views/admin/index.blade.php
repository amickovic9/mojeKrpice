<!DOCTYPE html>
<html lang="sr">
<head>
    @include('home.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        h2 {
            color: #b22d64;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: #b22d64;
            border-color: #b22d64;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #512940;
            border-color: #512940;
            transform: scale(1.05);
            transition: 0.4s all ease-in-out;
        }

        .btn-lg {
            padding: 15px 40px;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .slide-top {
	-webkit-animation: slide-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: slide-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}
        @-webkit-keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        100% {
            -webkit-transform: translateY(50px);
                    transform: translateY(50px);
        }
        }
        @keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        100% {
            -webkit-transform: translateY(50px);
                    transform: translateY(50px);
        }
        }

    </style>
</head>
<body>
    <div class="container kontejner slide-top mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>KONTROLNA TABLA</h2>
                <div class="d-grid gap-2">
                    <a href="/admin/users" class="btn btn-primary btn-lg">Upravljaj korisnicima</a>
                    <a href="/admin/orders" class="btn btn-primary btn-lg">Upravljaj porudžbinama</a>
                    <a href="/admin/products" class="btn btn-primary btn-lg">Upravljaj proizvodima</a>
                    <a href="/admin/messages" class="btn btn-primary btn-lg">Upravljaj porukama</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
