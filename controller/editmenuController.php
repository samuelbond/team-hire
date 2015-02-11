<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 11/02/15
 * Time: 09:42
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\Menu;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class editmenuController extends BaseController{

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

                if(isset($_POST['menu_title']))
                {
                    $cmsItem = new Menu();
                    $cmsItem->setId($_POST['menu_id']);
                    $cmsItem->setTitle(trim($_POST['menu_title']));
                    $cmsItem->setLink(trim($_POST['menu_link']));
                    $cmsItem->setOrder(trim($_POST['menu_order']));
                }

                if($cms->modifyCMSItem($cmsItem))
                {
                    header("Location: cmsmanager");
                    return true;
                }
                else
                {
                    $this->registry->template->error = "Failed to create new CMS Item";
                }
            }

            $id = ((isset($_POST['menu_id'])) ? $_POST['menu_id'] : $_GET['edit_menu']);
            $cmsItem = new Menu();
            $cmsItem->setId($id);
            $menusA = $cms->getCMSItem($cmsItem);
            $this->registry->template->menus = $menusA;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("edit_menu");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }

} 