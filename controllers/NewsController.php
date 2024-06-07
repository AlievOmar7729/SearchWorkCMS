<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\News;

class NewsController extends Controller
{
    public function actionAdd($params)
    {

        $news = new News();
        $news->title = "title";
        $news->news = "text";
        $news->date_create = date("Y-m-d");
        $news->news_id = 1;
        $news->save();
        return $this->render();
    }
}