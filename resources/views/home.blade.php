<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tâches</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .content {
            max-width: 700px;
            margin: auto;
        }

        .task {
            margin: auto;
            padding: 30px;
            border: 1px solid #CCC;
            border-radius: 13px;
        }

        .list {
            padding: 20px;
            margin: 20px;
        }

        #logoutbtn{
transition: all .3s ease;
        }
       #logoutbtn:hover::after {
            content: "Déconnecter";
        }

        .cabedge {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-dark px-5">
        <a class="navbar-brand text-light" href="#" >Bonjour {{ Auth::user()->firstName }}</a>
        <div class="d-flex justify-content-end">
            <form action="{{ route('post_logout') }}" id="logoutform" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" id="logoutbtn"><i class="fa fa-sign-out"
                        aria-hidden="true"></i></button>
            </form>
        </div>
    </nav>

    <div class="content">
        <div class="container m-4">
            <form action="{{ route('add_task') }}" class="row-g3 task" method="post" id="task-form">
                @csrf
                <div class="-row d-flex justify-content-between">
                    <div class="-col-md-9 flex-fill me-3">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Entrez votre tâche"
                                id="task-input">
                            @error('nom')
                                <i class="text-danger">{{ $message }}</i>
                            @enderror
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
                <table>
                    <td>
                        <form action="{{ route('delete_task', ['id' => $tache->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="border-0" type="submit" style="background-color: white"><i
                                    class="fa fa-trash cabedge" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    <td>
                        <form id="myForm{{ $tache->id }}" action="{{ route('update_task', ['id' => $tache->id]) }}"
                            class="d-flex" method="post">
                            @csrf
                            @method('put')
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="id"
                                    {{ $tache->terminee == true ? 'checked' : '' }}
                                    onclick="submitForm({{ $tache->id }})">
                                <label class="form-check-label" for="gridCheck">{{ $tache->nom }}</label>
                            </div>
                        </form>
                    </td>
                </table>
            @endforeach

            <h3>Tâches terminées</h3>
            @if ($taches_terminées->count() == 0)
                Aucune tâche terminée
            @endif
            @foreach ($taches_terminées as $tache)
                <table>
                    <tr>
                        <td>
                            <form action="{{ route('delete_task', ['id' => $tache->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="border-0" type="submit" style="background-color: white"><i
                                        class="fa fa-trash cabedge" aria-hidden="true"></i></button>
                            </form>
                        </td>
                        <td>
                            <form id="myForm{{ $tache->id }}"
                                action="{{ route('update_task', ['id' => $tache->id]) }}" class="p-1 ms-2 "
                                method="post">
                                @csrf
                                @method('put')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id"
                                        {{ $tache->terminee == true ? 'checked' : '' }}
                                        onclick="submitForm({{ $tache->id }})">
                                    <label class="form-check-label" for="gridCheck">{{ $tache->nom }}</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
    </div>

    <script>
        function logout(e) {
            const form = document.getElementById(`logoutform`);

            const shouldlogout = confirm('Voulez-vous vraiment vous déconnecter?');

            if (shouldlogout === true) {
                form.submit();
            } else {
                alert('Déconnexion annulée');
            }

        }

        function submitForm(id) {
            const form = document.getElementById(`myForm${id}`); // 'myForm'+ ..

            if (form) {
                form.submit();
            }
        }

        (function() {
            const logoutbtn = document.getElementById(`logoutbtn`);

            logoutbtn.addEventListener('click', function(e) {
                e.preventDefault();

                logout(e);
            });

        })();
    </script>
</body>

</html>
