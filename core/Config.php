<?php

namespace core;

class Config
{
    protected $params;
    protected static $instance;
    private function __construct()
    {
        /** @var array $Config */
        $directory = 'config';
        $config_files = scandir($directory);
        foreach ($config_files as $config_file){
            if(substr($config_file,-4) === '.php'){
                $path = $directory.'/'.$config_file;
                include($path);

            }
        }
        $this->params = [];
        foreach ($Config as $config)
            foreach ($config as $key => $value)
                $this->$key = $value;


    }
    public static function get()
    {
        if(empty(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __set($name,$value)
    {
        $this->params[$name] = $value;
    }
    public function __get($name)
    {
        return $this->params[$name];
    }
}
