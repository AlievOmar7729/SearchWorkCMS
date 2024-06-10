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
        if (isset($params[0])) {
            $news_id = $params[0];
            $newsOne = News::ViewNews($news_id);

            if ($newsOne) {
                $this->template->setParam('newsList', [$newsOne]);

                return $this->render();
            }
        }

        $news = News::ViewAllNews();
        if (empty($news)) {
            $news = [];
        }

        $this->template->setParam('newsList', $news);
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

    public function actionDelete($params): array
    {
        if(Users::RoleUser() != 'admin'){
            return $this->redirect('/');
        }

        if (!isset($params[0])) {
            return $this->redirect('/');
        }


        $news_id = $params[0];
        $newsOne = News::ViewNews($news_id);

        if (!isset($newsOne)) {
            return $this->redirect('/');
        }

        News::DeleteNews($news_id);
        return $this->redirect('/');
    }
    public function actionEdit($params): array
    {
        if(Users::RoleUser() != 'admin'){
            return $this->redirect('/');
        }

        if (!isset($params[0])) {
            return $this->redirect('/');
        }

        $news_id = $params[0];
        $newsOne = News::ViewNews($news_id);

        if (!isset($newsOne)) {
            return $this->redirect('/');
        }



        $this->template->setParam('newsEdit', $newsOne);
        if ($this->isPost) {
            $title = $this->post->title;
            $news = $this->post->news;
            $photourl = $this->post->photourl;

            $admin_id = Admin::FindIdAdminByUser(Core::get()->session->get('user')['user_id'])['admin_id'];
            if (empty($title))
                $this->addErrorMessage('Заголовок не вказано');
            if (empty($news))
                $this->addErrorMessage('Текст новини не вказано');
            if (empty($photourl))
                $this->addErrorMessage('Посилання на фотографію для обкладинки не вказано');



            if (!$this->isErrorMessageExists()) {
                News::EditNews($news_id,$title,$news,$photourl,$admin_id);
                return $this->redirect("/news/index/{$news_id}");
            }
        }

        return $this->render();


    }
}