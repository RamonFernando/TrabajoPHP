<?php
    include("2_conexion.php");
    $result = $conn->query("SELECT * FROM tareas ORDER BY id DESC");

    echo "Tareas \n";
    $nombre = readline("Introduce un nombre: ");

    echo "Tu nombre es: " . $nombre;

?>