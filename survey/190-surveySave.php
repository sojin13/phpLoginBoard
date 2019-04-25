<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';

    $surveyKind = $_POST['surveyKind'];

    //값 유효성 검사

    switch($surveyKind) {
        case 'offlineStore':
        case 'onlineStore':
        case 'website':
        case 'friends':
        case 'academy':
        case 'etc':
            break;
        default :
            echo "잘못된 값이 입력되었습니다.";
            exit;
            break;
    }

    $memberID = $_SESSION['memberID'];

    //이미 설문조사 했는지 확인

    $sql = "SELECT surveyID FROM survey WHERE memberID = {$memberID}";
    $result = $dbConn->query($sql);

    if($result) {
        $dataCount = $result->num_rows;
            if($dataCount == 0){
                //설문조사 가능
                $regTime = time();
            $sql = "INSERT INTO survey (memberID, kind, regTime) VALUES ({$memberID}, '{$surveyKind}', {$regTime})";
            $result = $dbConn->query($sql);
            echo $sql;
            echo $result;

            if($result){
                echo "설문조사 참여 완료<br>";
                echo "<a href='191-surveyView.php'>설문조사 결과로 이동</a>";
                exit;
            } else {
                echo "저장실패 : 관리자에게 문의1";
                exit;
            }
        } else {
            //설문조사 불가
            echo "이미 참여했습니다.<br>";
            echo "<a href='191-surveyView.php'>설무조사 결과로 이동</a>";
            exit;
        }
    } else {
        echo "저장 실패 : 관리자에게 문의2";
        exit;
    }
?>