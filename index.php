<?php

// config 파일
// require : 해당 파일을 불러오지 못하면 페이탈 에러, 프로그램이 즉시 멈춤
require_once("application/lib/config.php");
require_once("application/lib/autoload.php");

new application\lib\Application(); // Application 호출

?>