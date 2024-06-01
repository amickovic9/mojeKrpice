<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmena korisnika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
 
        .card {
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header1 {
            background-color: #b22d64;
            color: white;
            font-weight: bold;
            padding:10px 20px;
            border-radius:5px;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-check-label {
            font-weight: normal;
        }


        .action-icons {
            font-size: 1.5rem;
            margin-right: 10px;
            color: #b22d64;
        }

        .action-icons:hover {
            color: #512940;
        }
        .submit {
        border: none;
        outline: none;
        padding: 8px 30px;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        transform: .8s ease;
        background-color: #b22d64;
    }

    .submit:hover {
        background-color: #512940;
        transition: .8s ease;
        transform: scale(1.05);
    }
   
    .form-check-input:checked {
        background-color: #b22d64 !important;
        border-color: #b22d64 !important;
    }


    .form-check-input:checked + .form-check-label::before {
        border-color: #b22d64 !important; 
        background-color: #b22d64 !important; 
    }

  
    .form-check-label {
        color: #b22d64;
    }

    .form-check-input:checked + .form-check-label {
        color: #512940;
    }

  
    .form-check-input:not(:checked) + .form-check-label {
        color: #b22d64;
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
    @include('home.navbar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card slide-top">
                    <div class="card-header1">
                        Izmena korisnika
                    </div>
                    <div class="card-body">
                        <form action="/admin/edit-user/{{$user->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="username" class="form-label">Korisničko ime</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Ime</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{$user->firstName}}">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Prezime</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{$user->lastName}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="admin" name="admin" value="1" {{$user->admin == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="admin">Admin</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="productBlock" name="productBlock" value="1" {{$user->productBlock ? 'checked' : ''}}>
                                <label class="form-check-label" for="productBlock">Blokiraj proizvode</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="orderBlock" name="orderBlock" value="1" {{$user->orderBlock ? 'checked' : ''}}>
                                <label class="form-check-label" for="orderBlock">Blokiraj porudžbine</label>
                            </div>
                            <button type="submit" class="submit">Sačuvaj izmene</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
