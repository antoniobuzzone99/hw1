<?php
    include "auth.php";

?> 

<!DOCTYPE html>
<html>
    <head>
        <title>hw1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <nav id="menu">
            <?php
                if(!checkAuth()){
                    echo "<div></div>";
                    echo "<a class='icone0' href='login.php'><img src='img/login.png'></a>";
                } else{
                    $text1="Benvenuto!";
                    $nome = $_SESSION["username"];
                    echo "<div class= benv0>";
                    echo "<div class='benv'>$text1</div>";
                    echo "<div class='nome'>$nome</div>";
                    echo "</div>";
                    echo "<a class='icone1' href='cliente.php'><img src='img/profilo.png'></a>";
                    echo "<a class='icone2' href='logout.php'><img src='img/logout.png'></a>";
                }
            ?>
        </nav>
        <header>
            <div id = "overlay">
                <div id='intro'>
                    <h1><strong>CAMPIONI D'ITALIA</strong></h1>
                    <img id="intro_img" src="img/scudetto.png">
                </div>
                <h2><a href='blog.php'>Scopri</a></h2>
            </div>
        </header>
        <footer>
            <img class="footerimg" src="img/facebook.png">
            <img class="footerimg" src="img/twitter1.png">
                bzznns99h13c351m@studium.unict.it/ github: antoniobuzzone99<br>
                1000002102/ ingegneria informatica a.a: 2021-2022
            </div>
            <img class="footerimg" src="img/yt.png">
            <img class="footerimg" src="img/instagram.png">
        </footer>
    </body>
</html>