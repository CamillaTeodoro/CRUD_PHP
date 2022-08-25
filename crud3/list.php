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

        echo '<a href="mostrar.php?id=' . $linha['id'] . '">'.$linha['name'].' </a>' . " - " ;
        //echo $linha['salary'] . "  ";
        echo '<a href="delete.php?id=' . $linha['id'] . '"><button type="button">Excluir</button></a>' . " - " ;
        echo '<a href="visualizar.php?id=' . $linha['id'] . '"><button type="button">Editar</button></a> ' . " - ";
        echo '<a href="preencher_endereco.php?id=' . $linha['id'] . '"><button type="button">Cadastrar Endereço</button></a> <br>';


    }

    mysqli_free_result($result);
}


mysqli_close($link);

?>
    <br>
    <br>
    <a href="criar.php"><button type="button"> Cadastrar </button></a>
    </body>
</html>


 