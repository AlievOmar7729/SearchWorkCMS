<?php

namespace core;

class Router
{
    protected $route;
    public function __construct($route)
    {
        $this->route = $route;
    }
    public function run(): void
    {
        $parts = explode('/',$this->route);
        if(strlen($parts[0]) == 0){
            $parts[0] = "site";
            $parts[1] = "index";
        }
        if(count($parts)==1){
            $parts[1] = "index";
        }

        $controller = 'controllers\\'.ucfirst($parts[0])."Controller" ;
        $method = "action".ucfirst($parts[1]);

        if(class_exists($controller) && method_exists($controller,$method)){
            $controllerObject = new $controller();
            array_splice($parts,0,2);
            $controllerObject->$method($parts);
        }
        else{
            $this->error(404);
        }
    }

    public function error($code): void
    {
        http_response_code($code);
        switch ($code){
            case 404:
                echo "404 Not Found";
                break;
        }
    }
}