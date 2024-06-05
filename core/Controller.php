<?php

namespace core;

class Controller
{
    protected $template;
    public function __construct()
    {
        $action = Core::get()->actionName;
        $module = Core::get()->moduleName;
        $path = "views/{$module}/{$action}.php";
        $this->template = new Template($path);
    }
    public function render(): array
    {
        return[
            'Content' => $this->template->getHTML()
        ];
    }

}