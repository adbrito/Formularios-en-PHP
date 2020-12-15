<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Adopciones</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   <style>
      .container {
         padding: 20px;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="center container h-100">
         <div class="row justify-content-center h-100">
            <div class="col-sm-8 align-self-center">

               <div>
                  <h1 class="text-center">Registro de mascotas<i style='font-size:24px' class='fas'>&#xf1b0;</i></h1>
               </div>
               <form action="<?php $_PHP_SELF ?>" method="POST">
                  <div class="row">
                     <div class="form-group col-md-5 col-xl-6">


                        <label class="col-sm-2 col-form-label">Dueño</label>
                        <div class="col">
                           <input type="text" name="dueno" id="formGroupExampleInput" class="form-control" placeholder="Ingrese el nombre del dueño" />
                        </div>
                     </div>
                     <div class="form-group col-md-5 col-xl-6">
                        <label class="col-sm-2 col-form-label">Teléfono </label>
                        <div class="col">

                           <input type="text" name="telefono" placeholder="Ingrese su número de teléfono o convencional" class="form-control" />
                        </div>
                     </div>
                  </div>
                  <div class="form-group col">
                     <div class="form-group col-md-10 col-xl-12">

                        <label class="col-sm-2 col-form-label">Dirección </label>
                        <div class="col">
                           <input type="text" name="direccion" class="form-control" placeholder="Ingrese su dirección domiciliaria" />
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-5 col-xl-6">
                        <label class="col-sm-2 col-form-label">Edad </label>
                        <div class="col">

                           <input type="text" name="edad" class="form-control" placeholder="Ingrese la edad" />
                        </div>
                     </div>
                     <div class="form-group col-md-5 col-xl-6">
                        <label class="col-sm-2 col-form-label">Mascota </label>
                        <div class="col">
                           <input type="text" name="mascota" class="form-control" placeholder="Ingrese el nombre de su mascota" />
                        </div>
                     </div>
                  </div>

                  <div class="form-group col-md-5 col-xl-5">
                     <label class="col-sm col-form-label"> Seleccione el tipo de su mascota:</label>
                     <div class="col">
                        <div class="custom-control custom-radio">

                           <input type="radio" id="perro" name="tipoMascota" value="perro" class="custom-control-input">
                           <label for="perro">Perro</label>
                        </div>
                        <div class="custom-control custom-radio">

                           <input type="radio" id="gato" name="tipoMascota" value="gato" class="custom-control-input">
                           <label for="gato">Gato</label>
                        </div>
                        <div class="custom-control custom-radio">

                           <input type="radio" id="loro" name="tipoMascota" value="loro">
                           <label for="loro">Loro</label>
                        </div>
                        <div class="custom-control custom-radio">

                           <input type="radio" id="hamster" name="tipoMascota" value="hamster">
                           <label for="hamster">Hamster</label>
                        </div>
                     </div>
                  </div>

                  <div class="col text-center">
                     <input type="submit" value="Registrar Mascota" class="btn btn-success" />
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>

</html>



<?php
require_once 'dbconexion.php';

if (!empty($_POST["dueno"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["mascota"]) && !empty($_POST["tipoMascota"]) && !empty($_POST["edad"])) {
   if (!preg_match("/[^\w+$]/", $_POST["dueno"])) {
      echo $_POST["dueno"];
      die("Nombre invalido, debe contener nombre y apellido");
   }
   $nombre = $_POST["dueno"];
   $tel = $_POST["telefono"];
   $dir = $_POST["direccion"];
   $mascota = $_POST["mascota"];
   $edad = $_POST["edad"];
   $tipo = $_POST["tipoMascota"];
   $id_count = "SELECT COUNT(id) from Adopcion";
   $stmt = $conn->prepare($id_count);
   $stmt->execute();
   $id = $stmt->fetchColumn();
   $id += 1;
   $query = "INSERT INTO Adopcion (id, dueno, telefono, direccion, nombre_mascota,edad,tipo_mascota) VALUES (?,?,?,?,?,?,?)";

   $stmt = $conn->prepare($query);

   $stmt->bindParam(1, $id);
   $stmt->bindParam(2, $nombre);
   $stmt->bindParam(3, $tel);
   $stmt->bindParam(4, $dir);
   $stmt->bindParam(5, $mascota);
   $stmt->bindParam(6, $edad);
   $stmt->bindParam(7, $tipo);
   echo $stmt->execute();
   $confirmacion = "<div class='container'>
   <div class='center container h-100'>
         <div class='row justify-content-center h-100'>
            <div class='col-sm-8 align-self-center'>
      <h1>Registro exitoso!</h1>
   </div></div></div></div>";
   echo $confirmacion;

   exit();
}


?>