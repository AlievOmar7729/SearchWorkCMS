<?php

namespace models;

use core\Model;

/**
 * @property int $applicant_id ID користувача
 * @property string $name ім`я користувача
 * @property string $surname прізвище користуавча
 * @property string $email пошта користувача
 * @property string $phone номер телефону користувача
 * @property int $user_id ID user
 */


class Applicant extends Model
{
    public static string $tableName = "applicant";
    public static string $primaryKey = 'applicant_id';


    public static function Register($user_id): void
    {
        $applicant = new Applicant();
        $applicant->user_id = $user_id;
        $applicant->save();
    }


    public static function FindIdApplicantByUser($user_id)
    {

        $rows = self::findByCondition(['user_id' => $user_id]);
        if(!empty($rows))
            return $rows[0];
        else
            return null;

    }

    public static function EditInfo($name,$surname,$email,$phone,$applicant_id)
    {
        $applicant = new Applicant();

        $applicant->name = $name;
        $applicant->surname = $surname;
        $applicant->email = $email;
        $applicant->phone = $phone;
        $applicant->applicant_id = $applicant_id;

        $applicant->save();

    }

}