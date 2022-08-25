<!DOCTYPE html>

<?php
    require_once('config.php');
    $sql = "SELECT * FROM employees WHERE id=" . $_GET['id'] . "";

    $result = mysqli_query($link,$sql);

    $list = mysqli_fetch_array($result);

    $name = $list['name'];
    $salary = $list['salary'];
    $id = $list['id'];
    //echo $id;

    mysqli_free_result($result);

    $sql2 = "SELECT * FROM address WHERE employee_id=" . $id . "";
    



        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2> Nome: <?=$list['name']?> </h2>
    <p> Salário: <?= $list['salary']?> </p> 
    <a href="preencher_endereco.php?id=<?=$id?>"><button type="button">Cadastrar novo endereço</button></a>
    <hr>
    <h4> Endereços </h4>
    <?php
       

        if ($result = mysqli_query($link, $sql2)) {
            while ($list2 = mysqli_fetch_array($result)) {
                echo "Tipo: " . $list2['name'] . "<br>  " ;
                echo "Rua: " . $list2['street'] . "," . " " . $list2['number'] . "<br> ";
                echo "Bairro: " . $list2['neighborhood'] . "<br> ";
                echo "Cidade: " . $list2['city'] . " - Estado: " . $list2['state'] . "<br>";
                if ($list2['zip_code']!= "") {
                    echo "CEP: " . $list2['zip_code'] . "<br>";
                }
                echo "<br>";
                echo '<a href="deletar_endereco.php?id=' . $list2['id'] . '"><button type="button">Deletar Endereço</button></a> <br>';
                echo "<hr>";


            }
        }        
    
    mysqli_free_result($result);
        
    ?>


 <?php
    mysqli_close($link);
 ?>
    
</body>
</html>