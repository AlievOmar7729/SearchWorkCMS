<?php

namespace core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    protected $template;
    protected $errorMessage;
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
        $this->errorMessage = [];
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

    public function addErrorMessage($message = null)
    {
        $this->errorMessage [] = $message;
        $this->template->setParam('error_message',implode('<br/>',$this->errorMessage));
    }
    public function clearErrorMessage()
    {
        $this->errorMessage = [];
        $this->template->setParam('error_message',null);
    }
    public function isErrorMessageExists()
    {
        return count($this->errorMessage) > 0;
    }

}