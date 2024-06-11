<?php

namespace controllers;
require 'style/Parsedown.php';

use core\Controller;
use core\Core;
use models\Admin;
use models\Applicant;
use models\Applications;
use models\Employer;
use models\News;
use models\Resume;
use models\Users;
use models\Vacancy;

class VacancyController extends Controller
{

    public function actionAdd()
    {
        if (Users::RoleUser() != 'employer') {
            return $this->redirect('/');
        }


        if ($this->isPost) {
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
                Vacancy::AddVacancy($title, $description, $employment, $salary, $location, $employer_id);
            }

        }

        return $this->render();
    }

    public function actionMy($params): array
    {

        if (Users::RoleUser() != 'employer') {
            return $this->redirect('/');
        }

        $employer_id = Employer::FindIdEmployerByUser(Core::get()->session->get('user')['user_id'])['employer_id'];

        if (isset($params[0])) {
            $vacancy_id = $params[0];
            $vacancyOne = Vacancy::ThisVacancy($vacancy_id, $employer_id);

            $applications = Applications::ApplicationsForVacancy($vacancy_id);
            $resume = [];
            if(isset($applications)){
                foreach ($applications as $application) {
                    $resume[$application['resume_id']] = Resume::ViewResume($application['resume_id']);

                    $applicant = Applicant::FindById($resume[$application['resume_id']]['applicant_id']);

                    $resume[$application['resume_id']]['name'] = $applicant['name'];
                    $resume[$application['resume_id']]['email'] = $applicant['email'];
                    $resume[$application['resume_id']]['phone'] = $applicant['phone'];
                }
            }


            $this->template->setParam('applications',$resume);

            if ($vacancyOne) {

                $this->template->setParam('myVacancy', [$vacancyOne]);
                return $this->render();
            } else {
                return $this->redirect('/vacancy/my');
            }
        }


        $vacancyMy = Vacancy::ViewMyVacancy($employer_id);
        if (empty($vacancyMy)) {
            $vacancyMy = [];
        }

        $this->template->setParam('myVacancy', $vacancyMy);
        return $this->render();
    }

    public function actionIndex($params): array
    {

        $array = [];
        if (count($params) === 1) {
            $vacancy_id = $params[0];

            $vacancyOne = Vacancy::ViewVacancy($vacancy_id);

            if ($vacancyOne) {
                $this->template->setParam('vacancyList', [$vacancyOne]);

                return $this->render();
            }

        }

        if (count($params) === 2) {

            if ($params[0] !== 'false') {
                $array['position'] = '%'.$params[0].'%';
            }
            if ($params[1] !== 'false') {
                $array['location'] = '%'.$params[1].'%';
            }

            $vacancy = Vacancy::ViewVacancyFilter($array);
            if (empty($vacancy)) {
                $vacancy = [];
            }
            $this->template->setParam('vacancyList', $vacancy);
            return $this->render();


        } else {

            $vacancy = Vacancy::ViewAllVacancy();
            if (empty($vacancy)) {
                $vacancy = [];
            }
            $this->template->setParam('vacancyList', $vacancy);
            return $this->render();
        }

    }


    public function actionDelete($params): null
    {
        if (Users::RoleUser() != 'employer') {
            return $this->redirect('/');
        }

        if (!isset($params[0])) {
            return $this->redirect('/');
        }

        $vacancy_id = $params[0];

        $vacancy = Vacancy::ViewVacancy($vacancy_id);
        if (!isset($vacancy))
            return $this->redirect('/');
        Vacancy::DeleteVacancy($vacancy_id);
        return $this->redirect('/');
    }


    public function actionEdit($params): ?array
    {
        if (Users::RoleUser() != 'employer') {
            return $this->redirect('/');
        }
        if (!isset($params[0])) {
            return $this->redirect('/');
        }
        $vacancy_id = $params[0];
        $vacancy = Vacancy::ViewVacancy($vacancy_id);


        $this->template->setParam('vacancyEdit', $vacancy);

        if ($this->isPost) {
            $title = $this->post->title;
            $description = $this->post->description;
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
                Vacancy::EditVacancy($vacancy_id, $title, $description, $employment, $salary, $location, $employer_id);
                return $this->redirect("/vacancy/my/{$vacancy_id}");
            }
        }

        return $this->render();
    }
}
