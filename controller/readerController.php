<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 03/02/15
 * Time: 15:45
 */

namespace controller;


use application\BaseController;
use component\blog\Blog;
use component\blog\BlogEntry;
use component\blog\BlogInjector;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class readerController extends UserRelatedController{
    public function index()
    {
        $currentAction = "MANAGE_ALL_BLOG";
        $this->setPageTitle("Manage Unpublished Blog Entries");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        if($userManager->isUserLoggedIn())
        {
            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);
            $blogInjector = new BlogInjector();
            $blog = (new Blog())->getInstance($blogInjector);


            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false )
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return false;
            }

            $content = $_GET['entry'];
            $blogEntry = new BlogEntry();
            $blogEntry->setId($content);
            $this->registry->template->categories = $blog->getAllCategories();
            $this->registry->template->entry = $blog->getBlogEntry($blogEntry);
            $this->registry->template->reader = $this;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("reader");
            return true;
        }

        header("Location: signin?profile=false");
        return false;
    }

    public function getUserDetail($userId)
    {
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        $user = new User();
        $user->setUserId($userId);

        $result = $userManager->getUser($user);

        if(is_null($result->getProfilePicture()))
        {
            $result->useDefaultProfilePicture();
        }

        return $result;
    }

} 