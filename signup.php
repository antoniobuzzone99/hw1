<?php
    require_once 'auth.php';

    if(checkAuth()){ 
        header('Location: home.php');
        exit;
    }

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['conferma_password']) &&
    !empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['data'])){
        $error = array();
        
        
        $db = "db1";
        $conn = mysqli_connect("localhost","root","",$db);
        

        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])){
            $error[] = "username non valido";
        }else{
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM cliente WHERE username ='$username'";
            $res = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($res) > 0){
                $error[] = "username già utilizzato";
            }
        }

        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = "email non valida";
        }
        else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $query = "SELECT email FROM cliente WHERE email ='$email'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "email già utilizzata";
            }
        }

        
        if(strlen($_POST["password"]) <8){
            $error[] = "password non valida";
        }

        if(strcmp($_POST["password"], $_POST["conferma_password"]) != 0){
            $error[] = "password diverse";
        }

        
        if(count($error) == 0) {
            
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $data = mysqli_real_escape_string($conn, $_POST['data']);
            $query = "INSERT INTO cliente(nome, cognome,username, data_nascita,email,password) 
            VALUES('$nome', '$cognome','$username','$data','$email','$password')";

            if (mysqli_query($conn, $query)) {
                $_SESSION["user_id"] = mysqli_insert_id($conn); 
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["nome"] = $_POST["nome"];  
                $_SESSION["cognome"] = $_POST["cognome"];
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            }
        }

        mysqli_close($conn);     
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
        <title>Signup</title>
        <link rel="stylesheet" href="signup.css">
        <script src="signup.js" defer="true"></script>
    </head>
    <body>
    <div id="page">
        <img class="foto" src="img/copertina.jpg">
        <section>
            <h1>Iscriviti!</h1>
            <div id='box'>
                <form id="form" name='signup' method='post'>
                    <div class='box1'>
                        <div class="nome">
                            <label>Nome</label><input type="text" name="nome">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="cognome">
                            <label>Cognome</label><input type="text" name="cognome">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="username">
                            <label>Username</label><input type="text" name="username">
                        </div>  
                    </div>
                    <div class='box1'>
                        <div class="data">
                            <label>Data di Nascita</label><input type="date" name="data">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="email">
                            <label>Email</label><input type="text" name="email">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="password">
                            <label>Password</label><input type='password' name='password'>
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="conferma_password">
                            <label>Conferma Password</label><input type='password' name='conferma_password'>
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="submit">
                            <input id="accedi" type='submit' value="Registrati">
                        </div>
                    </div>
                </form>
                <div class="signup">Hai un account? <a href="login.php ">Accedi!</a></div>
            </div>
        </section>
    </div>
    </body>
</html>