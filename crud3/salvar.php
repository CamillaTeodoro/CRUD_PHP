<?php
    require_once('config.php');

    $error = "Campos em branco não são permitidos.";
    $id = $_POST['id'];

    if(empty($_POST['name']) or empty($_POST['salary'])){
        header("Location:visualizar.php?id=$id&error=$error");
        exit;
    }
    
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    

    $sql = "UPDATE employees SET name='$name', salary= $salary WHERE id=$id";

    //echo $sql;
    //exit;
    
    $result = mysqli_query($link,$sql);

    header("Location: list.php");
?>