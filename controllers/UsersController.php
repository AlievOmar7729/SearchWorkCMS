<?php

namespace controllers;

use core\Controller;
use core\Core;
use http\Client\Curl\User;
use models\Admin;
use models\Applicant;
use models\Employer;
use models\News;
use models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {
        if (Users::IsUserLogged())
            return $this->redirect('/');
        if ($this->isPost) {
            $user = Users::FindByLoginAndPassword($this->post->login, $this->post->password);
            if (!empty($user)) {
                Users::LoginUser($user);
                return $this->redirect('/');
            } else {
                $error_massage = "Неправильний логін та/або пароль";
                $this->addErrorMessage('Неправильний логін та/або пароль');
            }
        }

        return $this->render();

    }

    public function actionLogout()
    {
        Users::LogoutUser();
        return $this->redirect('/users/login');
    }

    public function actionRegister()
    {
        if (Users::IsUserLogged())
            return $this->redirect('/');

        if ($this->isPost) {
            $user = Users::FindByLogin($this->post->login);
            if (!empty($user))
                $this->addErrorMessage('Користувач із таким логіном вже існує');

            $login = $this->post->login;
            $password = $this->post->password;
            if (empty($login))
                $this->addErrorMessage('Логін не вказано');
            if (empty($password))
                $this->addErrorMessage('Пароль не вказано');
            if ($this->post->password != $this->post->password2)
                $this->addErrorMessage('Паролі не співпадають');
            if (strlen($login) <= 6 || strlen($login) >= 30)
                $this->addErrorMessage('Дозволена кількість символів в логіні користувача: від 7 до 30');
            if (strlen($password) <= 6 || strlen($password) >= 30)
                $this->addErrorMessage('Дозволена кількість символів в паролі користувача: від 7 до 30');

            if (!$this->isErrorMessageExists()) {
                $hashPassword = password_hash($this->post->password, PASSWORD_DEFAULT);
                Users::RegisterUser($this->post->login, $hashPassword, $this->post->userType);
                $this->redirect('/users/login');
            }
        }
        return $this->render();
    }

    public function actionIndex()
    {
        return $this->render();
    }


    public function actionEdit()
    {
        $userInfo = [];
        if (Users::RoleUser() === 'admin') {
            $userInfo = Admin::FindIdAdminByUser(Core::get()->session->get('user')['user_id']);
        }
        if (Users::RoleUser() === 'applicant') {
            $userInfo = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id']);
        }
        if (Users::RoleUser() === 'employer') {
            $userInfo = Employer::FindIdEmployerByUser(Core::get()->session->get('user')['user_id']);
        }
        $this->template->setParam('userInfo', $userInfo);


        if ($this->isPost) {
            if (Users::RoleUser() === 'admin') {
                $username = $this->post->username;
                $email = $this->post->email;

                $admin_id = Admin::FindIdAdminByUser(Core::get()->session->get('user')['user_id'])['admin_id'];

                if (empty($username))
                    $this->addErrorMessage('Нікнейм не вказано');
                if (empty($email))
                    $this->addErrorMessage('Пошту не вказано');

                if (!$this->isErrorMessageExists()) {
                    Admin::EditInfo($username, $email, $admin_id,);
                    return $this->redirect("/users/index");
                }
            }
            if (Users::RoleUser() === 'applicant') {
                $name = $this->post->name;
                $surname = $this->post->surname;
                $email = $this->post->email;
                $phone = $this->post->phone;

                $applicant_id = Applicant::FindIdApplicantByUser(Core::get()->session->get('user')['user_id'])['applicant_id'];

                if (empty($name))
                    $this->addErrorMessage('Ім`я не вказано');
                if (empty($email))
                    $this->addErrorMessage('Пошту не вказано');
                if (empty($surname))
                    $this->addErrorMessage('Прізвище не вказано');
                if (empty($phone))
                    $this->addErrorMessage('Номер телефону не вказано');

                if (!$this->isErrorMessageExists()) {
                    Applicant::EditInfo($name, $surname, $email, $phone, $applicant_id);
                    return $this->redirect("/users/index");
                }

            }
            if (Users::RoleUser() === 'employer') {

                $name_company = $this->post->name_company;
                $email = $this->post->email;
                $phone = $this->post->phone;
                $about_company = $this->post->about_company;


                $employer_id = Employer::FindIdEmployerByUser(Core::get()->session->get('user')['user_id'])['employer_id'];

                if (empty($name_company))
                    $this->addErrorMessage('Назву компанії не вказано');
                if (empty($email))
                    $this->addErrorMessage('Пошту не вказано');
                if (empty($about_company))
                    $this->addErrorMessage('Інформацію про компанію не вказано.');
                if (empty($phone))
                    $this->addErrorMessage('Номер телефону не вказано');

                if (!$this->isErrorMessageExists()) {
                    Employer::EditInfo($name_company,$email,$phone,$about_company,$employer_id);
                    return $this->redirect("/users/index");
                }

            }



        }

        return $this->render();
    }
}