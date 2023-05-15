<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/login.css">
</head>
<body>
    <h1 class="titleLogin">Login</h1>
    <div class="loginBox">
        <form action="/user/login" method="post" class="idPwBox">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" placeholder="아이디" maxlength="12">
            <br>
            <label for="pw">PW</label>
            <input type="password" name="pw" id="pw" placeholder="비밀번호" maxlength="512">
            <button type="submit">Login</button>
        </form>
        <!-- 에러 메세지 -->
        <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
        <button type="button" id="findId">ID 찾기</button>
        <button type="button" id="findPw">PW 찾기</button>
        <button type="button" id="joinMember">회원 가입</button>
    </div>
</body>
</html>