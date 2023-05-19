<?php

namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ShopController extends Controller {
    
    public function mainGet() {
        return "main"._EXTENSION_PHP;
    }
    
    public function item() {
        $arr_result = $this->model->getItem();
        $this->model->close(); // DB 파기
        return $arr_result;
    }

}

?>