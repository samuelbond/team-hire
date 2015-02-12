<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 12/02/15
 * Time: 11:47
 */

namespace controller;


use application\BaseController;
use application\Paginator;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\Page;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class cmspageController extends BaseController{

    use Paginator;
    public function index()
    {
        $currentAction = "MANAGE_USER";
        $this->setPageTitle("CMS Pages");
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

                if(isset($_POST['new_page']))
                {
                    $cmsItem = new Page();
                    $cmsItem->setTitle(trim($_POST['new_page']));
                    $cmsItem->setContent(trim($_POST['new_page_content']));
                    $cmsItem->setMenu($_POST['p_menu']);
                }

                if(isset($_POST['new_page_block']))
                {
                    $cmsItem = new PageBlock();
                    $cmsItem->setTitle(trim($_POST['new_page_block']));
                    $cmsItem->setContent(trim($_POST['new_page_block_content']));
                    $cmsItem->setPage($_POST['pb_page']);
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

            $pages = $cms->getAllCMSItem(new Page());
            $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
            $this->registry->template->pages = $this->pagination($pages, $currentPage);
            $this->registry->template->totalPages = $this->getNumberOfTotalPages();
            $this->registry->template->currentPage = $currentPage;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("cms_pages");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }
} 