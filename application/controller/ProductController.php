<?php

namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ProductController extends Controller{

    
    public function listGet() {
        return "list"._EXTENSION_PHP;
    }

    // --------------------js get-----------------------------
    public $urlPathJs;

    public function getLastPath() {
        $urlPath = UrlUtil::getUrl();
        $this->urlPathJs = basename($urlPath);
        return $this->urlPathJs;
    }

    public function jsGet() {
        // 현재 URL에서 가장 마지막의 경로명을 가져옴
        $lastPath = $this->getLastPath();
        // js 파일 경로 생성
        $jsPath = _PATH_VIEW."js/$lastPath";
        // js 파일 로드
        header('Content-Type: application/javascript');
        readfile($jsPath);
    }
}

?>