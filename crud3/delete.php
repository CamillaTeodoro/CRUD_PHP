<?php
    require_once('config.php');
    $sql = "DELETE FROM employees WHERE id=" . $_GET['id'] . "";

    $result = mysqli_query($link,$sql);

    header("Location: list.php");
?>