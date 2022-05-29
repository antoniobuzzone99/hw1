<?php
    include "auth.php"; 

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $id_post = mysqli_real_escape_string($conn, $_GET['post_id']);
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    $query = "INSERT INTO preferiti(id_utente,id_post) VALUES($id,$id_post)";
    $res = mysqli_query($conn, $query);
    mysqli_close($conn);

?>