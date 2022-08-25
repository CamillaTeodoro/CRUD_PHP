<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    require_once('config.php');
    $sql = "SELECT * FROM address";
    $employee_id = $_GET['id'] ;
    

    ?>
</head>
<body>
<span>
    <?php
    if($_GET){

        echo $_GET['error'];
    }

    ?>
    </span>
  
    
    <form method="POST" action="salva_endereco.php">
        <input type="hidden" name="id" value="<?= $employee_id?>">
        <input type="text" name="name" placeholder="Identificador" > <br>
        <input type="text" name="street" placeholder="Rua" > <br>
        <input type="text" name="number" placeholder="Número" > <br>
        <input type="text" name="neighborhood" placeholder="Bairro" > <br>
        <input type="text" name="city" placeholder="Cidade" > <br>
        <input type="text" name="state" placeholder="Estado" > <br>
        <input type="text" name="zip_code" placeholder="CEP" > <br>
        <input type="submit" value="Cadastrar">

    </form>
    
</body>
</html>