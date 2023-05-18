function chkDuplicationId() {
    const id = document.getElementById('id');

    const url = "/api/user?id=" + id.value;

    // API
    fetch(url)
    .then(data => {
        if(data.status !== 200) {
        // Response Status 확인 (200번 외에는 에러 처리)
            throw new Error(data.status + ' : API Response Error');
        }
        return data.json();
    })
    .then(apiData => {
        const idSpan = document.getElementById('errMsgId');

        // 아이디 유효성 검사
        if(apiData['flg'] === "1") {
            idSpan.innerHTML = apiData['msg'];
            idSpan.style.color = 'red';
        } else if(apiData['flg'] === "2") {
            idSpan.innerHTML = apiData['msg'];
            idSpan.style.color = 'red';
        } else if(apiData['flg'] === "3") {
            idSpan.innerHTML = apiData['msg'];
            idSpan.style.color = 'red';
        } else {
            idSpan.innerHTML = '사용 가능한 아이디 입니다.';
            idSpan.style.color = 'green';
        }

        // 비밀번호 유효성 검사
        // const pwSpan = document.getElementById('errMsgPw');
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));
}