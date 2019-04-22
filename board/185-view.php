<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';

    if(isset($_GET['boardID']) && (int) $_GET['boardID'] > 0) {
        $boardID = $_GET['boardID'];
        $sql = "SELECT b.title, b.content, m.nickname, b.regTime FROM board b ";
        $sql .= "JOIN member m ON (b.member ID = m.memberID) ";
        $sql .= "WHERE b.boardID = {$boardID}";

        echo $sql;

        $result = $dbConn->query($sql);

        echo $result;

        if($result) {
            $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "제목 : " . $contentInfo['title'] . "<br/>";
            echo "작성자 : " .$contentInfo['nickname'] . "<br/>";
            $regDate = date("Y-m-d h:i");
            echo "게시일 : {$regDate} <br><br>";
            echo "내용<br>";
            echo $contentInfo['content'].'<br>';
            echo "<a href='/phpboard/board/183-list.php'>목록으로 이동</a>";

        } else {
            echo "잘못된 접근입니다.";
            exit;
        
        } 
    } else {
        echo "잘못된 접근입니다.";
        exit;
    }
?>