<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 31/01/15
 * Time: 22:44
 */

namespace controller;


use application\BaseController;
use application\Template;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class signinController extends BaseController{

    public function index()
    {
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        $email = ((isset($_POST['email'])) ? $_POST['email'] : null);
        $password = ((isset($_POST['password'])) ? $_POST['password'] : null);

        if( $this->isPOSTRequest() && (empty($email) || is_null($email) || is_null($password) || empty($password)))
        {
            $this->registry->template->error = "Invalid details, email and password are required ";
        }
        elseif(!empty($email) && !is_null($email) && !is_null($password) && !empty($password))
        {

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->hashPassword();
            $returnValue = $userManager->loginUser($user);

            if($returnValue === false)
            {
                $this->registry->template->error = "Invalid details, wrong email or password";
            }
            else
            {
                $user = new User();
                $user->setUserId($userManager->getCurrentSessionUserId());
                $u = $userManager->getUser($user);
            }

            if(is_object($u) && intval($u->getStatus()) === 0)
            {
                $this->registry->template->error = "Your Account has not been activated yet, please contact your system administrator";
            }
            elseif(!is_object($u))
            {
                $this->registry->template->error = "Invalid details, wrong email or password";
            }
            else
            {
                header("Location: profile");
                return true;
            }

            $this->registry->template->loadView("signin", false);
            return false;
        }



        if(isset($_GET['logout']))
        {
            $injector = new UserManagerInjector();
            $userManager = (new UserManager())->getInstance($injector);

            if($userManager->isUserLoggedIn())
            {
                if($userManager->logOutUser())
                {
                    $this->registry->template->success = "you have been logged out successfully";
                }
            }
        }

        if($userManager->isUserLoggedIn())
        {
            header("Location: profile");
            return true;
        }

        if(isset($_GET['profile']))
        {
            $this->registry->template->error = "you have to be logged in to access this part";
        }

        $this->registry->template->loadView("signin", false);
        return false;
    }
}