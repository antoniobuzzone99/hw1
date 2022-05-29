<?php
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,
    "https://api-football-standings.azharimm.site/leagues/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $res = curl_exec($curl);
    echo($res);

?>

