const chkPwMsg = document.getElementById('chk_pw_msg');

function chkPassword() {
    let p1 = document.getElementById('pw').value;
    let p2 = document.getElementById('check_pw').value;
    if( p1 != p2 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'black';
        chkPwMsg.innerHTML = '비밀번호가 일치합니다.';
    }
}

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
        if(apiData['flg'] === "1") {
            idSpan.innerHTML = apiData['msg'];
        } else {
            idSpan.innerHTML = '사용 가능한 아이디 입니다.';
        }
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));
}