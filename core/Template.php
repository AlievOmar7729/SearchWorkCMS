<?php

namespace core;

class Template
{

    protected $templateFiltPath;
    protected array $paramsArray;
    public Controller $controller;
    public function __set($name,$value)
    {
        Core::get()->template->setParam($name,$value);
    }
    public function __construct($templateFilePath)
    {
        $this->templateFiltPath = $templateFilePath;
        $this->paramsArray = [];
    }
    public function setTemplateFilePath($path): void
    {
        $this->templateFiltPath = $path;
    }

    public function setParam($paramName,$paramValue): void
    {
        $this->paramsArray[$paramName] = $paramValue;
    }
    public function setParams($params): void
    {
        foreach($params as $key => $value)
            $this->setParam($key,$value);
    }

    public function getHTML(): string
    {
        ob_start();

        if(\core\Core::get()->controllerObject)
            $this->controller = \core\Core::get()->controllerObject;
        extract($this->paramsArray);
        include($this->templateFiltPath);
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }
    public function display(): void
    {
        echo $this->getHTML();
    }

}