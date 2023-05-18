function chkDuplicationId() {
    const id = document.getElementById('id');

    // + API 요청을 보낼 URL을 생성, ID값으로 URL을 생성함
    const url = "/api/user?id=" + id.value;

    // API
    // + 생성한 URL로 API요청을 보냄
    fetch(url)
    // + API 요청이 성공적으로 완료되면, 응답 데이터를 처리하기 위한 콜백 함수를 실행
    .then(data => {
        if(data.status !== 200) {
        // Response Status 확인 (200번 외에는 에러 처리)
            throw new Error(data.status + ' : API Response Error');
        }
        return data.json();
    })
    // + apiData 객체의 'flg' 속성 값을 확인하여 아이디의 유효성을 검사하고, 해당하는 메시지를 idSpan 요소에 출력함
    // + (API 응답 데이터를 처리하는 역할)
    // + apiData는 JSON 형식으로 변환된 응답 데이터를 가리키는 변수
    // + .then(apiData => { ... }) 콜백 함수 내부에서는 API 응답 데이터를 기반으로 필요한 동작을 수행할 수 있음
    // + ex) apiData['flg'] 값이 "1"인 경우에는 이미 사용 중인 아이디, idSpan 요소에 해당하는 메시지를 출력하고 색상을 빨간색으로 변경
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