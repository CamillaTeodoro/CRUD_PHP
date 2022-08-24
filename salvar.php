<?php
    require_once('config.php');

    $error = "Campos em branco não são permitidos.";
    $id = $_POST['id'];

    if(empty($_POST['name'])){
        header("Location:visualizar.php?id=$id&error=$error");
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['address'])){
        header("Location:visualizar.php?id=$id&error=$error");
    } else {
        $address = $_POST['address'];
    }

    if(empty($_POST['salary'])){
        header("Location:visualizar.php?id=$id&error=$error");
    }else {
        $salary = $_POST['salary'];
    }


    $sql = "UPDATE employees SET name='$name', address='$address', salary= $salary WHERE id=" . $_POST['id'] . "";

    //echo $sql;
   
    
    $result = mysqli_query($link,$sql);

    header("Location: list.php");
?>