<?php

namespace core;

class Post extends RequestMethod
{
    public function __construct()
    {
        parent::__construct($_POST);
    }
}