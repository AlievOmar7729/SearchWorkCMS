<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Applicant;
use models\Applications;
use models\Resume;
use models\Users;
use models\Vacancy;

class ApplicationsController extends Controller
{

    public function actionMy(): ?array
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }
        $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];
        $myApplications = Applications::ApplicationsForApplicant($applicant_id);


        if(empty($myApplications))
        {
            $myApplications = [];
        }

        foreach ($myApplications as &$application) {
            $vacancy = Vacancy::ViewVacancy($application['vacancy_id']);
            $application['title'] = $vacancy['title'];
        }

        $this->template->setParam('myApplications',$myApplications);


        return $this->render();
    }

    public function actionAdd($params)
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }

        $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];

        if(isset($params[0]) && isset($params[1])){

            $vacancy_id = $params[0];
            $resume_id = $params[1];
            Applications::AddApplications($applicant_id,$resume_id,$vacancy_id);

            $this->redirect('/vacancy/index');
        }

        $resumeMy = Resume::ViewMyResume($applicant_id);
        if(empty($resumeMy)){
            $resumeMy = [];
        }
        $this->template->setParam('myResume',$resumeMy);


        if(!empty($params[0])){
            $resume_id = $params[0];

        }

        return $this->render();
    }

}