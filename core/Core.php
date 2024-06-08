<?php

namespace core;

class Core
{
    public $defaultLayoutPath = 'views/layouts/index.php';
    public $moduleName;
    public $actionName;
    public $router;
    public $template;
    public $db;
    private static $instance;
    public $session;
     private function __construct()
     {

        $this->template = new Template($this->defaultLayoutPath);
         $host = Config::get()->dbHost;
         $name = Config::get()->dbName;
         $login = Config::get()->dbLogin;
         $password = Config::get()->dbPassword;
        $this->db = new DB($host,$name,$login,$password);
        $this->session = new Session();
        session_start();
     }
     public function run($route): void
     {
         $this->router = new \core\Router($route);
         $params = $this->router->run();
         if(!empty($params))
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
             self::$instance = new self();
         }
         return self::$instance;
     }
}