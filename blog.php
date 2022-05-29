<?php
    
    include "auth.php";
    
    if(!checkAuth()){
        header("Location: login.php");
    }
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>mhw1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="blog.css"/>
        <script src="blog.js" defer="true"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <div id = "overlay">
                <nav id="menu">
                    <div></div>
                    <div id="dx">
                        <a class="icone0" href="home.php"><img src="img/home.png"></a>
                        <a class='icone1' href='cliente.php'><img src='img/profilo.png'></a>
                        <a class="icone2" href="logout.php"><img src="img/logout.png"></a>
                    </div>
                </nav>
            </div>
        </header>
            <h1>POST CONDIVISI</h1>
            <article id="flex">
                <div id='risposta2'></div>  
            </article>
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