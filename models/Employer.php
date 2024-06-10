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

    public static function FindIdEmployerByUser($user_id)
    {

        $rows = self::findByCondition(['user_id' => $user_id]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;

    }


    public static function EditInfo($name_company,$email,$phone,$about_company,$employer_id)
    {
        $employer = new Employer();

        $employer->name_company = $name_company;
        $employer->email = $email;
        $employer->phone = $phone;
        $employer->about_company = $about_company;
        $employer->employer_id = $employer_id;

        $employer->save();

    }



}