<?php

// 객체지향으로 만들어진 사이트는 보통 대규모 사이트이기 때문에, php파일만 해도 수백 ~ 수천개가 될수있음
// 파일 이름이 중복 될 수밖에 없기 때문에, 네임스페이스를 설정해줌
namespace application\lib;

// 네임스페이스 사용법
// new application\lib\Application();

// autoload에 UrlUtil 경로 잡아주기
use application\util\UrlUtil;

// 클래스명은 파일명과 똑같이
class Application {

    // 생성자
    public function __construct() {
        $arrPath = UrlUtil::getUrlArrPath(); // 접속 url을 배열로 획득
        $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]); // $arrPath[0]이 있다면 첫글자를 대문자로 변환해서 반환
        $action = (empty($arrPath[1]) ? "login" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"])); // GET이 전부 대문자기때문에 모두 소문자로 바꿔준 뒤, 첫글자만 대문자로

        // Controller명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSION_PHP;

        // 에러 처리(해당 Controller 파일 존재 여부 체크)
        if(!file_exists($controllerPath)) {
            echo "해당 컨트롤러 파일이 없습니다. : $controllerPath";
            exit();
        }

        // 해당 Controller 호출
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);
        new $controllerName($identityName, $action);
    }

}


?>