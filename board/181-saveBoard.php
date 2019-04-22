<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';


    $title = $_POST['title'];
    $content = $_POST['content'];

    if($title != null && $title != '') {
        $title = $dbConn->real_escape_string($title);

    } else {
        echo "제목을 입력하세요";
        echo "<a href='/180-writeForm.php>작성페이지로 이동</a>";
        exit;
    }

    if($content != null && $content != '') {
        $content = $dbConn->real_escape_string($content);

    } else {
        echo "제목을 입력하세요";
        echo "<a href='/180-writeForm.php>작성페이지로 이동</a>";
        exit;
    }

    $memberID = $_SESSION['memberID'];

    $regTime = time();

    $sql = "INSERT INTO board (memberID, title, content, regTime)";
    $sql .= "VALUES ({$memberID}, '{$title}', '{$content}', {$regTime}) ";
    $result = $dbConn->query($sql);

    if($result){
        echo "저장완료";
        echo "<a href='./183-list.php'>게시글 목록으로 이동</a>";
        exit;
    }

?>
