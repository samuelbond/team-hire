<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 07/02/15
 * Time: 20:08
 */

namespace controller;


use application\BaseController;

abstract class UserRelatedController extends BaseController{

    public function __construct($registry)
    {
        parent::__construct($registry);
        $this->registry->template->showProfileBar = true;
    }
} 