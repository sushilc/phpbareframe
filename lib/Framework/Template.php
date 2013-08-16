<?php

namespace Framework;

class Template {
    protected $mainFileName = null;
    protected $headerFileName = "header";
    protected $footerFileName = "footer";
    protected $action = null;
    
    public function __construct($action) {
        $this->mainFileName = get_class($action);
        $this->action = $action;
    }
    
    public function setVar($key, $value) {
        $this->$key = $value;
    }
    
    public function renderHeader() {
        require BASE_PATH . '/pages/templates/' . strtolower($this->headerFileName) . '.tpl';
    }
    
    public function renderFooter() {
        require BASE_PATH . '/pages/templates/' . strtolower($this->footerFileName) . '.tpl';
    }
    
    public function renderMain() {
        require BASE_PATH . '/pages/templates/' . strtolower($this->mainFileName) . '.tpl';
    }
    
}
