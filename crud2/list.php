<!DOCTYPE html>


<?php
    require_once "config.php";
    $sql = "SELECT * FROM employees";
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>Mostrar</title>
    </head>
    <body>

<?php
if ($result = mysqli_query($link, $sql)) {
    while ($linha = mysqli_fetch_array($result)) {

        echo $linha['name'] . " - ";
        echo $linha['salary'] . "  ";
        echo '<a href="delete.php?id=' . $linha['id'] . '">Excluir</a>' . " - " ;
        echo '<a href="visualizar.php?id=' . $linha['id'] . '">Editar</a> ' . " - ";
        echo '<a href="preencher_endereco.php?id=' . $linha['id'] . '">Cadastrar Endereço</a> <br>';


    }

    mysqli_free_result($result);
}


mysqli_close($link);

?>

    <a href="criar.php">Cadastrar</a>
    </body>
</html>


 