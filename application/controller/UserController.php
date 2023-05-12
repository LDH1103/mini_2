<?php

namespace application\controller;

// Controller class를 상속받음
class UserController extends Controller{
    
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {

    }

}

?>