<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $dbName = "php200";
    $dbConn = new mysqli($host, $user, $pw, $dbName);
    $dbConn->set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "데이터베이스 접속 실패";
    }