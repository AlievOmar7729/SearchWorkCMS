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
    public static string $tableName = "users";
    public static string $primaryKey = 'user_id';

    public static function FindByLoginAndPassword($login,$password)
    {
        $user = self::FindByLogin($login);
        $hashPassword = $user['password'];
        if(password_verify($password,$hashPassword)){
            $rows = self::findByCondition(['login' => $login, 'password' => $hashPassword]);
        }
        if(!empty($rows))
            return $rows[0];
        else
            return null;
    }
    public static function FindByLogin($login)
    {
        $rows = self::findByCondition(['login' => $login]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;
    }


    public static function IsUserLogged(): bool
    {
        return !empty(Core::get()->session->get('user'));
    }
    public static function LoginUser($user): void
    {
        Core::get()->session->set('user',$user);
    }
    public static function LogoutUser(): void
    {
        Core::get()->session->remove('user');
    }
    public static function RegisterUser($login,$password,$role = null): void
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        if(!$role)
            $role = 'applicant';

        $user->role = $role;
        $user->save();
        $user_id = self::FindByLogin($login)['user_id'];
        switch ($role){
            case 'applicant':
                Applicant::Register($user_id);
                break;
            case 'employer':
                Employer::Register($user_id);
                break;
            case 'admin':
                Admin::Register($user_id);
                break;
        }

    }

}