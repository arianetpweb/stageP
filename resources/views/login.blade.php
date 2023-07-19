<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .container {
            justify-content: center;
        }

        h2 {
            color: blue;
        }

        hr {
            color: rgb(36, 128, 182);
            max-width: 600px;

        }

        .container {

            margin: auto;
        }

        .container .content {
            margin: auto;
            max-width: 600px;
            background: #d7e3ee;
            padding: 30px;
            border-radius: 10px;

        }

        .navbar-brand {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 style="text-align: center">Bienvenue sur TaskManager !</h2>
        <br>
        <form action="{{ route('post_login') }}" method="post">

            @csrf
            <div class="content">
                <div class="">
                    <h2>Connexion</h2>
                    <hr>
                    <br>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <i class="text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe </label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                        <i class="text-danger">{{ $message }}</i>
                    @enderror
                </div><br>
                <center><button type="submit" class="btn btn-primary">Se connecter</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </center>
                <p>Avez-vous déjà un compte?
                    <a href="{{ route('get_register') }}">S'inscrire</a>
                </p>

            </div>
        </form>
    </div>
</body>

</html>
