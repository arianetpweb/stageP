<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            border: 2px solid #CCC;
            border-radius: 30px;
            dth: 500px;


        }

        .navbar {
            background-color: rgb(105, 105, 201);
        }

        .navbar-brand {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .sign {
            padding: 10;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Lorem</a>
        </div>
    </nav>
    <div class="container">

        <form action="{{ route('post_login') }}" method="post">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-9">
                    <h2>Connexion</h2>
                    <hr>
                    <br>
                </div>
            </div>
            @csrf
            <div class="content">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                    @error('email')
                        <i class="text-danger">{{ $message }}</i>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe </label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <i class="text-danger">{{ $message }}</i>
                    @enderror
                </div><br>
                <div class="form-group">
                    <div div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" required />
                        <label class="custom-control-label mt-4 fw-bold" for="remember-me">Se rappeler de
                            moi</label>
                    </div>
                </div>

                <center><button type="submit" class="btn btn-primary">Se connecter</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </center>
                <p>Avez-vous déjà un compte?</p>
                <center><a href="{{ route('get_register') }}" type="button" class="btn btn-primary sign">S'inscrire</a>
                </center>
            </div>
        </form>
    </div>
</body>

</html>
