<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <!-- 경로앞에 /를 붙여주면 ROOT(htdocs)에서 시작한다는 뜻 -->
    <form action="/user/login" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        <label for="pw">PW</label>
        <input type="text" name="pw" id="pw">
    </form>
</body>
</html>