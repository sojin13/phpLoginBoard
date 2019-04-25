<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';

    $kindList = array();
    $kindList = ['offlineStore', 'onlineStore', 'website', 'friends', 'academy', 'noMemory', 'etc'];

    $memberID = 2;

    for($i = 1; $i <= 100; $i++) {
        $memberID++;
        $kind = $kindList[rand(0,6)];
        echo $kind;
        $time = time();
        $sql = "INSERT INTO survey (memberID, kind, regTime) ";
        $sql .= "VALUES ({$memberID}, '{$kind}', {$time}) ";

        $dbConn->query($sql);
    
    }

?>