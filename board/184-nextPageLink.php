<?php
    //전체 레코드 수 구하기

    $sql = "SELECT count(boardID) FROM board";
    $result = $dbConn->query($sql);

    $boardTotalCount = $result->fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

    //총 페이지수
    $totalPage = ceil($boardTotalCount / $numView);

    //처음 페이지 이동
    echo "<a href=./183-list.php?page=1>처음</a>&nbsp";

    //이전 페이지 이동

    if($page != 1) {
        $previousPage = $page - 1;
        echo "<a href='./183-list.php?page={$previousPage}'>이전</a>";
    }

    //현재 페이지의 앞 뒤 페이지 수 표시
    $pageTerm = 5;

    //처음 표시할 페이지 현재 페이지 기준으로 5개 이전까지 표시
    $startPage = $page - $pageTerm;
    //음수일 경우
    if($startPage < 1) {
        $startPage = 1;
    }

    //페이지 이후 5개까지만 표현
    $lastPage = $page + $pageTerm;

    //마지막 페이지 수보다 클 경우 
    if($lastPage >= $totalPage) {
        $lastPage = $totalPage;
    }

    for($i = $startPage; $i <= $lastPage; $i++) {
        $nowPageColor = 'unset';
        if($i == $page) {
            $nowPageColor = 'hotpink';
        }
        echo "&nbsp<a href='./183-list.php?page={$i}'";
        echo "style='color:{$nowPageColor}'>{$i}</a>&nbsp;";
    }

    //다음 페이지 이동링크
    if($page != $totalPage) {
        $nextPage = $page + 1;
        echo "<a href='./183-list.php?page={$nextPage}'>다음</a>";
    }

    //마지막 페이지 이동링크
    echo "&nbsp;<a href='./183-list.php?page={$totalPage}'>끝</a>";

?>