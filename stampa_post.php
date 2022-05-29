<?php
    include 'auth.php';
    if (!checkAuth()) exit;

    $db = "db1";
    $conn = mysqli_connect("localhost","root","",$db);
    $array = array();
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    $query = "SELECT * FROM posts p join cliente c on p.cliente = c.user_id order by p.id desc";
    $res = mysqli_query($conn,$query);
    
        while($row = mysqli_fetch_assoc($res)){
            $query2 = "SELECT * FROM likes where id_utente = $id and id_post =  ".$row['id']."";
            $res1 = mysqli_query($conn,$query2);
            if (mysqli_num_rows($res1) > 0){
                $verifica = true;
            }else{
                $verifica = false;
            }

            $query3 = "SELECT * FROM preferiti where id_utente = $id and id_post =  ".$row['id']."";
            $res2 = mysqli_query($conn,$query3);
            if (mysqli_num_rows($res2) > 0){
                $preferiti = true;
            }else{
                $preferiti = false;
            }

            $array[]= array(
            'id' => $row['cliente'],
            'id_post' => $row['id'],
            'username' => $row['username'],
            'nlikes' => $row['nlikes'],
            'content' => json_decode($row['content']),
            'verifica' => $verifica,
            'preferiti' => $preferiti
            ); 
        }
    
    echo json_encode($array);
    mysqli_close($conn);
?>