<?php
    include "auth.php";

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $logo = mysqli_real_escape_string($conn,$_GET['logo']);
    $descr = mysqli_real_escape_string($conn,$_GET['descrizione']);
    $id = $_SESSION['user_id'];
    $query = "INSERT INTO posts(cliente,nlikes,content) VALUES('$id',0, JSON_OBJECT('url','$logo','descrizione','$descr'))";
    mysqli_query($conn,$query);
    mysqli_close($conn);
     
?>