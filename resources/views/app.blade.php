<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            justify-content: center;
        }

        form {

            max-width: 600px;
            margin: auto;
            background: #d7e3ee;
            padding: 30px;
            width: 500px;
            border: 2px solid #CCC;
            border-radius: 30px;
        }

        .navbar {
            background-color: rgb(105, 105, 201);
        }
        .navbar-brand{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .sign{
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
    <form action="{{ route('post_traitement') }}" method="post">
@csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mot de passe </label>
            <input type="password" name="password" class="form-control">
        </div><br>
        <div class="col-12">
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Log in</button> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{ route('inscriptions') }}" type="button" class="btn btn-primary sign">Sign in</a>
        </div>
    </form>
</body>

</html>
