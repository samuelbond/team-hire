<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 03/02/15
 * Time: 22:39
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

class blogController extends BaseController{

    use Paginator;
    public function index()
    {

        if($this->isPOSTRequest())
        {
            $blogInjector = new BlogInjector();
            $blog = (new Blog())->getInstance($blogInjector);

            $name = trim(((isset($_POST['fname'])) ? $_POST['fname'] : null));
            $email = trim(((isset($_POST['email'])) ? $_POST['email'] : null));
            $comment = trim(((isset($_POST['comment'])) ? $_POST['comment'] : null));
            $entryId = $_POST['entry_id'];
            $entryComment = new BlogComment();
            $entryComment->setComment($comment);
            $entryComment->setCommentAuthor($name);
            $entryComment->setCommentAuthorEmail($email);
            $entry = new BlogEntry();
            $entry->setId($entryId);

            if($blog->commentOnBlogEntry($entryComment, $entry))
            {
                $this->registry->template->success = "Your Comment has been received ";
            }
            else
            {
                $this->registry->template->error = "Your Comment could not be received, please try again ";
            }

            return $this->entry(trim($_POST['blog_id']));
        }

        $this->registry->template->error = "The request blog entry was not found, maybe it has been moved or deleted, please check your details and try again";
        $this->registry->template->loadView("info");
        return false;

    }

    public function entry($id)
    {
        $blogInjector = new BlogInjector();
        $blog = (new Blog())->getInstance($blogInjector);
        $blogEntry = new BlogEntry();
        $blogEntry->setEntryId($id);
        $entry = $blog->getBlogEntryWithEntryId($blogEntry);
        if(is_null($entry) || !is_object($entry) || ( is_object($entry) && intval($entry->getEntryStatus()) !== 1))
        {
            $this->registry->template->error = "The request blog entry was not found, maybe it has been moved or deleted, please check your details and try again";
            $this->registry->template->loadView("info");
            return false;
        }
        $this->setPageTitle($entry->getEntryTitle());
        $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
        $comments = $blog->getAllCommentsForThisBlogEntry($entry);
        $this->registry->template->comments = $this->pagination($comments, $currentPage);
        $this->registry->template->totalPages = $this->getNumberOfTotalPages();
        $this->registry->template->totalComments = count($comments);
        $this->registry->template->currentPage = $currentPage;
        $this->registry->template->categories = $blog->getAllCategories();
        $this->registry->template->entry = $entry;
        $this->registry->template->reader = $this;
        $this->registry->template->loadView("entry");
        return true;
    }

    public function category($categoryId)
    {
        $blogInjector = new BlogInjector();
        $blog = (new Blog())->getInstance($blogInjector);

        $this->setPageTitle("Categories");
        $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
        $entries = $blog->getBlogEntryInCategory($categoryId);
        $this->registry->template->toptag = "Blog Entries in this category";
        $this->registry->template->allEntries = $this->pagination($entries, $currentPage);
        $this->registry->template->totalPages = $this->getNumberOfTotalPages();
        $this->registry->template->totalResult= count($entries);
        $this->registry->template->currentPage = $currentPage;
        $this->registry->template->currentCategory = $categoryId;
        $this->registry->template->categories = $blog->getAllCategories();
        $this->registry->template->reader = $this;
        $this->registry->template->loadView("search_view");
        return true;
    }

    public function search($searchTerm)
    {
        $blogInjector = new BlogInjector();
        $blog = (new Blog())->getInstance($blogInjector);

        $this->setPageTitle("Search");
        $currentPage = ((isset($_GET['page'])) ? $_GET['page'] : 1);
        $entries = $blog->searchAllBlogEntry($searchTerm);
        $this->registry->template->toptag = "Searching for `".$searchTerm."`";
        //$this->registry->template->message = "";
        $this->registry->template->allEntries = $this->pagination($entries, $currentPage);
        $this->registry->template->totalPages = $this->getNumberOfTotalPages();
        $this->registry->template->totalResult= count($entries);
        $this->registry->template->currentPage = $currentPage;
        $this->registry->template->searchTerm = $searchTerm;
        $this->registry->template->categories = $blog->getAllCategories();
        $this->registry->template->reader = $this;
        $this->registry->template->loadView("search_view");
        return true;
    }

    public function getUserDetail($userId)
    {
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        $user = new User();
        $user->setUserId($userId);

        $result = $userManager->getUser($user);

        if(is_null($result->getProfilePicture()))
        {
            $result->useDefaultProfilePicture();
        }

        return $result;
    }
} 