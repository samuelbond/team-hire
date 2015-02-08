<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 07/02/15
 * Time: 20:57
 */

namespace controller;


use application\BaseController;
use component\blog\Blog;
use component\blog\BlogInjector;

class subscribeController extends BaseController{

    public function index()
    {
        if($this->isPOSTRequest())
        {
            $blogInjector = new BlogInjector();
            $blog = (new Blog())->getInstance($blogInjector);
            $email = $_POST['subscribe'];
            if(is_null($email) || empty($email) || $email === "")
            {
                $this->registry->template->error = "Invalid email address provided";
            }
            elseif($blog->subscribeToBlog($email))
            {
                $this->registry->template->success = "Congratulations you have successfully subscribed to our blog, we promise not to spam you";
                $this->registry->template->headTitle = "Blog Subscription";
            }
            else
            {
                $this->registry->template->error = "We could not subscribe you to our blog, please try again";
            }

            $this->registry->template->loadView("info");
        }
        else
        {
            header("Location index");
            return true;
        }
    }
} 