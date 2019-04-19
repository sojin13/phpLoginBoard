<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원가입 폼</title>
</head>
<body>
    <h1>회원가입</h1>
    <form action="./174-SignUpSave.php" name="signUp" method="post">
        <table>
            <tr>
                <td>이메일</td>
                <td><input type="email" name="userEmail" id="userEmail" required/></td>
            </tr>
            <tr>
                <td>닉네임</td>
                <td><input type="text" name="userNickName" id="userNickName" required/></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="password" name="userPw" id="userPw" required/></td> 
            </tr>
            <tr>
                <td>생일</td>
                <td>
                    <select name="birthYear" id="birthYear" required>
<?php
    $thisYear = date('Y', time());
    for($i=$thisYear; $i >= 1930; $i--){
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
                    </select>년
                    <select name="birthMonth" id="birthMonth" required>
<?php
    for($i=1; $i <= 12; $i++){
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
                    </select>월   
                    <select name="birthDay" id="birthDay" required>
<?php
    for($i=1; $i <= 31; $i++){
        echo "<option value='{$i}'>{$i}</option>";
    }
?>
                    </select>일                    
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="가입하기" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
