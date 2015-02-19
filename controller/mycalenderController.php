<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 19/02/15
 * Time: 10:01
 */

namespace controller;


use application\BaseController;

class mycalenderController extends BaseController{

    public function index()
    {
        $this->registry->template->mycal = true;
        $this->registry->template->loadView("mycalender");
    }
} 