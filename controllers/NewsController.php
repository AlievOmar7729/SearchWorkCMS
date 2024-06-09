<?php

namespace controllers;
require 'style/Parsedown.php';


use core\Controller;
use core\Core;
use core\Router;
use core\Template;
use models\Admin;
use models\News;
use models\Users;

class NewsController extends Controller
{
    public function actionIndex($params): array
    {

        //Зробити при натисканні на одну новину (Виводии її повністю /index/id)
        if(empty(News::ViewAllNews())){
            $news = [];
            $this->template->setParam('newsList',$news);
            return $this->render();
        }
        $news = News::ViewAllNews();

        $this->template->setParam('newsList',$news);
        return $this->render();
    }


    public function actionAdd(): array
    {
        if(Users::RoleUser() != 'admin'){
            return $this->redirect('/');
        }

        if ($this->isPost) {
            $parsedown = new \Parsedown();
            $title = $this->post->title;
            $news = $parsedown->text($this->post->news);
            $url = $this->post->photourl;
            $photourl = $parsedown->text('![]'.'('.$url.')');

            $admin_id = Admin::FindIdAdminByUser(Core::get()->session->get('user')['user_id'])['admin_id'];
            if (empty($title))
                $this->addErrorMessage('Заголовок не вказано');
            if (empty($news))
                $this->addErrorMessage('Текст новини не вказано');
            if (empty($url))
                $this->addErrorMessage('Посилання на фотографію для обкладинки не вказано');

            if (!$this->isErrorMessageExists()) {
                News::AddNews($title,$news,$photourl,$admin_id);
            }
        }

        return $this->render();




    }




}