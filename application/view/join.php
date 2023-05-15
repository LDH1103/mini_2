<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
</head>
<body>
    <div class="main_container">
        <form action="/user/join" method="post">
            <label for="id">아이디</label>
            <input type="text" id="id" name="id" require>
            <br>
            <label for="pw">비밀번호</label>
            <input type="passowrd" id="pw" name="pw" require>
            <br>
            <label for="check_pw">비밀번호 확인</label>
            <input type="text" id="check_pw" name="check_pw" require>
            <br>
            <label for="name">이름</label>
            <input type="text" id="name" name="name" require>
            <br>
            <label for="address">주소</label>
            <input type="text" id="address" name="address" require>
            <br>
            <label for="phone_num">전화번호</label>
            <input type="text" id="phone_num" name="phone_num" require>
            <br>
            <label for="email">이메일</label>
            <input type="text" id="email" name="email">
            <button type="submit" id="joinBtn">회원 가입</button>
        </form>
    </div>
    <script src="/application/view/js/join.js"></script>
</body>
</html>