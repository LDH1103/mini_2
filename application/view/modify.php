<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/modify.css">
    <title>마이페이지</title>
</head>
<body>
    <h1 class="modifyTitle"><a href="/shop/main">My page</a></h1>
    <div class="main_container">
        <label for="id">아이디</label>
        <input type="text" name="id" id="id" value="php506" disabled>
        <br>
        <br>
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw" oninput="chkPassword()">
        <br>
        <span class="errMsg" id="errMsgPw"><?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?></span>
        <br>
        <label for="check_pw">비밀번호 확인</label>
        <input type="password" name="check_pw" id="check_pw" oninput="chkPassword()">
        <br>
        <br>
        <label for="name">이름</label>
        <input type="text" name="name" id="name" value="">
        <br>
        <br>
        <label for="phoneNum">전화번호</label>
        <input type="text" name="phoneNum" id="phoneNum" value="">
    </div>
    <script src="/application/view/js/modify.js"></script>
</body>
</html>