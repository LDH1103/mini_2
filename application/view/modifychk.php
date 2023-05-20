<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 확인</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/modifychk.css">
</head>
<body>
    <div class="main_container">
        <span class="span_msg">비밀번호를 입력해주세요.</span>
        <form action="/user/modifychk" method="post">
            <input type="password" id="password_chk" name="password_chk" autofocus>
            <button type="submit">확인</button>
        </form>
    </div>
</body>
</html>