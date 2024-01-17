<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link rel="stylesheet" href="../assets/styles/home_style.css">
</head>
<body>
    <header class="containerLinks">
        <nav>
            <ul>
                <li>
                    <a href="./home.php" id="activated">
                        HOME
                    </a>
                </li>
                
                <li>
                    <a href="./register.php">
                        CADASTRO
                    </a>
                </li>

                <li>
                    <a href="sort.php">
                        SORTEIO
                    </a>
                </li>

            </ul>
        </nav>
    </header>
    <div class="containerMajor">
        <div class="containerPeoplesTitle">
            <div class="containerTitle">
                <h1>Sorteio do Amigo Secreto</h1>
            </div>
            <div class="containerPeoples">
                <div class="containerSearch">
                    <span>Nome</span>
                    <!-- SearchBar -->
                    <div class="searchBar">
                        <form class="search" action="">
                            <input type="text" id="search" name="search" placeholder="Pesquisar...">
                            <input type="submit" value="&#128269;" id="submitSearch">
                        </form>
                    </div>
                </div>
                <div class="separation">
                    <hr>
                </div>
                <ul>
                    <!-- app-pessoas -->
                <?php 
                    include('../includes/connect_mysql.inc');
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $sql = "SELECT id, nome, email FROM cadastro WHERE nome LIKE '%$search%' OR email LIKE '%$search%'";
                        $result = $con->query($sql);
                    } else{

                        $sql = "SELECT id, nome, email FROM `cadastro`";
                        $result = $con->query($sql);
                    }
                        if($result){

                            while($row = $result->fetch_assoc()): ?>
                    
                    <div class="minorContainerPeoples">
                        <div class="contentPeoples">
                            <p>
                                <?php echo $row["nome"];?>
                            </p>
                            <span>
                                <?php echo $row["email"];?>
                            </span>
                        </div>
                        
                        <a href="register.php?id=<?php echo $row['id']; ?>&nome=<?php echo $row['nome'];?>&email=<?php echo $row['email'];?>">
                            <img src="../assets/icons/edit.svg" alt="edit" height="30px" width="30px">
                        </a>
                        
                        <a href="../includes/delete_helper.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Deseja mesmo excluir este cadastro?');">
                            <img src="../assets/icons/delete.svg" alt="delete" height="30px" width="30px">
                        </a>
                        
                    </div>
                    <hr>
                    <?php endwhile;?>
                <?php } else{
                    die($con->error);
                    }
                ?>

                </ul>
            </div>
        </div>
    </div>
</body>
</html>