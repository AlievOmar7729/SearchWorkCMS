<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $user_id ID користувача
 * @property string $login логін користувача
 * @property string $password пароль користувача
 * @property string $role Тип користувача (enum - 'applicant', 'employer', 'admin')
 */

class Users extends Model
{
    public static $tableName = "users";
    public static $primaryKey = 'user_id';

    public static function FindByLoginAndPassword($login,$password)
    {
        $rows = self::findByCondition(['login' => $login, 'password' => $password]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function IsUserLogged()
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function LoginUser($user)
    {
        Core::get()->session->set('user',$user);
    }
    public static function LoggoutUser()
    {
        Core::get()->session->remove('user');
    }
}