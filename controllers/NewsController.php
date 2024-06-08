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
        return $this->render('views/news/delete.php');

    }
}