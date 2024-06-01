<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma za porudžbinu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        .form-container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background-color: #f2eef2;
           
           
        }

        .form-container:hover {
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }

        .form-title {
            margin-bottom: 20px;
            font-weight: 500;
            color:#512940;
        }

        .btn-custom {
            background-color: #fff;
            color: #b22d64;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e0e0e0;
            color: #b22d64;
        }

        .label {
            color: #512940;
            font-weight:500;
        }

        .submit {
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 10px;
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
    </style>
</head>
<body>
    @include('home.navbar')
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container text-white" style="border: 1px solid #000;">
                    <h1 class="text-center form-title">Forma za porudžbinu</h1>
                    <h2 class="text-center form-title mb-4">Ukupno: {{$total}} rsd</h2>
                    <form action="/submit-order" method="post">
                        @csrf

                        <div class="form-group label mb-3">
                            <label for="address">Adresa:</label>
                            <div class="input-group">
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group label mb-3">
                            <label for="phone_number">Broj telefona:</label>
                            <div class="input-group">
                                <input type="text" id="phone" name="phone_number" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group label mb-4">
                            <label for="note">Napomena:</label>
                            <textarea id="note" name="note" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="submit"><i class="fas fa-paper-plane"></i> Predaj narudžbinu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
