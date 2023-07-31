<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        h2 {
            color: blue;
        }

        hr {
            color: rgb(36, 128, 182);
        }

        form {
            margin: auto;
            background: #d7e3ee;
            padding: 30px;
            border-radius: 10px;
        }

        .navbar {
            background-color: rgb(105, 105, 201);
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <form class="row g-3" action="{{ route('post_register') }}" method="post">
            <img src="{{ asset('images/taskmanager2.png') }}"  style="width: 150px" alt="">
            <h2>Création de compte</h2>
            <hr><br>
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" placeholder="Entrez votre nom" value="{{ old('name') }}">
                @error('name')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="firstName" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstName" placeholder="Entrez votre prénom" value="{{ old('firstName') }}">
                @error('firstName')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email </label>
                <input type="text" class="form-control" name="email" placeholder="john@example.com" value="{{ old('email') }}">
                @error('email')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="contact" class="form-label">Contact</label>
                <input type="tel" class="form-control" name="contact" placeholder="Numéro de téléphone" value="{{ old('contact') }}">
                @error('contact')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Entrez un mot de passe" value="{{ old('password') }}">
                @error('password')
                    <i class="text-danger">{{ $message }}</i>
                @enderror

            </div>
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirmer Mot de passe </label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <i class="text-danger">{{ $message }}</i>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
</body>

</html>
