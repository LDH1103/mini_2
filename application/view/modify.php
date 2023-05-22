<?php
$arr_result = $this->sessionIdSel();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/modify.css">
    <title>마이페이지</title>
</head>
<body>
    <h1 class="modifyTitle"><a href="/shop/main">My page</a></h1>
    <div class="main_container">
        <!-- 탈퇴 처리를 위한 form -->
        <form action="/user/out/" method="post" id="modal_form">
            <input type="hidden" name="u_no" value="<?php echo $arr_result["u_no"] ?>">
        </form>
        <!-- 수정을 위한 form -->
        <form action="/user/modify" method="post">
            <input type="hidden" name="u_no" id="u_no" value="<?php echo $arr_result["u_no"] ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $arr_result["u_id"] ?>">
            <label for="id_input">아이디</label>
            <input type="text" name="id_input" id="id_input" value="<?php echo $arr_result["u_id"] ?>" disabled>
            <br>
            <br>
            <label for="pw">비밀번호</label>
            <input type="password" name="pw" id="pw" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="pw_msg"><?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?></span>
            <br>
            <label for="check_pw">비밀번호 확인</label>
            <input type="password" name="check_pw" id="check_pw" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="chk_pw_msg"><?php if(isset($this->arrError["check_pw"])) { echo $this->arrError["check_pw"]; } ?></span>
            <br>
            <label for="name">이름</label>
            <input type="text" name="name" id="name" value="<?php if(isset($this->arrInputVal["name"])) { echo $this->arrInputVal["name"]; } else { echo $arr_result["u_name"]; } ?>" spellcheck="false" oninput="this.value = this.value.replace(/[^ㄱ-ㅎ||ㅏ-ㅣ||가-힣||a-z||A-Z.]/g, '').replace(/(\..*)\./g, '$1'); checkName();">
            <br>
            <span class="errMsg" id="errMsgName"><?php if(isset($this->arrError["name"])) { echo $this->arrError["name"]; } ?></span>
            <br>
            <label for="phone_num">전화번호</label>
            <input type="tel" name="phone_num" id="phone_num" value="<?php if(isset($this->arrInputVal["phonenum"])) { echo $this->arrInputVal["phonenum"]; } else { echo $arr_result["u_phone_num"]; } ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); checkPhoneNumber();">
            <br>
            <span class="errMsg" id="phone_num_error"><?php if(isset($this->arrError["phone_num"])) { echo $this->arrError["phone_num"]; } ?></span>
            <br>
            <div class="btns">
                <button type="button" id="out_button" class="btn btn-dark">회원 탙퇴</button>
                <button type="button" id="submit_btn" class="btn btn-dark">수정</button>
                <button type="button" id="cancle_btn" class="btn btn-dark">취소</button>
            </div>
            <br>
        </form>
    </div>
    <script src="/application/view/js/common.js"></script>
    <script src="/application/view/js/modify.js"></script>
</body>
</html>