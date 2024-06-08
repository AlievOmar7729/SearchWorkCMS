<?php

namespace models;

use core\Model;

/**
 * @property int $employer_id ID компанії
 * @property string $name_company Назва компанії
 * @property string email Пошта компанії
 * @property string phone номер телефону компанії
 * @property string about_company О компанії
 * @property int $user_id ID компанії
 */

class Employer extends Model
{
    public static string $tableName = "employer";
    public static string $primaryKey = 'employer_id';

    public static function Register($user_id): void
    {
        $employer = new Employer();
        $employer->user_id = $user_id;
        $employer->save();
    }

}