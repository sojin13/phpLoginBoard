<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';

    $date = $_POST['date'];

    if(empty($date)){
        echo '날짜 정보가 없습니다.';
        exit;
    }


    $date = explode('-', $date);
    $date[0] = (int) $date[0];
    $date[1] = (int) $date[1];
    $date[2] = (int) $date[2];

    function checkint($num) {

        if($num > 0) {
            return;
        } else {
            echo "잘못된 날짜값이 입력되었습니다.";
            exit;
        }
    }

    foreach($date as $d) {

        checkint($d);
    }

    $media = $_POST['media'];

    switch($media) {
        case 'naver':
        case 'daum':
            break;
        default :
            echo "잘못된 미디어 값이 입력되었습니다.";
            exit;
            break;
    }

    $viewDate = $date[0].'년'.$date[1].'월'.$date[2].'일';

    $startDate = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
    $endDate = mktime(23, 59, 59, $date[1], $date[2], $date[0]);


    $sql = "SELECT * FROM realtimekeyword WHERE media = '{$media}' ";
    $sql .= "AND regTime >= {$startDate} AND regTime <= {$endDate} ";
    $sql .= "AND keyword != '' ORDER BY realtimekeywordID ASC";
    $result = $dbConn->query($sql);
    $dataCount = $result->num_rows;

    $hourList = array();

    for($i=0; $i<$dataCount; $i++) {
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $hour = date('G', $data['regTime']);

        if(!array_key_exists($hour, $hourList)){
            $hourList[$hour] = array();
        }

        array_push($hourList[$hour], date('i', $data['regTime']).'분: '.$data['keyword']);
    }
?>
<!doctype html>
<html>
<head>
<title>실시간 검색어 날짜 선택 페이지</title>
</head>
<body>
    <a href="./200-1-selectForm.php">선택 페이지로 이동</a>
    <h1><?=$viewDate.'의 '.$media.'의 시간별 1위 검색어 목록'?></h1>
<?php
    foreach($hourList as $hl => $value) {
        echo "<h2>{$hl}시</h2>";
        foreach($value as $v) {
            echo $v.'<br>';
        }
    }
?>
</body>
</html>