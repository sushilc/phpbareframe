<?php

namespace Framework;

class Template {
    protected $fileName = null;
    protected $action = null;
    
    public function __construct($action) {
        $this->fileName = get_class($action);
        $this->action = $action;
    }
    
    public function setVar($key, $value) {
        $this->$key = $value;
    }
    
    public function render() {
        require BASE_PATH . '/pages/templates/' . strtolower($this->fileName) . '.tpl';
    }
    
}
