<?php

namespace application\controller;

// Controller class를 상속받음
class ApiController extends Controller {

    public function userGet() {
        $arrGet = $_GET;
        $arrData = ["flg" => "0"];

        // model 호출
        $this->model = $this->getmodel("User");

        $result = $this->model->getUser($arrGet, false);

        if(count($result) !== 0) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "입력하신 아이디가 사용중입니다.";
        }

        // 배열을 JSON으로 변경
        $json = json_encode($arrData);
        // http_response_code(400); // API 에러처리 테스트(에러 강제로 일으키기)
        header('Content-type: application/json');
        echo $json;
        exit();
    }

}

?>