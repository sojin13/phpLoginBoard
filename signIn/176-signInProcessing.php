<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/phpboard/common/163-dbconn.php';

    $email = $_POST['userEmail'];
    $pw = $_POST['userPw'];

    function goSignInpage($alert){
        
        echo $alert . '<br/>';
        echo "<a href='./175-signInForm.php'>로그인 폼으로 이동</a>";
        return;
    }

    //유효성검사
    //이메일검사
    if(!filter_Var($email, FILTER_VALIDATE_EMAIL)){
        goSignInPage('올바른 이메일이 아닙니다.');
        exit;
    }
    
    //비밀번호 검사
    if($pw == null || $pw= ''){
        goSignInPage('비밀번호를 입력해주세요.');
        exit;
    }

    $pw = sha1('php200'.$pw);

    $sql = "SELECT email, nickName, memberID FROM member 
                WHERE email = '{$email}' AND pw = '{$pw}'";
    
    $result = $dbConn->query($sql);

    if($result) {
        if($result->num_rows == 0) {
            goSignInpage('로그인 정보가 일치하지 않습니다.');
            exit;
        } else {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['nickName'] = $memberInfo['nickname'];
            Header("Location:../Index.php");
        }
    }
?>
