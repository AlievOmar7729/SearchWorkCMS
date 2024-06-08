<?php

namespace core;

class RequestMethod
{
    public $array;
    public function __construct($array)
    {
        $this->array = $array;
    }
    public function __get($name)
    {
        return $this->array[$name];
    }
    public function getAll()
    {
        return $this->array;
    }
}