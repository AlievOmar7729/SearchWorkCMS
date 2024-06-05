<?php

namespace controllers;

class SiteController
{
    public function actionIndex()
    {
        return[
            'Content' => 'НОВИНА1 НОВИНА2',
            'Title' => 'actionIndex'
        ];
    }
}