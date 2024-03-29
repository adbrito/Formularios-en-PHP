<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
      .container{
         padding: 20px;
      }
   </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">

                    <div>
                        <h1 class="text-center">Mascotas registradas
                            <i style='font-size:24px' class='fas'>&#xf1b0;</i>
                        </h1>


                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dueño</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Nombre de la mascota</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Tipo de mascota</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once 'dbconexion.php';
                            $query = "SELECT * from Adopcion";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $fila = $stmt->fetchAll(PDO::FETCH_OBJ);
                            foreach ($fila as $registro) {

                                echo "<tr>";
                                echo "<th scope='row'>" . $registro->id . "</th>";
                                echo "<td>" . $registro->dueno . "</td>";
                                echo "<td>" . $registro->telefono . "</td>";
                                echo "<td>" . $registro->direccion . "</td>";
                                echo "<td>" . $registro->nombre_mascota . "</td>";
                                echo "<td>" . $registro->edad . "</td>";
                                echo "<td>" . $registro->tipo_mascota . "</td>";
                                echo "</tr>";
                            }
                            // foreach ($conn->query('SELECT * from Mascota') as $fila) {
                            //     print_r($fila);
                            // }


                            exit();

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>