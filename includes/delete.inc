<?php 
    include 'connect_mysql.inc';
    $id = $_GET['id'];
    $sql = "DELETE FROM `cadastro` WHERE `id`= $id";
    mysqli_query($con, $sql) or die("Erro ao excluir o registro1!");

    if (mysqli_affected_rows($con)){
        echo "Cadastro Excluido!";
    }else {
        mysqli_close($con);
        die("Erro ao exluir o registro2!");
    }

    mysqli_close($con);
    header("refresh:2;url='../pages/home.php'");
?>