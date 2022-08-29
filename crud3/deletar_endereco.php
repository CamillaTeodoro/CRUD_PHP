<?php
    require_once('config.php');
    $sql = "DELETE FROM address WHERE id=" . $_GET['id'] . "";

    $result = mysqli_query($link,$sql);
    $id = $_GET['employee_id'];

    header("Location: mostrar.php?id=$id");
?>