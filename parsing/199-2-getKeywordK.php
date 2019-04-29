<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';

    $curl = curl_init();
    $url = 'https://www.daum.net';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $htmlCode = curl_exec($curl);
    curl_close($curl);

    $pattern = '/span class=\"txt_issue\"\>(.*)\</';
    preg_match($pattern, $htmlCode, $matchKeywords);
    $keyword = $matchKeywords[1];
    $koreaPattern = '/\>(.*)\</';
    preg_match($koreaPattern, $keyword, $matchKeywords);
    $keyword = $matchKeywords[1];
    echo '현재 K사의 실시간 검색 1위 키워드 : '.$keyword;
?>