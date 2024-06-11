<?php

namespace models;

use Cassandra\Date;
use core\Model;



/**
 * @property int applications_id  ID Вакансії
 * @property \DateTime date_create Назва вакансії
 * @property \DateTime date_editing Опис вакансії
 * @property string type_application тип заяви 'Sent','Viewed','Rejected','Under Review','Accepted'
 * @property int resume_id ID резюме
 * @property int vacancy_id ID вакансії
 * @property int applicant_id ID шукача
 */

class Applications extends Model
{
    public static string $tableName = "applications";
    public static string $primaryKey = 'applications_id';




    public static function AddApplications($applicant_id,$resume_id,$vacancy_id): void
    {
        $rows = self::findByCondition(['resume_id' => $resume_id,'vacancy_id' => $vacancy_id]);


        if(empty($rows)){
            $applications = new Applications();

            $applications->date_create = date('Y-m-d');
            $applications->date_editing = date('Y-m-d');
            $applications->type_application = "Надіслано";
            $applications->resume_id = $resume_id;
            $applications->vacancy_id = $vacancy_id;
            $applications->applicant_id = $applicant_id;


            $applications->save();
        }
    }

    public static function ApplicationsForApplicant($applicant_id)
    {
        return self::findByCondition(['applicant_id'=>$applicant_id]);
    }

    public static function ApplicationsForVacancy($vacancy_id)
    {
        return self::findByCondition(['vacancy_id'=>$vacancy_id]);
    }




}