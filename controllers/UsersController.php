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
        if(Users::IsUserLogged())
            return $this->redirect('/');
        if ($this->isPost){
            $user = Users::FindByLoginAndPassword($this->post->login,$this->post->password);
            if(!empty($user)){
                Users::LoginUser($user);
                return $this->redirect('/');
            }
            else{
                $error_massage = "Неправильний логін та/або пароль";
                $this->setErrorMessage('Неправильний логін та/або пароль');
            }
        }

        return $this->render();

    }

    public function actionLogout()
    {
        Users::LoggoutUser();
        return $this->redirect('/users/login');
    }

}