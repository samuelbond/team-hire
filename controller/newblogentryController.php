<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 02/02/15
 * Time: 16:10
 */

namespace controller;


use application\BaseController;
use component\blog\Blog;
use component\blog\BlogEntry;
use component\blog\BlogInjector;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;
use finfo;

class newblogentryController extends UserRelatedController{

    private $uploadedImage;

    public function index()
    {
        $currentAction = "CREATE_BLOG";
        $this->setPageTitle("Create New Blog Entry");
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
            
            if($this->isPOSTRequest())
            {
                $title = $_POST['title'];
                $category = $_POST['category'];
                $entry = $_POST['entry'];
                $newEntry = new BlogEntry();
                $newEntry->setEntryAuthor($profile->getUserId());
                $newEntry->setEntryCategory($category);
                $newEntry->setEntry($entry);
                $newEntry->setEntryTitle($title);
                $this->uploader();
                $newEntry->setEntryCover($this->uploadedImage);

                if(isset($_POST['title']) && isset($_POST['category']) && isset($_POST['entry']))
                {
                    if($blog->createNewBlogEntry($newEntry))
                    {
                        header("Location: myblog");
                        return true;
                    }
                    else
                    {
                        $this->registry->template->error = "Failed to create new blog entry";
                    }
                }
            }

            $this->registry->template->categories = $blog->getAllCategories();
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("newblogentry");
            return true;
        }

        header("Location: signin?profile=false");
        return false;
    }


    public function uploader()
    {

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($_FILES['cover']['error']) || is_array($_FILES['cover']['error']))
            {
                throw new \RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['cover']['error'] value.
            switch ($_FILES['cover']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new \RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new \RuntimeException('Exceeded filesize limit.');
                default:
                    throw new \RuntimeException('Unknown errors.');
            }

            // You should also check filesize here.
            if ($_FILES['cover']['size'] > 1000000) {
                throw new \RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['cover']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);

            if (false === $ext = array_search($finfo->file($_FILES['cover']['tmp_name']),array('jpg' => 'image/jpeg','png' => 'image/png','gif' => 'image/gif',), true))
            {
                throw new \RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['cover']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $data = sprintf(_SITE_PATH.'view'.DIRECTORY_SEPARATOR.'blog-covers'.DIRECTORY_SEPARATOR.'%s.%s',sha1_file($_FILES['cover']['tmp_name']),$ext);

            if (!move_uploaded_file($_FILES['cover']['tmp_name'],$data))
            {
                throw new \RuntimeException('Failed to move uploaded file.');
            }

            list($notNeeded, $uploadedImagePath) = explode("view", $data);
            $uploadedImagePath = "view".$uploadedImagePath;

            $this->uploadedImage = $uploadedImagePath;

            return true;

        } catch (\RuntimeException $e) {
            return $e->getMessage();

        }

    }
} 