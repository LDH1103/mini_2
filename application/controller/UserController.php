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

    public function test() {
        return $this->model->joinTest($_POST);
    }

    public function joinPost() {
        $test = $this->test();
        if(empty($test)) {
            $this->model->joinUser($_POST);
            return "main"._EXTENSION_PHP;
        } else {
            echo "<script>alert('중복된 ID 입니다.');</script>";
            return "join"._EXTENSION_PHP;
        }
    }
}

?>