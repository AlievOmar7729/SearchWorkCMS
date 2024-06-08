<?php

namespace core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    protected Template $template;
    protected array $errorMessage;
    public bool $isPost = false;
    public bool $isGet = false;
    public Post $post;
    public Get $get;

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

    public function addErrorMessage($message = null): void
    {
        $this->errorMessage [] = $message;
        $this->template->setParam('error_message',implode('<br/>',$this->errorMessage));
    }
    public function clearErrorMessage(): void
    {
        $this->errorMessage = [];
        $this->template->setParam('error_message',null);
    }
    public function isErrorMessageExists(): bool
    {
        return count($this->errorMessage) > 0;
    }

}