<!DOCTYPE html>

<?php
    require_once('config.php');
    $sql = "SELECT * FROM employees WHERE id=" . $_GET['id'] . "";

    $result = mysqli_query($link,$sql);

    $list = mysqli_fetch_array($result);

    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <span>
    <?php
    if($_GET){

        echo $_GET['error'];
    }

    ?>
    </span>

    <form method="POST" action="salvar.php">
        <input type="hidden" name="id" value="<?= $list['id']?>" >
        <input type="text" name="name" value="<?= $list['name']?>" > <br>
        <input type="text" name="address" value="<?= $list['address']?>" > <br>
        <input type="number" name="salary" value="<?= $list['salary']?>" > <br>
        <input type="submit" value="Salvar">

    </form>

 <?php
    mysqli_free_result($result);
    mysqli_close($link);
 ?>
    
</body>
</html>