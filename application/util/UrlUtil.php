<?php

namespace application\util;

class UrlUtil {
    
    // $_GET["url"]을 분석해서 리턴
    public static function getUrl() {
        return $path = isset($_GET["url"]) ? $_GET["url"] : "";
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath() {
        // static으로 선언 되어 있기 때문에, 인스턴트화 하지 않고, ::로 사용 가능
        // $obj = new UrlUtill();
        // $obj->getUrl();

        $url = UrlUtil::getUrl();
        return $url !== "" ? explode("/", $url) : ""; // "/" 단위로 자름
    }

    // "/"를 "\"로 치환해주는 메소드
    public static function replaceSlashToBackslash($str) {
        return str_replace("/", "\\", $str);
    }

}

?>