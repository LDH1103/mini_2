<?php

namespace application\controller;

use application\model\UserModel;

// Controller class를 상속받음
class UserController extends Controller{

    // + GET 방식으로 로그인 페이지를 요청할 때 실행되는 메서드
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    // + POST 방식으로 로그인 정보를 전달할 때 실행되는 메서드
    public function loginPost() {
        $result = $this->model->getUser($_POST);
        $this->model->close(); // DB 파기
        // 유저 유무 체크
        // + 입력된 로그인 정보가 DB에 있는지 확인하고, 정보가 없으면 에러 메시지를 출력한 후 로그인 페이지를 다시 로드
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        // + 정보가 있다면, 로그인 성공 처리, 세션에 유저 ID를 저장하고, 리스트 페이지로 이동
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        // session에 name 저장
        $_SESSION[_STR_LOGIN_NAME] = $result[0][_STR_LOGIN_NAME];
        // 메인 페이지 리턴
        // var_dump($result);
        return _BASE_REDIRECT."/shop/main";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        // 메인 페이지 리턴
        return "main"._EXTENSION_PHP;
    }

    // 회원가입 페이지 리턴
    public function joinGet() {
        return "join"._EXTENSION_PHP;
    }

    // 회원가입 처리

    // public function test() {
    //     $this->model->beginTransaction();
    //     return $this->model->joinTest($_POST);
    // }

    // public function joinPost() {
    //     $test = $this->test();
    //     if(empty($test)) {
    //         $this->model->joinUser($_POST);
    //         $this->model->commit();
    //         return "main"._EXTENSION_PHP;
    //     } else {
    //         echo "<script>alert('중복된 ID 입니다.');</script>";
    //         return "join"._EXTENSION_PHP;
    //     }
    //     $this->model->close();
    // }

    public function joinPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성 체크
        // ID 글자수 체크
        if(mb_strlen($arrPost["id"]) > 12 || mb_strlen($arrPost["id"]) < 3) {
            $arrChkErr["id"] = "아이디는 3 ~ 12글자 사이로 입력해주세요.";
        }
        // ID 영문자 숫자 체크넣기

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) > 20 || mb_strlen($arrPost["pw"]) < 8) {
            $arrChkErr["pw"] = "비밀번호는 8 ~ 20글자 사이로 입력해주세요.";
        }

        // PW 영문자 숫자 특수문자 체크 넣기

        // PW와 PWChk 확인
        if($arrPost["pw"] !== $arrPost["check_pw"]) {
            $arrPost["check_pw"] = "비밀번호와 비밀번호 확인이 일치하지 않습니다.";
        }

        // 이름 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 ) {
            $arrChkErr["name_empty"] = "이름을 입력해주세요.";
        }

        if(mb_strlen($arrPost["name"]) > 30 ) {
            $arrChkErr["name"] = "이름은 30글자 이하로 입력해주세요.";
        }

        // 유효성 체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러메세지 세팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "join"._EXTENSION_PHP;
        }

        $result = $this->model->getUser($arrPost, false);

        // 유저 유무 체크
        if(count($result) !== 0) {
            $errMsg = "입력하신 아이디가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "join"._EXTENSION_PHP;
        }

        // Transaction Start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->joinUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist ERROR";
            exit();
        }

        // 정상처리 커밋, Transaction End
        $this->model->commit();

        // 로그인 페이지로 이동
        return _BASE_REDIRECT."/user/login";
    }
}

?>