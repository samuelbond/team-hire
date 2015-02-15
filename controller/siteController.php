<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 2/15/2015
 * Time: 7:42 PM
 */

namespace controller;


use application\BaseController;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\PageBlock;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class siteController extends BaseController{

    public function index()
    {

    }

    public function aboutus()
    {
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        $all = $userManager->getAllUsers();
        $page = "About Us";
        $item = new PageBlock();
        $item->setPage($page);
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $this->registry->template->about_us = $cms->getCMSItem($item);
        $this->registry->template->our_team_members = $all;
        $this->registry->template->loadView("aboutus");
    }
} 