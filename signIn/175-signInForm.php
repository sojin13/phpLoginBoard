<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>로그인</title>
</head>
<body>
    <h1>로그인</h1>
    <form name="signIn" action="./176-signInProcessing.php" method="post">
        <table>
            <tr>
                <td>이메일</td>
                <td><input type="email" name="userEmail" id="userEmail" required></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type="password" name="userPw" id="userPw" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="로그인"></td>
            </tr>        
        </table>
    </form>
</body>
</html>