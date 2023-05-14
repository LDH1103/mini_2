<?php

namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ProductController extends Controller {

    public function listGet() {
        return "list"._EXTENSION_PHP;
    }

}

?>