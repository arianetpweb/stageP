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
        .col-md-6{
            flex-direction: column;
        }
    </style>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Bonjour {{ Auth::user()->firstName }}</a>
        </div>
    </nav>
    <div class="content">
        <div class="container">
            <form action="{{ route('add_task') }}" class="row-g3" method="post" id="task-form">
                @csrf
                <div class="-row d-flex justify-content-between">
                    <div class="-col-md-9 flex-fill me-3">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Entrez votre tâche"
                                id="task-input">
                        </div>
                    </div>
                    <div class="-col-md-3">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="list">
            <h3>Tâches en cours</h3>
                @if ($taches_en_cours->count() == 0)
                    Aucune tâche en cours
                @endif
                @foreach ($taches_en_cours as $tache)
                    <ul>
                        <form id="myForm{{ $tache->id }}" action="{{ route('update_task', ['id' => $tache->id]) }}"
                            class="border-0 d-flex" method="post">
                            @csrf
                            @method('put')
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="id"
                                    {{ $tache->etat == 'terminée' ? 'checked' : '' }}
                                    onclick="submitForm({{ $tache->id }})">
                                <label class="form-check-label" for="gridCheck">{{ $tache->nom }}</label>
                            </div>
                        </form>
                    </ul>
                @endforeach

            <h3>Tâches terminées</h3>
                @if ($taches_terminées->count() == 0)
                    Aucune tâche terminée
                @endif
                @foreach ($taches_terminées as $tache)
                    <form id="myForm{{ $tache->id }}" action="{{ route('update_task', ['id' => $tache->id]) }}"
                        class="border-0 p-1 ms-2 " method="post">
                        @csrf
                        @method('put')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="id"
                                {{ $tache->etat == 'terminée' ? 'checked' : '' }}
                                onclick="submitForm({{ $tache->id }})">
                            <label class="form-check-label" for="gridCheck">{{ $tache->nom }}</label>
                        </div>
                    </form>
                @endforeach
        </div>
    </div>

    <script>
        function submitForm(id) {
            const form = document.getElementById(`myForm${id}`); // 'myForm'+ ..

            if (form) {
                form.submit();
            }
        }
    </script>
</body>

</html>
