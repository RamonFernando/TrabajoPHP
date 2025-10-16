<?php
    require_once("2_conexion.php");

    // Create
    function createTask($titulo,$descripcion, $fecha_caducidad): bool|mysqli_result{
        
        // Realizamos la conexion a la BD
        global $conn;

        // 1. Preparamos la consulta para evitar inyeccion de codigo en la BD
        $sql = $conn->prepare("INSERT INTO tareas (titulo, descripcion, fecha_caducidad) values (?, ?, ?)"); 
        
        // 2. Enlazamos los parámetros ("sss" = string, string, string), si fuera un entero "i" = integer
        $sql->bind_param("sss", $titulo, $descripcion, $fecha_caducidad);
        
        // 3. Ejecutamos la consulta
        $result = $sql->execute();
        
        // 4. Cerramos la consulta
        $sql->close();
        
        // 5. Devolvemos el resultado
        return $result;
    }

    // Read
    function readTask(){
        global $conn;

    }
    // Update
    function updateTask($id, $titulo, $descripcion, $fecha, $completada){
        global $conn;
        $sql = $conn->prepare("UPDATE tareas SET titulo = ?, descripcion = ?,
                fecha_caducidad = ?, completada = ? WHERE id = ?");
        $sql->bind_param("sssii",$titulo, $descripcion, $fecha, $completada, $id);
        $result = $sql->execute();
        $sql->close();
        return $result;
    }

    // Delete
    function deleteTask($id){
        global $conn;
        $sql = $conn->prepare("DELETE FROM tareas WHERE id = ?");
        $sql->bind_param("i", $id);
        $result = $sql->execute();
        $sql->close();
        return $result;
    }
    /*
    function deleteTask($id){
        global $conn;
        $sql = $conn->query("DELETE FROM tareas WHERE id = $id");
        return $sql;
    } */
?>