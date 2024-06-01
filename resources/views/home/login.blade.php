<!DOCTYPE html>
<html lang="sr">
<head>
    @include('home.navbar')
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
        color: #512940;
        border: 0.5px solid #b22d64;;
    }

    .title {
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        display: flex;
        align-items: center;
        color: #b22d64;
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
    <title>Prijava</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <form class="form slide-top" action="/login" method="post">
                    @csrf
                    <p class="title">Prijava</p>
                    <p class="message">Prijavi se i počni da kupuješ.</p>
                    <div class="mb-1">
                        <label for="username2" class="form-label">Korisničko ime</label>
                        <input type="text" id="username2" name="username" class="form-control" required>
                    </div>
                    <div class="mb-1">
                        <label for="password2" class="form-label">Lozinka</label>
                        <input type="password" id="password2" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="submit">Prijavi se</button>
                    <p class="signin">Nemaš nalog? <a href="/register">Registracija</a></p>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
