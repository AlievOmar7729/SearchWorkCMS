<?php

namespace controllers;
require 'style/Parsedown.php';

use core\Controller;
use core\Core;
use models\Admin;
use models\Employer;
use models\News;
use models\Users;
use models\Vacancy;

class VacancyController extends Controller
{

    public function actionAdd()
    {
        if(Users::RoleUser() != 'employer'){
            return $this->redirect('/');
        }


        if($this->isPost){
            $parsedown = new \Parsedown();

            $title = $this->post->title;
            $description = $parsedown->text($this->post->description);
            $employment = $this->post->employment;
            $salary = $this->post->salary;
            $location = $this->post->location;
            $employer_id = Employer::FindIdEmployerByUser(Core::get()->session->get('user')['user_id'])['employer_id'];
            if (empty($title))
                $this->addErrorMessage('Назву вакансії не вказано');
            if (empty($description))
                $this->addErrorMessage('Опис вакансії не вказано');
            if (empty($employment))
                $this->addErrorMessage('Вид зайнятості не вказано');
            if (empty($salary))
                $this->addErrorMessage('Заробітна плата вакансії не вказано');
            if (empty($location))
                $this->addErrorMessage('Місто праці не вказано');

            if (!$this->isErrorMessageExists()) {
                Vacancy::AddVacancy($title,$description,$employment,$salary,$location,$employer_id);
            }

        }

        return $this->render();
    }

    public function actionMy($params): array
    {

        if(Users::RoleUser() != 'employer'){
            return $this->redirect('/');
        }

        $employer_id = Employer::FindIdEmployerByUser(Core::get()->session->get('user')['user_id'])['employer_id'];

        if(isset($params[0])){
            $vacancy_id = $params[0];
            $vacancyOne = Vacancy::ThisVacancy($vacancy_id,$employer_id);

            if($vacancyOne){

                $this->template->setParam('myVacancy', [$vacancyOne]);
                return $this->render();
            }
            else{
                return $this->redirect('/vacancy/my');
            }
        }



        $vacancyMy = Vacancy::ViewMyVacancy($employer_id);
        if(empty($vacancyMy)){
            $vacancyMy = [];
        }

        $this->template->setParam('myVacancy',$vacancyMy);
        return $this->render();
    }

    public function actionIndex($params)
    {

        $array = [];

        if(count($params) >= 6){
            $array = ([
                'position' => $params[0],
                'location' => $params[1],
                'salaryFrom' => $params[2],
                'salaryTo' => $params[3],
                'fullTime' => $params[4],
                'partTime' => $params[5]
            ]);
            var_dump($array['partTime']);
            # Зробити пошук для виводу вакансій по параметрам


        }else{
            # Вивід усіх вакансій
        }







        return $this->render();
    }

}