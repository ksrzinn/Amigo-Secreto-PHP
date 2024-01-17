<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $erro = 0;
        // if(empty($nome) || strstr($nome, ' ')==false){
        //     echo "Favor preencher o campo Nome corretamente.<br>";
        //     $erro = 1;
        // }
        
        if(empty($email) || strstr($email, '@') == false){
            echo "Favor preencher o campo Email corretamente. <br>";
            $erro = 1;
            header("refresh:2;url=../pages/register.php?nome=". $nome . "&email=". $email);
        }

        if (isset($_POST['email'])){
            include '../includes/connect_mysql.inc';
            $query = mysqli_query($con, "SELECT * FROM cadastro WHERE email='$email'");
            $numeros = mysqli_num_rows ($query);
            if($numeros > "0"){
                echo "Email ja cadastrado! Por gentileza insira um email diferente.";
                $erro = 1;
                header("refresh:2;url=../pages/register.php?nome=". $nome . "&email=". $email);
            }
        }
        
        if($erro == 0){
            echo "Todos os dados inseridos corretamente. <br>";
            include 'insert.inc';
            header("refresh:2;url=../pages/home.php");
            // <script>
            //     javascript:window.location.replace("../pages/home.php");
            // </script>
        }
    ?>

</body>
</html>