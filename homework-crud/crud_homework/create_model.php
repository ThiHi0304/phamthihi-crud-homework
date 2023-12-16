<?php
require 'database/database.php';
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['age'])){
        $age= $_POST['age'];
    }
    if(isset($_POST['email'])){
        $email= $_POST['email'];
    }
    if(isset($_POST['profile'])){
        $profile= $_POST['profile'];
    }
createStudent($name,$age,$email,$profile);
header('Location: ./index.php');




