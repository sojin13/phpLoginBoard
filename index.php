<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php' ;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>메인 페이지</title>
</head>
<body>
<?php
    if(!isset($_SESSION['memberID'])) {
?>
    <a href="signUp/173-signUpForm.php">회원가입</a>
    <br>
    <a href="signIn/175-signinForm.php">로그인</a>
<?php
    } else {
?>
    <a href="board/183-list.php">게시판</a>
    <br>
    <a href="survey/189-surveyForm.php">설문조사 프로그램</a>
    <br>
    <a href="gChart/195-1-surveyResultBarChart">투표결과 바차트로 보기</a>
    <br>
    <a href="gChart/195-2-surveyResultPieChart">투표결과 파이차트로 보기</a>
    <br>
    <a href="webEditor196-editorForm.php">간단한 코딩에디터</a>
    <br>
    <a href="parsing/200-1-selectForm.php">실시간 검색어 1위 키워드</a>
    <br>
    <a href="signIn/177-signOut.php">로그아웃</a>
<?php
    }
?>
</body>
</html>