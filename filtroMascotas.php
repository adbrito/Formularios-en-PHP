<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <div>
        <h1 class="text-center">Búsqueda de mascotas por tipo</h1>
    </div>
    <form action="<?php $_PHP_SELF ?>" method="GET">

        <div>
            <label>Seleccione el tipo de mascota</label>
            <select class="custom-select custom-select-lg mb-3" id="tipoMascota" name="tipoMascota" onchange="this.form.submit()">
                <option value=" ">---</option>
                <option value="todos">Todos</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Loro">Loro</option>
                <option value="Hamster">Hamster</option>
            </select>

        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dueño</th>
                <th scope="col">Telefono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Nombre de la mascota</th>
                <th scope="col">Edad</th>
                <th scope="col">Tipo de mascota</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once 'dbconexion.php';
            
            if (strcmp($_GET["tipoMascota"], "todos") === 0 || strcmp($_GET["tipoMascota"], NULL)===0) {

                $query = "SELECT * from Adopcion";
                //echo $query;
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
                exit();
            } else {
                $query = "SELECT * from Adopcion WHERE tipo_mascota='" . $_GET['tipoMascota'] . "'";
                //echo $query;
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
                exit();
            }
            ?>

        </tbody>
    </table>
</body>

</html>