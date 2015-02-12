<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 12/02/15
 * Time: 14:27
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\PageBlock;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class editpageblockController extends BaseController{

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

                if(isset($_POST['page_block_id']))
                {
                    $cmsItem = new PageBlock();
                    $cmsItem->setId($_POST['page_block_id']);
                    $cmsItem->setTitle(trim($_POST['page_block_title']));
                    $cmsItem->setContent(trim($_POST['page_block_content']));
                }

                if($cms->modifyCMSItem($cmsItem))
                {
                    header("Location: cmspageblock");
                    return true;
                }
                else
                {
                    $this->registry->template->error = "Failed to modify page";
                }
            }

            if(isset($_GET['page_block_publish']))
            {
                $cmsItem = new PageBlock();
                $cmsItem->setId(trim($_GET['page_block_publish']));
                $cmsItem->setStatus(intval($_GET['status']));

                if($cms->modifyCMSItem($cmsItem))
                {
                    header("Location: cmspageblock");
                    return true;
                }
                else
                {
                    $this->registry->template->error = "Failed to publish page";
                }
            }

            $id = ((isset($_POST['edit_page_block'])) ? $_POST['edit_page_block'] : $_GET['edit_page_block']);
            $cmsItem = new PageBlock();
            $cmsItem->setId($id);
            $pg = $cms->getCMSItem($cmsItem);
            $this->registry->template->page = $pg;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("edit_page_block");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }

} 