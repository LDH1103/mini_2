const joinBtn = document.getElementById('joinBtn');

joinBtn.addEventListener('click', () => chkPassword());

// ID 중복확인 버튼에 플래그 써서 해보기
function chkPassword() {
    let p1 = document.getElementById('pw').value;
    let p2 = document.getElementById('check_pw').value;
    if( p1 != p2 ) {
        alert("비밀번호가 일치 하지 않습니다");
    }// } else {
    //     joinBtn.submit();
    // }
}