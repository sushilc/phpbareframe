<?php

namespace Framework;

class App {

    private static $app = null;
    private $defaults = array();
    private $env = array();

    private function __construct() {
        
    }

    public function init() {
        $this->configure();

        $action = $this->getAction();
        $action->execute();
        
        $template = $action->getTemplate();
        $template->render();
    }
    
    public function configure() {
        // Set up defaults
        include_once BASE_PATH . '/config/defaults.php';
        $this->defaults = $defaults;
                
        // Set up environment
        include_once BASE_PATH . '/config/env.php';
        $this->env = $env;
        if (isset($env['build']) && $env['build']) {
            error_reporting(E_ALL);
            ini_set('display_errors', true);
        }
    }

    public static function getInstance() {
        if (is_null(self::$app)) {
            self::$app = new App();
        }

        return self::$app;
    }

    public function getAction() {
        $actionName = $this->getActionName();
        if(empty($actionName)) {
            $actionName = $this->defaults['action'];
        }
        
        require_once BASE_PATH . '/pages/actions/' . ucwords($actionName) . '.php';
        
        $action = new $actionName();
        
        return $action;
    }

    public function registerAutoloader() {
        spl_autoload_register(array('\Framework\App', 'autoloader'));
    }

    public function autoloader($className) {
        $className = explode('\\', $className);
        $class = array_pop($className);
        $namespace = implode(DIRECTORY_SEPARATOR, $className);
        $file = BASE_PATH . "/lib/" .  $namespace . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

        require_once $file;
    }

    private function getActionName() {
        $actionName = $_SERVER['REQUEST_URI'];
        $urlArr = explode('/', $actionName);
        
        // Ignore leadding slash
        $actionName = $urlArr[1];
        
        return $actionName;
    }
    
    public function getDefaultSettings() {
        return $this->defaults;
    }
    
    public function getEnvSettings() {
        return $this->env;
    }
}