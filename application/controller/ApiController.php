<?php

namespace application\controller;

// Controller class를 상속받음
class ApiController extends Controller {

    public function userGet() {
        $arrGet = $_GET;
        $arrData = ["flg" => "0"];

        // model 호출
        $this->model = $this->getmodel("User");

        // + 사용자 정보 가져오기
        $result = $this->model->getUser($arrGet, false);

        if(count($result) !== 0) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "입력하신 아이디가 이미 사용중입니다.";
        } else if(mb_strlen($arrGet["id"]) < 3 || mb_strlen($arrGet["id"]) > 12) {
            $arrData["flg"] = "2";
            $arrData["msg"] = "아이디는 영어와 숫자를 합해 3 ~ 12글자 사이로 입력해주세요.";
        } else if(preg_match("/[^a-z0-9^]/i", $arrGet["id"])) {
            $arrData["flg"] = "3";
            $arrData["msg"] = "아이디는 숫자와 영문자만 사용가능합니다.";
        }

        
        // 배열을 JSON으로 변경
        $json = json_encode($arrData);
        // http_response_code(400); // API 에러처리 테스트(에러 강제로 일으키기)
        // + JSON 형식으로 응답 설정
        header('Content-type: application/json');
        // + JSON 데이터 출력
        echo $json;
        exit();
    }

}

?>