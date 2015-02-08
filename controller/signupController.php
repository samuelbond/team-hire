<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 31/01/15
 * Time: 20:13
 */

namespace controller;


use application\BaseController;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class signupController extends BaseController{

    public function index()
    {
        if(isset($_POST['email']))
        {
            $injector = new UserManagerInjector();

            $userManager = (new UserManager())->getInstance($injector);
            $user = new User();
            $user->setFullName($_POST['fname']);
            $user->setEmail($_POST['email']);
            $user->setProfile($_POST['profile']);
            $user->setPassword($_POST['password']);
            $user->hashPassword();
            $returnValue = $userManager->createNewUser($user);
            if($returnValue === false)
            {
                $this->registry->template->error = "An error occurred while trying to you sign you up, please check your details and try again";
            }
            else
            {
                $this->registry->template->success = "Congratulations your account was created successfully";
            }
        }
        $this->registry->template->loadView("signup", false);
    }
} 