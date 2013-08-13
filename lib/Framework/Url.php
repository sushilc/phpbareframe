<?php
namespace Framework;

class Url {
    public static function getActionName() {
        $actionName = $_SERVER['REQUEST_URI'];
        $urlArr = explode('/', $actionName);
        
        // Ignore leadding slash
        $actionName = $urlArr[1];
        return $actionName;
    }
}
