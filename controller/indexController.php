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

        $blogInjector = new BlogInjector();
        $blog = (new Blog())->getInstance($blogInjector);
        $allBlog = $blog->getAllBlogEntries();
        $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
        $this->setMaxResultPerPage(9);
        $this->registry->template->allBlog = $this->pagination($allBlog, $currentPage);
        $this->registry->template->totalPages = $this->getNumberOfTotalPages();
        $this->registry->template->currentPage = $currentPage;
        $this->registry->template->loadView("home");
    }

} 