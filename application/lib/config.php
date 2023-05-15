<?php

define("_ROOT", $_SERVER["DOCUMENT_ROOT"]);

// DB 관련 -----------------------------------------------

define("_DB_HOST", "localhost");
define("_DB_USER", "root");
define("_DB_PASSWORD", "root506");
define("_DB_NAME", "minitwo");
define("_DB_CHARSET", "utf8mb4");

// /DB 관련 -----------------------------------------------

// 기타 --------------------------------------------------

// EXTENSION : 확장자
define("_EXTENSION_PHP", ".php");
define("_EXTENSION_HTML", ".html");

// PATH : 경로
define("_PATH_CONTROLLER", "application/controller/");
define("_PATH_MODEL", "application/model/");
define("_PATH_VIEW", "application/view/");

// BASE : 기본(부모) 파일
define("_BASE_FILENAME_CONTROLLER", "Controller");
define("_BASE_FILENAME_MODEL", "Model");

define("_BASE_REDIRECT", "Location: ");

define("_STR_LOGIN_ID", "u_id");
define("_STR_LOGIN_NAME", "u_name");

// /기타 --------------------------------------------------

?>