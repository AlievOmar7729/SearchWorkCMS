<?php

namespace controllers;

use core\Controller;
use core\Core;
use http\Client\Curl\User;
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
                $hashPassword = password_hash($this->post->password,PASSWORD_DEFAULT);
               Users::RegisterUser($this->post->login, $hashPassword, $this->post->userType);
               $this->redirect('/users/login');
            }
        }
        return $this->render();
    }


}