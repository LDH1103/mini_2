const chkPwMsg = document.getElementById('chk_pw_msg');

function chkPassword() {
    const p1 = document.getElementById('pw').value;
    const p2 = document.getElementById('check_pw').value;
    if( p2.length === 0 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호 확인을 입력해주세요.';
    } else if( p1 !== p2 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'green';
        chkPwMsg.innerHTML = '비밀번호가 일치합니다.';
    }
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
    const NameFormat = /^[ㄱ-ㅎ||ㅏ-ㅣ||가-힣||a-z||A-Z]{2,12}$/;

    if(!input) {
        errMsgName.innerHTML = '';
    }else if(!NameFormat.test(input)) {
        errMsgName.innerHTML = '이름이 형식에 맞지 않습니다.';
    } else {
        errMsgName.innerHTML = '';
    }
}