<?php

namespace models;




use core\Model;

/**
 * @property int vacancy_id  ID Вакансії
 * @property string title Назва вакансії
 * @property string description Опис вакансії
 * @property string employment Вид зайнятосты (enum - 'full-time', 'part-time')
 * @property float salary Заробітна плата
 * @property string location Місто
 * @property int employer_id ID компанії , чия вакансія
 */



class Vacancy extends Model
{
    public static string $tableName = "vacancy";
    public static string $primaryKey = 'vacancy_id';



    public static function AddVacancy($title,$description,$employment,$salary,$location,$employer_id): void
    {
        $vacancy = new Vacancy();

        $vacancy->title = $title;
        $vacancy->description = $description;
        $vacancy->employment = $employment;
        $vacancy->salary = $salary;
        $vacancy->location = $location;
        $vacancy->employer_id = $employer_id;

        $vacancy->save();
    }
    public static function ViewMyVacancy($employer_id): ?array
    {
        $rows = self::findByCondition(['employer_id' => $employer_id]);
        if(!empty($rows))
            return $rows;
        else
            return null;
    }

    public static function ThisVacancy($vacancy_id,$employer_id): false|array|null
    {
        return self::findByCondition(['vacancy_id'=> $vacancy_id,'employer_id'=>$employer_id] );
    }



}