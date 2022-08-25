<?php
    require_once('config.php');


    $error = "Preencher campos obrigatórios.";
    $id = $_POST['id'];

    if(empty($_POST['name']) or empty($_POST['street']) or empty($_POST['number']) or empty($_POST['neighborhood']) or empty($_POST['city']) or empty($_POST['state'])  ){
        header("Location:preencher_endereco.php?id=$id&error=$error");
        exit;
    }
    
    $name = $_POST['name'];
    $street = $_POST['street'];
    $number = $_POST['number'];
    $neighborhood = $_POST['neighborhood'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $employee_id = $id;

    $sql = "INSERT INTO address values (NULL, '$name', '$street', '$number', '$neighborhood', '$city', '$state', '$zip_code', $id);";

    mysqli_query($link,$sql);
    
    
    header("Location: list.php");


?>