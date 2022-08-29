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
    $sql3 = "SELECT e.name AS 'Gerente', e1.name AS 'Supervisionado' FROM employees e JOIN employees e1 JOIN leadership l ON e.id=l.headchip_id AND e1.id=l.supervised_id and e1.id=" . $id . "";
    $sql4 = "SELECT e.name AS 'Gerente', e1.name AS 'Supervisionado' FROM employees e JOIN employees e1 JOIN leadership l ON e.id=l.headchip_id AND e1.id=l.supervised_id and e.id=" . $id . "";
    $sql5 = "SELECT e.name AS 'Funcionário', p.name AS 'Projeto', t.hole AS 'Função' FROM employees e JOIN project p JOIN project_team t ON e.id=t.employee_id AND p.id=t.project_id AND e.id=" . $id . "";

        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2> Nome: <?=$list['name']?> </h2>
    <p> Salário: R$ <?= $list['salary']?> </p> 
    <?php
        if($result = mysqli_query($link,$sql3)){
            $num = mysqli_num_rows($result);
            if($num!=0){
                if($num===1){
                    while ($list3=mysqli_fetch_array($result)){
                        echo "Supervisor: " . $list3['Gerente'] . ". <br>";
                    }
                }else{
                    echo "Supervisores: ";
                    $concat = "";
                    while ($list3=mysqli_fetch_array($result)) {
                        if ($num>1) {
                            $concat .= $list3['Gerente'] . ", ";
                            $num --;
                        }  else {
                            $concat .= $list3['Gerente'] . ". "; 
                        }           
                }
                echo $concat;
                echo "<br>";
                }
            }
            else 
            { echo $list['name'] . " não possui supervisores. <br>";
            }
        
        }
        if($result = mysqli_query($link,$sql4)){
            $num = mysqli_num_rows($result);
            if($num !=0){
                if($num ===1){
                    while ($list3=mysqli_fetch_array($result)){
                        echo "Supervisionado: " . $list3['Supervisionado'] . " .<br>";
                    }
                } else {
                    echo "Supervisionados: ";
                    $concat = "";
                    while ($list3=mysqli_fetch_array($result)) {
                        if ($num>1) {
                            $concat .= $list3['Supervisionado'] . ", ";
                            $num --;
                        }  else {
                            $concat .= $list3['Supervisionado'] . ". "; 
                        } 
                        
                    }
                echo $concat;   
                echo "<br>";
                }                
            }
            else {
            echo $list['name'] . " não possui supervisionados. <br>";
            }
            echo "<br>";
        }
            if($result=mysqli_query($link,$sql5)){
                $num = mysqli_num_rows($result);
                if($num!=0){
                    while ($list4=mysqli_fetch_array($result)){
                        echo $list['name'] . " participa do " . $list4['Projeto'] . " como " . $list4['Função']  . ". <br>";
                    }
                }else {
                    echo $list['name'] . " não está alocada em nenhum Projeto. <br>";
                    }
                
            }
        
    ?>
    
    <br>
    <a href="list.php"><button type="button">Voltar</button></a>
    <hr>
    <a href="preencher_endereco.php?id=<?=$id?>"><button type="button">Cadastrar novo endereço</button></a>

    <h4> Endereços </h4>
    <?php
       

        if ($result = mysqli_query($link, $sql2)) {
            if (mysqli_num_rows($result)!=0) {
                while ($list2 = mysqli_fetch_array($result)) {
                    echo "Tipo: " . $list2['name'] . "<br>  " ;
                    echo "Rua: " . $list2['street'] . "," . " " . $list2['number'] . "<br> ";
                    echo "Bairro: " . $list2['neighborhood'] . "<br> ";
                    echo "Cidade: " . $list2['city'] . " - Estado: " . $list2['state'] . "<br>";
                    if ($list2['zip_code']!= "") {
                        echo "CEP: " . $list2['zip_code'] . "<br>";
                    }
                    echo "<br>";
                    echo '<button type="button" onclick="confirmDelete()" >Deletar Endereço</button> <br>';
                    echo "<hr>";

                    $id=$list2['id'];
                    $employee_id=$list2['employee_id'];
                    
                }
            } else {
                echo "Essa pessoa não possui endereços cadastrados.";
            }
           
        }        
           
        mysqli_free_result($result);
        
        mysqli_close($link);
    ?>


 <script>
    const confirmDelete = () => {
        if(confirm("Tem certeza que deseja deletar esse endereço?")){
            location.href = "deletar_endereco.php?id=<?=$id?>&employee_id=<?=$employee_id?>";
        }

    }

    

 </script>


 
    
</body>
</html>