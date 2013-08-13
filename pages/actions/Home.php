<?php
class Home extends \Framework\Action {
    public function execute() {
        $name = "User";
        $this->template->setVar('username', $name);
    }
}

