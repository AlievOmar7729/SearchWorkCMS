<?php

namespace core;

class Session
{
    public function set($name,$value): void
    {
        $_SESSION[$name] = $value;
    }
    public function setValues($assocArray): void
    {
        foreach ($assocArray as $key => $value) {
            $this->set($key,$value);
        }
    }
    public function get($name): mixed
    {
        if(empty($_SESSION[$name]))
            return null;
        return $_SESSION[$name];
    }
    public function remove($name): void
    {
        unset($_SESSION[$name]);
    }
}