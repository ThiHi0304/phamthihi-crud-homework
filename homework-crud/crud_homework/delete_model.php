<?php
    require './database/database.php';
    $id = $_GET['id']; 

    if (isset($id)) {
        deleteStudent($id);
    }
    
    header('Location: index.php');
    exit;

?>