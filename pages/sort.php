<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto</title>
    <link rel="stylesheet" href="../assets/styles/sort_style.css">
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
                    <a href="./register.php">
                        CADASTRO
                    </a>
                </li>

                <li>
                    <a href="sort.php" id="activated">
                        SORTEIO
                    </a>
                </li>

            </ul>
        </nav>
    </header>

<!-- Sort Page -->
    <div class="containerMajor">
        <div class="containerSortTitle">
            <div class="contentTitle">
                <h1>Sorteio</h1>
            </div>
            <!-- app-sorteio -->
            <div class="containerSort">
                <div class="lowTitle">
                    <h3>Resultado</h3>
                </div>
                <div class="separator">
                    <hr>
                </div>
                <div class="containerMatchs">
                    <!-- app-match -->
                    <div class="containerPeoplesMatches">
                        <div class="contentMatches">
                            <ul>
                                <?php include '../includes/sort_helper.inc';?>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>