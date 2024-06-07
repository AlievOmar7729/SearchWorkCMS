<?php

namespace core;

class Model
{
    protected $fieldsArray;
    public function __construct()
    {
        $this->fieldsArray = [];
    }
    public function __set($name,$value)
    {
        $this->fieldsArray[$name] = $value;
    }
    public function __get($name)
    {
        return $this->fieldsArray[$name];
    }


    public function save()
    {
        $value = $this->{$this->primaryKey};
        if (empty($value)) {
            Core::get()->db->insert($this->table, $this->fieldsArray);
        } else {
            Core::get()->db->update($this->table, $this->fieldsArray, [
                $this->primaryKey => $this->{$this->primaryKey}
            ]);
        }

    }


}