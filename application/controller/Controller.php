<?php

namespace application\controller;

use application\util\UrlUtil;

class Controller {
    protected $model;
    private static $modelList = []; // 여러개의 모델을 불러올 경우, 이미 불러온 모델을 또다시 불러올 경우 많은 메모리를 사용하게됨, 서버의 부하를 줄이기 위해 사용

    // 생성자
    public function __construct($identityName, $action) {
        // session start
        if(!isset($_SESSION)) {
            session_start();
        }

        // model 호출
        $this->model = $this->getModel($identityName);

        // controller의 메소드 호출
        $view = $this->$action();

        if(empty($view)) {
            echo "해당 Controller에 메소드가 없습니다. : ".$action;
            exit();
        }

        // view 호출
        require_once $this->getView($view);
    }

    // model 호출하고 결과를 리턴
    protected function getModel($identityName) {
        // model 생성 체크
        if(!in_array($identityName, self::$modelList)) {
            $modelName = UrlUtil::replaceSlashToBackslash(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL);
            self::$modelList[$identityName] = new $modelName(); // model class 호출
        }
        return self::$modelList[$identityName];
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나 redirect
    public function getView($view) {
        return _PATH_VIEW.$view;
    }
}

?>