<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:30
 */

namespace controller;


use application\BaseController;
use application\Paginator;
use component\blog\Blog;
use component\blog\BlogInjector;

class indexController extends BaseController{

    use Paginator;
    public function index(){
        $this->registry->template->loadView("home");
    }

} 