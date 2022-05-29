
<?php
    include "auth.php";
    if(checkAuth()){ 
        header("Location: home.php");
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {   
        $db = "db1";
        $conn = mysqli_connect("localhost","root","",$db);

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $searchField = "username";

        $query = "SELECT * FROM cliente WHERE $searchField = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));


        if(mysqli_num_rows($res) > 0 ){
            $entry = mysqli_fetch_assoc($res);

            if($_POST["password"] === $entry["password"]){
                $_SESSION["user_id"] = $entry['user_id'];
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["nome"] = $entry["nome"];  
                $_SESSION["cognome"] = $entry["cognome"];  
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }

        }   
        $error = "Username e/o Password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e/o password.";
    }

?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="page">
        <img class="foto" src="img/copertina.jpg">
        <section>
            <img class="logo" src="img/user.png">
            <div id='box'>
                <form id = 'form' name='login' method='post'>
                    <div class = 'box1'>
                        <div class="username">
                            <label>Username</label><input type='text' name='username'>
                        </div>
                    </div>
                    <div class = 'box1'>
                        <div class="password">
                            <label>Password</label><input type='password' name='password'>
                        </div>
                    </div>
                    <div class = 'box1'>
                        <div class="submit"><input id="accedi" type='submit' value="Accedi"></div>
                    </div>
                </form>
                <?php
                    if(isset($error)){
                        echo"<div class = errore >$error</div>";
                    }
                ?>
                <div class="signup">Non hai un account? <a href="signup.php">Registrati!</a></div>
            </div>
        </section>
    </div>
</body>
</html>