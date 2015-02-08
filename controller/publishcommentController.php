<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 05/02/15
 * Time: 12:48
 */

namespace controller;


use application\BaseController;
use application\Paginator;
use application\Template;
use component\blog\Blog;
use component\blog\BlogComment;
use component\blog\BlogEntry;
use component\blog\BlogInjector;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;

class publishcommentController extends BaseController{

    use Paginator;
    public function index()
    {
        $currentAction = "MANAGE_BLOG";
        $this->setPageTitle("Manage Comments");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        if($userManager->isUserLoggedIn())
        {
            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);
            $blogInjector = new BlogInjector();
            $blog = (new Blog())->getInstance($blogInjector);


            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false)
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return false;
            }

            if(isset($_GET['publish']))
            {

                $commentId = $_GET['publish'];
                $comment = new BlogComment();
                $comment->setCommentId($commentId);
                $comment->setStatus(1);

                if($blog->publishComment($comment))
                {
                    $this->registry->template->success = "Comment has been published successfully";
                }
                else
                {
                    $this->registry->template->error = "Failed to publish comment";
                }

            }

            if(isset($_GET['remove']))
            {

                $commentId = $_GET['remove'];
                $comment = new BlogComment();
                $comment->setCommentId($commentId);
                $comment->setStatus(2);

                if($blog->publishComment($comment))
                {
                    $this->registry->template->success = "Comment has been removed successfully";
                }
                else
                {
                    $this->registry->template->error = "Failed to remove comment";
                }

            }

            if(isset($_GET['read_comment']))
            {
                $commentId = $_GET['read_comment'];
                $comment = new BlogComment();
                $comment->setCommentId($commentId);

                $commentData = $blog->getComment($comment);



                if(!is_object($commentData))
                {
                    $this->registry->template->error = "Could not find the comment you are looking for";
                    $this->registry->template->loadView("content");
                    return false;
                }

                $blogEntry = new BlogEntry();
                $blogEntry->setId($commentData->getBlogEntryId());
                $selectedBlog = $blog->getBlogEntry($blogEntry);
                if(!is_object($selectedBlog))
                {
                    $this->registry->template->error = "Could not find the comment you are looking for";
                    $this->registry->template->loadView("content");
                    return false;
                }

                if(intval($profile->getUserId()) !== intval($selectedBlog->getEntryAuthor()))
                 {
                     $this->actionIsNotAllowed();
                     $this->registry->template->loadView("content");
                     return false;

                 }

                $this->registry->template->comment = $commentData;
                $this->registry->template->loadView("comment_reader");
                return true;

            }


            $allAlerts = $blog->getAllCommentAwaitingPublish($user->getUserId());
            $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
            $this->registry->template->alerts = $this->pagination($allAlerts, $currentPage);
            $this->registry->template->totalPages = $this->getNumberOfTotalPages();
            $this->registry->template->currentPage = $currentPage;
            $this->registry->template->profile = $profile;
            $this->registry->template->publishBlog = $this;
            $this->registry->template->loadView("comment_alerts");
            return true;

        }

        header("Location: signin?profile=false");
        return false;
    }

    public function getUserDetail($userId)
    {
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        $user = new User();
        $user->setUserId($userId);

        $result = $userManager->getUser($user);
        $u = array("name" => $result->getFullName(), "email" => $result->getEmail());

        return $u;
    }
} 