<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/179-checkSignSession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>설문조사 프로그램</title>
</head>
<body>
    <h1>설문조사 프로그램</h1>
    <h2>당신은 어떤 경로로 본사를 알게 되었나요?</h2>
    <form action="./190-surveySave.php" name="survey" method="post">
        <input type="radio" name="surveyKind" value="offlineStore" required />
        오프라인 서점
        <br>
        <input type="radio" name="surveyKind" value="onlineStore" required />
        온라인 서점
        <br>
        <input type="radio" name="surveyKind" value="website" required />
        웹사이트
        <br>
        <input type="radio" name="surveyKind" value="friends" required />
        지인을 통해서
        <br>
        <input type="radio" name="surveyKind" value="academy" required />
        교육기관
        <br>
        <input type="radio" name="surveyKind" value="noMemory" required />
        기억이 안남
        <br>
        <input type="radio" name="surveyKind" value="etc" required />
        기타
        <br>
        <input type="submit" value="제출" />
    </form>
</body>
</html>