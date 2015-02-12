<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 12/02/15
 * Time: 10:20
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\Page;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class editpageController extends BaseController{

    public function index()
    {
        $currentAction = "MANAGE_USER";
        $this->setPageTitle("CMS Manager");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);

        if($userManager->isUserLoggedIn())
        {
            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);
            $cmsInjector = new CmsInjector();
            $cms = (new Cms())->getInstance($cmsInjector);


            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false)
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return true;
            }


            if($this->isPOSTRequest())
            {
                $cmsItem = null;

                if(isset($_POST['page_id']))
                {
                    $cmsItem = new Page();
                    $cmsItem->setId($_POST['page_id']);
                    $cmsItem->setTitle(trim($_POST['page_title']));
                    $cmsItem->setContent(trim($_POST['page_content']));
                }

                if($cms->modifyCMSItem($cmsItem))
                {
                    header("Location: cmspage");
                    return true;
                }
                else
                {
                    $this->registry->template->error = "Failed to modify page";
                }
            }

            if(isset($_GET['page_publish']))
            {
                $cmsItem = new Page();
                $cmsItem->setId(trim($_GET['page_publish']));
                $cmsItem->setStatus(intval($_GET['status']));

                if($cms->modifyCMSItem($cmsItem))
                {
                    header("Location: cmspage");
                    return true;
                }
                else
                {
                    $this->registry->template->error = "Failed to publish page";
                }
            }

            $id = ((isset($_POST['edit_page'])) ? $_POST['edit_page'] : $_GET['edit_page']);
            $cmsItem = new Page();
            $cmsItem->setId($id);
            $pg = $cms->getCMSItem($cmsItem);
            $this->registry->template->page = $pg;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("edit_page");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }
} 