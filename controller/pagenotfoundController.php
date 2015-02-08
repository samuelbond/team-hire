<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 02/02/15
 * Time: 09:48
 */

namespace controller;


use application\BaseController;

class pagenotfoundController extends BaseController{

    public function index()
    {
        echo "<h1>The page you requested was not found</h1>";
    }
} 