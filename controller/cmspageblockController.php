<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 12/02/15
 * Time: 14:30
 */

namespace controller;


use application\BaseController;
use application\Paginator;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\PageBlock;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class cmspageblockController extends BaseController{

    use Paginator;
    public function index()
    {
        $currentAction = "MANAGE_USER";
        $this->setPageTitle("CMS Page Blocks");
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


            $pages = $cms->getAllCMSItem(new PageBlock());
            $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
            $this->registry->template->pages = $this->pagination($pages, $currentPage);
            $this->registry->template->totalPages = $this->getNumberOfTotalPages();
            $this->registry->template->currentPage = $currentPage;
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("cms_pageblocks");
            return true;
        }

        header("Location: signin?profile=false");
        return true;
    }
} 