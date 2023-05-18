<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/join.css">
    <title>회원 가입</title>
</head>
<body>
    <h1 class="titleJoin"><a href="/shop/main" class="header">Join Membership</a></h1>
    <div class="main_container">
        <form action="/user/join" method="post" class="joinBox">
            <label for="id">아이디</label>
            <input type="text" id="id" name="id" placeholder="3 ~ 12글자 사이" spellcheck="false" value="<?php if(isset($this->arrInputVal["id"])) { echo $this->arrInputVal["id"]; } ?>">
            <button type="button" onclick="chkDuplicationId();">중복 체크</button>
            <br>
            <span class="errMsg"><?php if(isset($this->errMsg)) { echo $this->errMsg; } ?></span>
            <span class="errMsg" id="errMsgId"><?php if(isset($this->arrError["id"])) { echo $this->arrError["id"]; } ?></span>
            <br>
            <label for="pw">비밀번호</label>
            <input type="password" id="pw" name="pw" placeholder="8 ~ 20글자 사이" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="errMsgPw"><?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?></span>
            <br>
            <label for="check_pw">비밀번호 확인</label>
            <input type="password" id="check_pw" name="check_pw" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="chk_pw_msg"><?php if(isset($this->arrError["check_pw"])) { echo $this->arrError["check_pw"]; } ?></span>
            <br>
            <label for="name">이름</label>
            <input type="text" id="name" name="name" spellcheck="false" maxlength="6" value="<?php if(isset($this->arrInputVal["name"])) { echo $this->arrInputVal["name"]; } ?>" oninput="this.value = this.value.replace(/[^ㄱ-ㅎ||ㅏ-ㅣ||가-힣||a-z||A-Z.]/g, '').replace(/(\..*)\./g, '$1'); checkName();">
            <br>
            <span class="errMsg" id="errMsgName"><?php if(isset($this->arrError["name_empty"])) { echo $this->arrError["name_empty"]; } ?></span>
            <span class="errMsg"><?php if(isset($this->arrError["name"])) { echo $this->arrError["name"]; } ?></span>
            <br>
            <label for="phone_num">전화번호</label>
            <input type="tel" id="phone_num" name="phone_num" placeholder="숫자만 입력" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); checkPhoneNumber();" spellcheck="false" value="<?php if(isset($this->arrInputVal["phonenum"])) { echo $this->arrInputVal["phonenum"]; } ?>">
            <br>
            <span class="errMsg" id="phone_num_error"><?php if(isset($this->arrError["phone_num"])) { echo $this->arrError["phone_num"]; } ?></span>
            <br>
            <button type="submit" id="joinBtn">회원 가입</button>
        </form>
    </div>
    <script src="/application/view/js/join.js"></script>
    <script src="/application/view/js/common.js"></script>
</body>
</html>