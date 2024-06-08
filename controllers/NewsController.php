<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\News;

class NewsController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }


    public function actionAdd($params): array
    {
        return $this->render('views/news/delete.php');
    }

}