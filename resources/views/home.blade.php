<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .navbar {
            background-color: rgb(105, 105, 201);
        }

        .content {
            max-width: 700px;
            margin: auto;
        }

        form {
            margin: auto;
            padding: 30px;
            border: 1px solid #CCC;
            border-radius: 13px;

        }

        .container {
            /*
            display: flex;
            align-items: center;
            justify-content: center;*/
            margin: 20px;
        }

        .list {
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Bonjour {{ Auth::user()->name }}</a>
        </div>
    </nav>
    <div class="content">
        <div class="container">
            <form action="" class="row-g3" method="">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="task" class="form-control" placeholder="Entrez votre tâche">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="list">
            <h3>Tâches en cours</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Exemple de tâche
                </label>
            </div><br><br>

            <h3>Tâches terminées</h3>
            <div class="form-check" id="list">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Exemple de tâche
                </label>
            </div>
            <i class="fa fa-trash-o" aria-hidden="true">ibvfhgcd</i>
        </div>
    </div>
</body>

</html>
