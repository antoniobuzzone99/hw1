<?php
    include 'auth.php';
    if (!checkAuth()) exit;

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);

    $array = array();
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    $query = "SELECT * FROM posts p  join preferiti pr on  pr.id_post = p.id join cliente c on c.user_id = p.cliente where pr.id_utente = $id order by id desc";

    $res = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($res)){

            $array[]= array(
            'id' => $row['cliente'],
            'username' => $row['username'], 
            'id_post' => $row['id'],
            'content' => json_decode($row['content'])
            ); 
        }
    
    echo json_encode($array); 
    mysqli_close($conn);
?>