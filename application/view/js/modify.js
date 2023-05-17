function chkPassword() {
    const p1 = document.getElementById('pw').value;
    const p2 = document.getElementById('check_pw').value;
    const chkPwMsg = document.getElementById('chk_pw_msg');

    if( p1 !== p2 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'green';
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

function checkPhoneNumber() {
    const input = document.getElementById('phone_num').value;
    const phone_num_error = document.getElementById('phone_num_error');
    const phoneFormat = /^01([0|1|6|7|8|9])([0-9]{3,4})([0-9]{4})$/;

    if(!phoneFormat.test(input)) {
        phone_num_error.innerHTML = '전화번호가 형식에 맞지 않습니다.';
    } else {
        phone_num_error.innerHTML = '';
    }
}

function checkName() {
    const input = document.getElementById('name').value;
    const errMsgName = document.getElementById('errMsgName');
    const NameFormat = /^[가-힣]{2,6}$/;

    if(!input) {
        errMsgName.innerHTML = '';
    }else if(!NameFormat.test(input)) {
        errMsgName.innerHTML = '이름이 형식에 맞지 않습니다.';
    } else {
        errMsgName.innerHTML = '';
    }
}