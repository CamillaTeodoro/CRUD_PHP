<!DOCTYPE html>

<?php
    require_once "config.php";
    $sql = "SELECT * FROM employees";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">   
    <title>Criar</title>
</head>
<body>

<span>
<?php
    if($_GET){
        echo $_GET['error'];
    }

    ?>

</span>
    
    
    <form method="POST" action="insere.php">
        <input type="text" name="name" placeholder="Nome" > <br>
        <input type="number" step="0.01"  name="salary" placeholder="Salário" > <br>
        <input type="submit" value="Cadastrar">

    </form>
    
</body>
</html>