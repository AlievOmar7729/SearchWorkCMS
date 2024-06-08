<?php

namespace core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    protected $template;
    public $isPost = false;
    public $isGet = false;
    public $post;
    public $get;

    public function __construct()
    {
        $action = Core::get()->actionName;
        $module = Core::get()->moduleName;
        $path = "views/{$module}/{$action}.php";
        $this->template = new Template($path);
        switch ($_SERVER['REQUEST_METHOD']){
            case 'POST' :
                $this->isPost = true;
                break;
            case 'GET':
                $this->isGet = true;


        }
        $this->post = new Post();
        $this->get = new Get();
    }
    public function render($pathToView = null): array
    {
        if(!empty($pathToView))
            $this->template->setTemplateFilePath($pathToView);
        return[
            'Content' => $this->template->getHTML()
        ];
    }
    public function redirect($path): void
    {
        header("Location: {$path}");
        die;
    }

    public function setErrorMessage($message = null)
    {
        $this->template->setParam('error_message',$message);
    }
    public function clearErrorMessage()
    {
        $this->setErrorMessage();
    }

}