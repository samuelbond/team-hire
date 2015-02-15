<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\Menu;
use component\cms\PageBlock;

/**
 * Class BaseController
 * @package application
 */
Abstract class BaseController {

    protected $registry;

    protected $arguments;

    protected $pageTitle = "Hire a Software Development Team";


    /**
     * @param $registry
     */
    public function __construct($registry)
    {
        $this->registry = $registry;
        $this->setPageTitle($this->pageTitle);
        $b = $_SERVER['SERVER_NAME'];
        if($b == "localhost")
        {
            $b = "http://".$b."/team/";
        }
        else
        {
            $b = "http://".$b."/";
        }
        $this->registry->template->page_base_patH =$b;
        $this->setSiteHeaders();
    }

    public function setSiteHeaders()
    {
        $cleaner = function($string){
            $kw = ((strpos($string, "<p>") !== false) ? str_replace("<p>", "", $string) : $string);
            $kw = ((strpos($kw, "</p>") !== false) ? str_replace("</p>", "", $kw) : $kw);
            return $kw;
        };
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $item = new PageBlock();
        $page = "site_header";
        $item->setPage(trim($page));
        $this->registry->template->site_headers = $cms->getCMSItem($item);
        $page = "site_footer";
        $item->setPage(trim($page));
        $this->registry->template->site_footer = $cms->getCMSItem($item);
        $page = "site_links";
        $item->setPage(trim($page));
        $links = $cms->getCMSItem($item);
        $facebook = ((is_array($links) && isset($links[0]['content'])) ? $cleaner($links[0]['content']) : "index");
        $twitter = ((is_array($links) && isset($links[1]['content'])) ? $cleaner($links[1]['content']) : "index");
        $googlePlus = ((is_array($links) && isset($links[2]['content'])) ? $cleaner($links[2]['content']) : "index");
        $linkedIn = ((is_array($links) && isset($links[3]['content'])) ? $cleaner($links[3]['content']) : "index");
        $this->registry->template->facebook = $facebook;
        $this->registry->template->twitter = $twitter;
        $this->registry->template->googlePlus = $googlePlus;
        $this->registry->template->linkedIn = $linkedIn;
        $item = new Menu();
        $this->registry->template->site_menus = $cms->getAllCMSItem($item);
    }

    /**
     * The default action for all controllers
     * @return mixed
     */
    abstract public function index();

    protected function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        $this->registry->template->pageTitle = $this->pageTitle;
    }

    protected function getRequestType()
    {
        $requestType = ((isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : "cli");
        return $requestType;
    }

    protected function isGETRequest()
    {
        return (($this->getRequestType() === "GET"));
    }

    protected function isPOSTRequest()
    {
        return (($this->getRequestType() === "POST"));
    }

    protected function actionIsNotAllowed()
    {
        $this->registry->template->error = "You do not have the permission to perform the action you just did please contact your system administrator, This incident will be reported";
    }




}
