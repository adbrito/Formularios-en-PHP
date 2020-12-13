<?php
//phpinfo();
require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   // echo "Connected to $dbname at $host successfully.";

    // foreach ($conn->query('SELECT * from Mascota') as $fila) {
    //     print_r($fila);
    // }
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
