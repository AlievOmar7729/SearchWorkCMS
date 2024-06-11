<?php

namespace controllers;
require 'style/Parsedown.php';

use core\Controller;
use core\Core;
use models\Applicant;
use models\Resume;
use models\Users;

class ResumeController extends Controller
{
    public function actionAdd()
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }



        if($this->isPost){

            $education = $this->post->education;
            $work_experience = $this->post->work_experience;
            $skills = $this->post->skills;
            $personal_qualities = $this->post->personal_qualities;
            $about_me = $this->post->about_me;
            $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];

            if (empty($education))
                $this->addErrorMessage('Освіту не вказано');
            if (empty($work_experience))
                $this->addErrorMessage('Досвід робти не вказано');
            if (empty($skills))
                $this->addErrorMessage('Навички не вказано');
            if (empty($personal_qualities))
                $this->addErrorMessage('Особисті якості не вказано');
            if (empty($about_me))
                $this->addErrorMessage('Інформацію про себе не вказано');

            if(!$this->isErrorMessageExists()){
                Resume::AddResume($education,$work_experience,$skills,$personal_qualities,$about_me,$applicant_id);

            }


        }

        return $this->render();
    }


    public function actionDelete($params): null
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }
        if (!isset($params[0])) {
            return $this->redirect('/');
        }
        $resume_id = $params[0];

        $resume = Resume::ViewResume($resume_id);

        if(!isset($resume))
            return $this->redirect('/');
        Resume::DeleteResume($resume_id);
        return $this->redirect('/');
    }


    public function actionEdit($params): ?array
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }
        if (!isset($params[0])) {
            return $this->redirect('/');
        }

        $resume_id = $params[0];
        $resume = Resume::ViewResume($resume_id);

        $this->template->setParam('resumeEdit', $resume);


        if($this->isPost){

            $education = $this->post->education;
            $work_experience = $this->post->work_experience;
            $skills = $this->post->skills;
            $personal_qualities = $this->post->personal_qualities;
            $about_me = $this->post->about_me;
            $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];

            if (empty($education))
                $this->addErrorMessage('Освіту не вказано');
            if (empty($work_experience))
                $this->addErrorMessage('Досвід робти не вказано');
            if (empty($skills))
                $this->addErrorMessage('Навички не вказано');
            if (empty($personal_qualities))
                $this->addErrorMessage('Особисті якості не вказано');
            if (empty($about_me))
                $this->addErrorMessage('Інформацію про себе не вказано');

            if(!$this->isErrorMessageExists()){
                Resume::EditResume($resume_id,$education,$work_experience,$skills,$personal_qualities,$about_me,$applicant_id);
                return $this->redirect("/resume/my/{$resume_id}");
            }


        }
        return $this->render();
    }


    public function actionMy($params): ?array
    {
        if (Users::RoleUser() != 'applicant') {
            return $this->redirect('/');
        }

        $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];
        if (isset($params[0])) {
            $resume_id = $params[0];
            $resumeOne = Resume::ThisResume($resume_id,$applicant_id);

            if($resumeOne){
                $this->template->setParam('myResume',[$resumeOne]);
                return $this->render();
            }
            else{
                return $this->redirect('/resume/my');
            }
        }

        $resumeMy = Resume::ViewMyResume($applicant_id);
        if(empty($resumeMy)){
            $resumeMy = [];
        }
        $this->template->setParam('myResume',$resumeMy);
        return $this->render();

    }
}