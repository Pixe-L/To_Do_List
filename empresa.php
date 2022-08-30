<?php

require_once ("./php/conect.php");
$conex=conexion();

$sql = "SELECT * FROM empresa"; 
$query = $conex -> prepare($sql);
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 


?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
   rel="stylesheet"
   integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
   crossorigin="anonymous"
  />
  <link rel="stylesheet" href="./css/main.min.css" />
  <title>Formulario Empresa</title>
 </head>
 <body>
  <main>
   <header>
    <h1 style="text-align: center">Registrar Empresa</h1>
   </header>
   <div
    class="container"
    style="width: 500px; height: 300px; display: flex; justify-content: center; flex-direction: column"
   >
    <form action="./php/addempresa.php" method="post" class="form-empre" id="form_empre" name="form_empre">
     <div class="mb-3">
      <label for="empresa" class="form-label">Nombre de la empresa</label>
      <input type="name" class="form-control" id="empresa" name="empresa" placeholder="Empresa" />
     </div>
     <button type="submit" name="addempresa" class="btn btn-dark">Enviar</button>
    </form>
   </div>
   <div class="registrar mb-3" style="text-align: center">
    <a href="./usuario.php" class="regist-link">
     <button type="button" class="btn btn-primary btn-lg" style="background-color: #292929">
      Registrar Usuario
     </button>
    </a>
    <a href="./tareas.php" class="regist-link">
     <button type="button" class="btn btn-secondary btn-lg">Registrar Tarea</button>
    </a>
   </div>
   <table class="table table-dark table-striped" style="width: 600px; margin: 0 auto;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
    </tr> 
  </thead>
  <tbody>
    <?php

    foreach($results as $item) {
     echo "<tr>
      <th scope=\"row\">".$item->id."</th>
      <td>".$item->nombre."</td>
    </tr> ";
    }
 
    ?>
  </tbody>
</table>
  </main>
  <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
   crossorigin="anonymous"
  ></script>
 </body>
</html>
