<?php

spl_autoload_register( function($path) {
    $path = str_replace("\\", "/", $path); // php는 "/"가 기본, "\"를 "/"로 변환

    // 해당 파일 require
    require_once($path._EXTENSION_PHP);
});

?>