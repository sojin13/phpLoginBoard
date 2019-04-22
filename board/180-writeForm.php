<?php

include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="181-saveBoard.php" method="post" name="boardWrite">
    제목
    <br><br>
    <input type="text" name="title" required/>
    <br><br>
    내용
    <br><br>
    <textarea name="content" cols="80" rows="10" required></textarea>
    <br><br>
    <input type="submit" value="저장" />
</form>
</body>
</html>