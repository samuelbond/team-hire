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

    public function ourservices()
    {
        $page = "our_services";
        $item = new PageBlock();
        $item->setPage(trim($page));
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $all_s = $cms->getCMSItem($item);
        $this->registry->template->our_services = $all_s;
        $main = array_slice($all_s, 6);
        $this->registry->template->main_services = $main;
        $page = "our_services_why_us";
        $item->setPage(trim($page));
        $this->registry->template->service_why = $cms->getCMSItem($item);
        $this->registry->template->loadView("ourservices");
    }

    public function howitworks()
    {
        $page = "how_it_works";
        $item = new PageBlock();
        $item->setPage(trim($page));
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $this->registry->template->how_it_works = $cms->getCMSItem($item);
        $this->registry->template->loadView("howitworks");
    }

    public function getquote()
    {
        if(isset($_GET['status']))
        {
            $s = $_GET['status'];

            if($s === "pass")
            {
                $this->registry->template->success = "Thank you for contacting us, we will get back to you as soon as possible";
            }
            else
            {
                $this->registry->template->error = "We are sorry you couldn't get through to us, please try again later";
            }
        }
        $this->registry->template->loadView("quote");
    }

    public function contactus()
    {
        if(isset($_GET['status']))
        {
            $s = $_GET['status'];

            if($s === "pass")
            {
                $this->registry->template->success = "Thank you for contacting us, we will get back to you as soon as possible";
            }
            else
            {
                $this->registry->template->error = "We are sorry you couldn't get through to us, please try again later";
            }
        }
        $page = "contact_us";
        $item = new PageBlock();
        $item->setPage(trim($page));
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $this->registry->template->contact_us = $cms->getCMSItem($item);
        $this->registry->template->loadView("contactus");
    }
} 