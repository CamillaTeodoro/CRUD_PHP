<?php
    require_once("config.php");

    $error = 'Todos os campos devem ser preenchidos.';

    if(empty($_POST['name'])){
        header("Location: criar.php?error=$error");
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['address'])){
        header("Location: criar.php?error=$error");
    } else {
        $address = $_POST['address'];
    }

    if(empty($_POST['salary'])){
        header("Location: criar.php?error=$error");
    } else {
        $salary = $_POST['salary'];
    }

    $sql = "INSERT INTO employees VALUES(NULL, '$name', '$address', $salary)";

    
    
    $result = mysqli_query($link,$sql);
    mysqli_close($link);

    header('Location: list.php');

?>