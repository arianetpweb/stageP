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

        }

        .container,
            {

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

        <br>
        <form action="{{ route('post_login') }}" method="post">
            @csrf
            <div class="content">
                <center>
                    <div class="title">
                        <img src="{{ asset('images/taskmanager2.png') }}" style="width: 180px;" class="image"
                            alt="">
                        <h2>Connexion</h2>
                    </div>
                </center>
                <hr>
                <br>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}">
                    @error('email')
                        <i class="text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe </label>
                    <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" value="{{ old('password') }}">
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
