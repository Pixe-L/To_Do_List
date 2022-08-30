<?php

require_once ("./php/conect.php");
$conex=conexion();

$sql = "SELECT * FROM tareas"; 
$query = $conex -> prepare($sql);
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

$sql = "SELECT * FROM usuario"; 
$query = $conex -> prepare($sql);
$query -> execute(); 
$resultsUsers = $query -> fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT * FROM empresa"; 
$query = $conex -> prepare($sql);
$query -> execute(); 
$resultsEmpre = $query -> fetchAll(PDO::FETCH_OBJ); 

foreach($results as $tempresa) { 
  foreach($resultsEmpre as $empresa) {
  if($tempresa->empresa == $empresa->id) {
    $tempresa->empresa = $empresa->nombre;
  }
}
}
foreach($results as $tusuario) { 
  foreach($resultsUsers as $usuario) {
  if($tusuario->usuario == $usuario->id) {
    $tusuario->usuario = $usuario->nombre;
  }
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/main.min.css" />
    <title>Formulario Empresa</title>
</head>

<body>
    <main>
        <header>
            <h1 style="text-align: center">Registrar Tarea</h1>
        </header>
        <div class="container" style="width: 500px;  display: flex; justify-content: center; flex-direction: column">
            <form action="./php/addtarea.php" method="post" class="form-tarea" id="form_tarea" name="form_tarea">
                <div class="mb-3">
                    <label for="tarea" class="form-label">Nombre de la Tarea</label>
                    <input type="name" class="form-control" id="tarea" name="tarea" placeholder="Tarea" require />
                </div>
                <div class="input-group">
                    <span class="input-group-text">Descripción</span>
                    <textarea class="form-control" aria-label="With textarea" id="descrip" name="descrip"></textarea>
                </div>
                <div class="mb-3">
                    <label for="f-i" class="form-label">Fecha de inicio</label>
                    <input type="date" class="form-control" id="f-i" name="f-i" />
                    <label for="f-v" class="form-label">Fecha de vencimiento</label>
                    <input type="date" class="form-control" id="f-v" name="f-v" />
                </div>
                <div class="empres-users mb-3" style="display: flex; justify-content: space-around">
                    <div class="empres">
                        <select class="form-select" aria-label="Default select example" name="empres" require>
                            <option selected value="0">Asignar Empresa</option>
                            <?php
          foreach($resultsEmpre as $item) { 
            echo "<option value=$item->id>".$item->nombre."</option>";
          }
         ?>
                        </select>
                    </div>
                    <div class="users">
                        <select class="form-select" aria-label="Default select example" name="user" require>
                            <option selected>Asignar Usuario</option>
                            <?php
          foreach($resultsUsers as $item){
            echo "<option value=$item->id>".$item->nombre."</option>";
          }
         ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark" name="addtarea">Enviar</button>
            </form>
        </div>
        <div class="registrar mt-2 mb-2" style="text-align: center">
            <a href="./usuario.php" class="regist-link">
                <button type="button" class="btn btn-primary btn-lg" style="background-color: #292929">
                    Registrar Usuario
                </button>
            </a>
            <a href="./empresa.php" class="regist-link">
                <button type="button" class="btn btn-secondary btn-lg">Registrar Empresa</button>
            </a>
        </div>
        <table class="table table-dark table-striped" style="width: 1200px; margin: 0 auto;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Vencimiento</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
  foreach ($results as $tarea) {
    echo 
    "<tr>
      <th scope=\"row\">".$tarea->id."</th> 
      <td>".$tarea->nombre."</td> 
      <td>".$tarea->descripcion."</td> 
      <td>".$tarea->fecha_inicio."</td> 
      <td>".$tarea->fecha_vencimiento."</td> 
      <td>".$tarea->estatus."</td> 
      <td>".$tarea->empresa."</td> 
      <td>".$tarea->usuario."</td> 
      </tr>";
    } 
      ?>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>