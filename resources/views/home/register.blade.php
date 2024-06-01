<!DOCTYPE html>
<html lang="sr">
<head>
    @include("home.navbar")
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 100%;
        padding: 20px;
        border-radius: 20px;
        background-color: #f2eef2;
        border: 1px solid #b22d64;
        color: #512940;
    }

    .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        display: flex;
        align-items: center;
        color: #b22d64;
    }


    .title::after {
        animation: pulse 1s linear infinite;
    }

    .message,
    .signin {
        font-size: 14.5px;
        color: #512940;
    }

    .signin {
        text-align: center;
    }

    .signin a:hover {
        text-decoration: underline royalblue;
    }

    .signin a {
        color: #b22d64;
    }

    .form label .input {
        background-color: #333;
        color: #fff;
        width: 100%;
        padding: 20px 5px 5px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
    }

    .form label .input + span {
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 10px;
        top: 0px;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label .input:placeholder-shown + span {
        top: 12.5px;
        font-size: 0.9em;
    }

    .form label .input:focus + span,
    .form label .input:valid + span {
        color: #b22d64;
        top: 0px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .input {
        font-size: medium;
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
    <title>Registracija</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form class="form slide-top " action="/register" method="post">
                    @csrf
                    <p class="title">Registracija</p>
                    <p class="message">Prijavi se i počni da kupuješ.</p>
                    <div class="mb-1">
                        <label for="username" class="form-label">Korisničko ime</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Ime</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Prezime</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Lozinka</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="submit">Registruj se</button>
                    <p class="signin">Već imate nalog? <a href="/login">Prijavite se</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
