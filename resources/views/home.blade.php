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
            <form action="" class="row-g3" method="" id="task-form">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="task" class="form-control" placeholder="Entrez votre tâche" id="task-input">
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
           <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Exemple de tâche
                </label>
            </div><br><br>-->
            <div id="task-list">
                <!-- Liste des tâches -->
            </div>

            <h3>Tâches terminées</h3>
            <div class="form-check" id="list">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Exemple de tâche
                </label>
            </div>
        </div>
    </div>

	<script>
		// Récupérer le formulaire et la liste
		const taskForm = document.querySelector('#task-form');
		const taskList = document.querySelector('#task-list');

		// Créer une fonction pour ajouter une tâche
		function addTask(event) {
			// Empêcher le formulaire de se soumettre
			event.preventDefault();

			// Récupérer la valeur de l'input
			const taskInput = document.querySelector('#task-input');
			const taskText = taskInput.value.trim();

			// S'assurer que la valeur n'est pas vide
			if (taskText !== '') {
				// Créer un nouvel élément li avec une case à cocher et un label
				const newTask = document.createElement('p');
				const newTaskCheckbox = document.createElement('input');
				newTaskCheckbox.type = 'checkbox';
				const newTaskLabel = document.createElement('label');
				newTaskLabel.textContent = taskText;

				// Ajouter la case à cocher et le label à l'élément li
				newTask.appendChild(newTaskCheckbox);
				newTask.appendChild(newTaskLabel);

				// Ajouter l'élément li à la liste
				taskList.appendChild(newTask);

				// Réinitialiser l'input
				taskInput.value = '';
			}
		}

		// Ajouter un écouteur d'événement pour le formulaire
		taskForm.addEventListener('submit', addTask);
	</script>

</body>
</html>
