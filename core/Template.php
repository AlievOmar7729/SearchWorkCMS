<?php

namespace core;

class Template
{

    protected $templateFiltPath;
    protected $paramsArray;
    public function __construct($templateFilePath)
    {
        $this->templateFiltPath = $templateFilePath;
        $this->paramsArray = [];
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