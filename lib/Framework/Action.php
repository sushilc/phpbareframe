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
    
}
