<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 31/01/15
 * Time: 21:29
 */

namespace controller;


use application\BaseController;
use application\Paginator;
use application\Template;
use component\blog\Blog;
use component\blog\BlogInjector;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;
class profileController extends UserRelatedController{

    use Paginator;
    public function index()
    {
        $currentAction = "MANAGE_PROFILE";
        $this->setPageTitle("My Profile");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        if($userManager->isUserLoggedIn())
        {
            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);


            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false)
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return;
             }
            //Template::dump($profile);
            if(is_null($profile->getProfilePicture()))
            {
                $profile->useDefaultProfilePicture();
            }

            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("profile");
            return;
        }

        header("Location: signin?profile=false");

    }
} 