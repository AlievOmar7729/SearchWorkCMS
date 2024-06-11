<?php

namespace models;

use Cassandra\Date;
use core\Model;

/**
 * @property int $resume_id
 * @property string $education освіта
 * @property string $work_experience досвід роботи
 * @property string $skills навички
 * @property string $personal_qualities особисті якості
 * @property string $about_me про мене
 * @property int $applicant_id
 */


class Resume extends Model
{

    public static string $tableName = "resume";
    public static string $primaryKey = 'resume_id';


    public static function AddResume($education,$work_experience,$skills,$personal_qualities,$about_me,$applicant_id): void
    {
        $resume = new Resume();

        $resume->education = $education;
        $resume->work_experience = $work_experience;
        $resume->skills = $skills;
        $resume->personal_qualities = $personal_qualities;
        $resume->about_me = $about_me;
        $resume->applicant_id = $applicant_id;


        $resume->save();
    }

    public static function ViewMyResume($applicant_id): ?array
    {
        $rows = self::findByCondition(['applicant_id' => $applicant_id]);
        if (!empty($rows))
            return $rows;
        else
            return null;

    }

    public static function ViewResume($resume_id)
    {
        return self::findById($resume_id);
    }

    public static function EditResume($resume_id,$education,$work_experience,$skills,$personal_qualities,$about_me,$applicant_id): void
    {
        $resume = new Resume();

        $resume->resume_id = $resume_id;
        $resume->education = $education;
        $resume->work_experience = $work_experience;
        $resume->skills = $skills;
        $resume->personal_qualities = $personal_qualities;
        $resume->about_me = $about_me;
        $resume->applicant_id = $applicant_id;


        $resume->save();
    }

    public static function DeleteResume($resume_id): void
    {
        self::deleteById($resume_id);
    }

    public static function ThisResume($resume_id,$applicant_id): false|array|null
    {
        return self::findByCondition(['resume_id' => $resume_id, 'applicant_id' => $applicant_id]);
    }

}