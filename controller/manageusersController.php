<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 01/02/15
 * Time: 17:43
 */

namespace controller;


use application\BaseController;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class manageusersController extends UserRelatedController{

    public function index()
    {
        $currentAction = "MANAGE_USER";
        $this->setPageTitle("Manage Users");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);

        if($userManager->isUserLoggedIn())
        {
            if($this->isPOSTRequest())
            {
                $newUser = new User();

                if(isset($_POST['activate']))
                {
                   $userId = $_POST['activate'];
                   $newUser->setUserId($userId);
                   $newUser->setStatus(1);
                }

                if(isset($_POST['deactivate']))
                {
                    $userId = $_POST['deactivate'];
                    $newUser->setUserId($userId);
                    $newUser->setStatus(2);
                }

                if(isset($_POST['delete']))
                {
                    $userId = $_POST['delete'];
                    $newUser->setUserId($userId);
                    $newUser->setStatus(3);
                }

                if($userManager->editUser($newUser))
                {
                    $this->registry->template->success = "Update was successful";
                }
                else
                {
                    $this->registry->template->error = "Update was not successful";
                }
            }

            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);

            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false)
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return true;
            }

            $allUsers = $userManager->getAllUsers();
            $this->registry->template->allUsers = $allUsers;

            if(is_null($profile->getProfilePicture()))
            {
                $profile->useDefaultProfilePicture();
            }
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("manageusers");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }
} 