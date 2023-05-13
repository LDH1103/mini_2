<?php

// + spl_autoload_register 함수는 클래스가 호출되어 생성될 때 PHP 엔진에서 실행되는 콜백 함수를 등록함
spl_autoload_register(function($path) {
    $path = str_replace("\\", "/", $path); // php는 "/"가 기본, "\"를 "/"로 변환

    // 해당 파일 require
    require_once($path._EXTENSION_PHP);
});

?>