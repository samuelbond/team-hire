<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 10/02/15
 * Time: 16:18
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\Menu;
use component\cms\MenuType;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class cmsmanagerController extends BaseController{

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

                if(isset($_POST['new_menu_type']))
                {
                    $cmsItem = new MenuType();
                    $cmsItem->setType(trim($_POST['new_menu_type']));

                }

                if(isset($_POST['new_menu']))
                {
                    $cmsItem = new Menu();
                    $cmsItem->setTitle(trim($_POST['new_menu']));
                    $cmsItem->setType(trim($_POST['m_type']));
                    $cmsItem->setLink(trim($_POST['menu_link']));
                    $cmsItem->setOrder(trim($_POST['menu_order']));
                }

                if($cms->createNewCMSItem($cmsItem))
                {
                    $this->registry->template->success = "New CMS Item was created successfully";
                }
                else
                {
                    $this->registry->template->error = "Failed to create new CMS Item";
                }
            }

            $cmsItem = new MenuType();
            $types = $cms->getAllCMSItem($cmsItem);
            $this->registry->template->menuTypes = $types;
            $cmsItem = new Menu();
            $menusA = $cms->getAllCMSItem($cmsItem);
            $this->registry->template->menus = $menusA;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("newcms");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }

} 