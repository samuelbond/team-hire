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
