<?php
    require_once('config.php');
    $sql = "DELETE FROM address WHERE id=" . $_GET['id'] . "";

    $result = mysqli_query($link,$sql);
    $id = $_GET['id'];

    header("Location: mostrar.php?id=$id");
?>