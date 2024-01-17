<?php 
    include '../includes/connect_mysql.inc';
    
    if (mysqli_connect_errno()){
        echo "Falha ao Conectar ao servidor: " . mysqli_connect_error();
    }
    $id=null;
    $nome=null;
    $email=null;
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $cadastroAtual = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM cadastro WHERE id = $id")) or die (mysqli_error($con));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link rel="stylesheet" href="../assets/styles/register_style.css">
</head>
<body>
    <header class="containerLinks">
        <nav>
            <ul>
                <li>
                    <a href="./home.php">
                        HOME
                    </a>
                </li>
                
                <li>
                    <a href="./register.php" id="activated">
                        CADASTRO
                    </a>
                </li>

                <li>
                    <a href="./sort.php">
                        SORTEIO
                    </a>
                </li>

            </ul>
        </nav>
    </header>
    <div class="containerMajor">
        <div class="containerInputTitle">
            <div class="containerTitle">
                <h1>Cadastro</h1>
            </div>
            <div class="inputs">
                <div class="containerInput">
                    <!-- script.php -->
                    <form action="../includes/register_helper.php" method="post">
                        <div class="contentForm">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" value="<?php echo $nome;?>" required>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $email;?>" pattern="[a-zA-Z0-9._-!]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required placeholder="exemplo@exemplo.com">
                            <input type="number" name="id" hidden="hidden" value="<?php echo $id; ?>">    
                            <input type="submit" value="Salvar" id="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>