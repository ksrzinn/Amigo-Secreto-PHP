<?php 
    include 'connect_mysql.inc';

    $nome = $_POST['name'];
    $email = $_POST['email'];
    

    if(isset($_POST['id']) and $_POST['id'] != null){
        $id = $_POST['id'];
        $sql = "UPDATE cadastro SET nome = '$nome', email = '$email' WHERE id = '$id'";
        if ($con->query($sql) == TRUE){
            echo "Cadastro atualizado com sucesso!";
        } else{
            echo "Erro: " . $sql . "<br>" . $con->error;
        }
    } else {
        $sql = "INSERT INTO cadastro (nome, email) VALUES ('$nome', '$email')";

        if ($con->query($sql) == TRUE){
            echo "Cadastro incluido com sucesso!";
        } else{
            echo "Erro: " . $sql . "<br>" . $con->error;
        }
    }

    $con->close();
?>