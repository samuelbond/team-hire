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
use application\Template;
use component\blog\Blog;
use component\blog\BlogInjector;
use component\cms\Cms;
use component\cms\CmsInjector;
use component\cms\PageBlock;

class indexController extends BaseController{

    use Paginator;
    public function index()
    {
        $cmsInjector = new CmsInjector();
        $cms = (new Cms())->getInstance($cmsInjector);
        $item = new PageBlock();
        $page = "home_page_top_circles";
        $item->setPage(trim($page));
        $this->registry->template->circlesItems = $cms->getCMSItem($item);
        $page = "home_page_intro";
        $item->setPage(trim($page));
        $this->registry->template->intro = $cms->getCMSItem($item);
        $page = "Home_page";
        $item->setPage(trim($page));
        $this->registry->template->homePageContent = $cms->getCMSItem($item);
        $page = "recent_ongoing_work";
        $item->setPage(trim($page));
        $this->registry->template->works = $cms->getCMSItem($item);
        $page = "our_technologies";
        $item->setPage(trim($page));
        $this->registry->template->technologies = $cms->getCMSItem($item);
        $this->registry->template->loadView("home");
    }

} 