<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmena porudžbine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
       
        .card {
            margin-top: 0px;
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

        .form-select {
            color: #6c757d; 
        }

        .form-control:focus {
            border-color: #b22d64; 
            box-shadow: 0 0 0 0.25rem rgba(178, 45, 100, 0.25); 
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
            -webkit-transform: translateY(30px);
                    transform: translateY(30px);
        }
        }
        @keyframes slide-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
        }
        100% {
            -webkit-transform: translateY(30px);
                    transform: translateY(30px);
        }
        } 
    </style>
</head>
<body>
    @include('home.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card slide-top">
                    <div class="card-header1">
                        Izmena porudžbine
                    </div>
                    <div class="card-body">
                        <form action="/admin/edit-order/{{$order->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-1">
                                <label for="address" class="form-label">Adresa</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$order->address}}">
                            </div>
                            <div class="mb-1">
                                <label for="phone" class="form-label">Telefon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$order->phone_number}}">
                            </div>
                            <div class="mb-1">
                                <label for="note" class="form-label">Napomena</label>
                                <textarea class="form-control" id="note" name="note" rows="3">{{$order->note}}</textarea>
                            </div>
                            <div class="mb-1">
                                <label for="firstName" class="form-label">Ime</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{$order->customer->firstName}}">
                            </div>
                            <div class="mb-1">
                                <label for="lastName" class="form-label">Prezime</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{$order->customer->lastName}}">
                            </div>
                            <div class="mb-1">
                                <label for="accepted" class="form-label">Prihvaćeno</label>
                                <select class="form-select" id="accepted" name="accepted">
                                    <option value="1" {{$order->accepted ? 'selected' : ''}}>Da</option>
                                    <option value="0" {{$order->accepted ? '' : 'selected'}}>Ne</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="delivered" class="form-label">Isporučeno</label>
                                <select class="form-select" id="delivered" name="delivered">
                                    <option value="1" {{$order->delivered ? 'selected' : ''}}>Da</option>
                                    <option value="0" {{$order->delivered ? '' : 'selected'}}>Ne</option>
                                </select>
                            </div>
                            <button type="submit" class="submit">Sačuvaj izmene</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
