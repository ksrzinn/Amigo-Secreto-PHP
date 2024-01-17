<?php 
    $con = mysqli_connect('localhost', 'root', '', 'amigosecreto');


    if($con->connect_error){
        die("Falha ao realizar a conexao: " . $conexao->connect_error);
    }

?>