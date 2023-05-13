<?php

namespace application\controller;

// Controller class를 상속받음
class JsController extends Controller{
    public $urlPathJs;

    function getLastPath($urlPath) {
        $urlPathJs = basename($urlPath);
        return $urlpathJs;
    }

    public function jsGet() {
        // 현재 URL에서 가장 마지막의 경로명을 가져옴
        $lastPath = $this->getLastPath();
        // js 파일 경로 생성
        $jsPath = _BASE_URL."/js/{$lastPath}.js";
        // js 파일 로드
        header('Content-Type: application/javascript');
        readfile($jsPath);
    }

}

?>