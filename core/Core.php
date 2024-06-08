<?php

namespace core;

class Core
{
    public string $defaultLayoutPath = 'views/layouts/index.php';
    public $moduleName;
    public $actionName;
    public $router;
    public Template $template;
    public DB $db;
    public ?Controller $controllerObject = null;
    private static $instance;
    public Session $session;
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
     }
     public static function get(): Core
     {
         if(empty(self::$instance)){
             self::$instance = new self();
         }
         return self::$instance;
     }
}