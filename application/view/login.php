<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/login.css">
</head>
<body>
    <h1 class="titleLogin">Login</h1>
    <div class="loginBox">
        <form action="/user/login" method="post" class="idPwBox">
            <input type="text" name="id" id="id" placeholder="아이디" maxlength="12" class="inputOutline inputId" spellcheck="false">
            <br>
            <input type="password" name="pw" id="pw" placeholder="비밀번호" maxlength="512" class="inputOutline inputPw">
            <button type="submit" class="btn btn-outline-dark">Login</button>
        </form>
        <!-- 에러 메세지 -->
        <h3 class="errMsg"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
        <div class="loginPageBtns">
            <button type="button" id="findId" class="btn btn-outline-dark">ID 찾기</button>
            <button type="button" id="findPw" class="btn btn-outline-dark">PW 찾기</button>
            <button type="button" id="join" class="btn btn-outline-dark">회원 가입</button>
        </div>
    </div>
    <script src="/application/view/js/login.js"></script>
</body>
</html>