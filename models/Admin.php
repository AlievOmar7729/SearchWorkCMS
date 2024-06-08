<?php

namespace models;

use Cassandra\Date;
use core\Model;

/**
 * @property int $admin_id ID адміна
 * @property string $username username адміна
 * @property string $email пошта адміна
 * @property int $user_id ID user
 */


class Admin extends Model
{
    public static string $tableName = "admin";
    public static string $primaryKey = 'admin_id';

    public static function Register($user_id): void
    {
        $admin = new Admin();
        $admin->user_id = $user_id;
        $admin->save();
    }


}