<?php

namespace core;

class Core
{
    public $defaultLayoutPath = 'views/layouts/index.php';
    public $moduleName;
    public $actionName;
    public $router;
    public $template;
    private static $instance;
     private function __construct()
     {

        $this->template = new Template($this->defaultLayoutPath);

     }
     public function run($route): void
     {
         $this->router = new \core\Router($route);
         $params = $this->router->run();
         $this->template->setParams($params);
     }
     public function done(): void
     {
         $this->template->display();
        $this->router->done();
     }


     public static function get(): Core
     {
         if(empty(self::$instance)){
             self::$instance = new Core();
         }
         return self::$instance;
     }
}