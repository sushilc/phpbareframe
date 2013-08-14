<?php

namespace Framework;

class Action {
    protected $template = null;
    
    public function __construct() {
        $this->template = new \Framework\Template($this);
    }
    
    public function getTemplate() {
        return $this->template;
    }
    
    
    public function getAllGetParams() {
        return $_GET;
    }
    
    public function getAllPostParams() {
        return $_POST;
    }

    public function getAllRequestParams() {
        return $_REQUEST;
    }

    public function isPostRequest() {
        return count($_POST);
    }
    
    public function getPostVar($key) {
        return $_POST[$key];
    }
    
    public function getGetVar($key) {
        return $_GET[$key];
    }
}
