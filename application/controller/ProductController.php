<?php

namespace application\controller;

use application\util\UrlUtil;

// Controller class를 상속받음
class ProductController extends Controller {

    
    public function listGet() {
        return "list"._EXTENSION_PHP;
    }

    // --------------------js get-----------------------------
    public function getLastPath() {
        $urlPath = UrlUtil::getUrl();
        return basename($urlPath);
    }

    public function jsGet() {
        // 현재 URL에서 가장 마지막의 경로명을 가져옴
        $lastPath = $this->getLastPath();
        // js 파일 경로 지정
        $jsPath = _PATH_VIEW."js/$lastPath";
        // js 파일 로드
        header('Content-Type: application/javascript');
        readfile($jsPath);
    }
}

?>