<?php

namespace core;

class DB
{
    public $pdo;
    public function __construct($host,$name,$login,$password)
    {

        $this->pdo = new \PDO("mysql:host={$host};dbname={$name}", $login,$password,
        [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }


    protected function where($where): string
    {
        if(is_array($where)){
            $where_string = "WHERE ";
            $where_fields = array_keys($where);
            foreach ($where_fields as $field) {
                $parts [] = "{$field} = :{$field}";

            }
            $where_string .= implode(' AND ', $parts);
        }
        else{
            if(is_string($where)){
                $where_string = $where;
            }
            else{
                $where_string = '';
            }
        }
        return $where_string;
    }
    public function select($table,$fields = "*",$where = null): false|array
    {
        if(is_array($fields))
            $fields_string = implode(', ',$fields);
        else
            if(is_string($fields))
            $fields_string = $fields;
        else{
            $fields_string = "*";
        }
        $where_string = $this->where($where);
        $sql = "SELECT {$fields_string} FROM {$table} {$where_string}";
        $sth = $this->pdo->prepare($sql);
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                $sth->bindValue(":{$key}", $value);
            }
        }
        $sth->execute();
        return $sth->fetchAll();

    }



    public function selectOrderBy($table, $orderByField,$reverse = false): false|array
    {

        if($reverse === false)
            $orderByDirection = 'DESC';
        else
            $orderByDirection = "ASC";
        $sql = "SELECT * FROM {$table} ORDER BY {$orderByField} {$orderByDirection}";
        $sth = $this->pdo->prepare($sql);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function insert($table,$row_to_insert): int
    {
        $fields_list = implode(", ", array_keys($row_to_insert));
        $params_array = [];
        foreach ($row_to_insert as $key => $value) {
            $params_array [] = ":{$key}";
        }
        $params_list = implode(", ",$params_array);
        $sql = "INSERT INTO {$table} ({$fields_list}) VALUES ({$params_list})";
        $sth = $this->pdo->prepare($sql);
        foreach ($row_to_insert as $key => $value)
            $sth->bindValue(":{$key}",$value);
        $sth->execute();
        return $sth->rowCount();
    }
    public function delete($table,$where): int
    {
        $where_string = $this->where($where);

        $sql = "DELETE FROM {$table} {$where_string}";
        $sth = $this->pdo->prepare($sql);
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                $sth->bindValue(":{$key}", $value);
            }
        }
        $sth->execute();
        return $sth->rowCount();
    }
    public function update($table,$row_to_update,$where): int
    {
        $where_string = $this->where($where);
        $set_array = [];
        foreach ($row_to_update as $key => $value){
            $set_array [] = "{$key} = :{$key}";
        }
        $set_string = implode(', ',$set_array);
        $sql = "UPDATE {$table} SET {$set_string} {$where_string}";

        $sth = $this->pdo->prepare($sql);
        foreach ($where as $key => $value){
            $sth->bindValue(":{$key}",$value);
        }
        foreach ($row_to_update as $key => $value) {
            $sth->bindValue(":{$key}",$value);
        }
        $sth->execute();
        return $sth->rowCount();
    }
}