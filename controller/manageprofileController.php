<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 01/02/15
 * Time: 16:01
 */

namespace controller;


use application\BaseController;
use application\Template;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInjector;
use finfo;

class manageprofileController extends UserRelatedController{

    private $uploadedImage = null;

    public function index()
    {
        $currentAction = "MANAGE_PROFILE";
        $this->setPageTitle("Manage My Profile");
        $injector = new UserManagerInjector();
        $userManager = (new UserManager())->getInstance($injector);
        if($userManager->isUserLoggedIn())
        {
            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);

            if($userManager->isUserAllowedToPerformAction($currentAction, $profile) === false)
            {
                $this->actionIsNotAllowed();
                $this->registry->template->loadView("content");
                return;
            }
            elseif($this->isPOSTRequest())
            {



                $email = ((isset($_POST['email']) && !is_null($_POST['email']) && strlen($_POST['email']) > 4 && !empty($_POST['email'])) ? $_POST['email'] : null);
                $fullName = ((isset($_POST['fname']) && !is_null($_POST['fname']) && strlen($_POST['fname']) > 4 && !empty($_POST['fname'])) ? $_POST['fname'] : null);
                $profileData = ((isset($_POST['profile']) && !is_null($_POST['profile']) && strlen($_POST['profile']) > 4 && !empty($_POST['profile'])) ? $_POST['profile'] : null);
                $oldPassword = ((isset($_POST['oldpass']) && !is_null($_POST['oldpass']) && strlen($_POST['oldpass']) > 4 && !empty($_POST['oldpass'])) ? $_POST['oldpass'] : null);
                $newPassword = ((isset($_POST['newpass']) && !is_null($_POST['newpass']) && strlen($_POST['newpass']) > 4 && !empty($_POST['newpass'])) ? $_POST['newpass'] : null);
                $updateUser = new User();
                $updateUser->setUserId($profile->getUserId());
                $updateUser->setPassword($oldPassword);
                $updateUser->hashPassword();

                if(!is_null($oldPassword) && $profile->getPassword() !== $updateUser->getPassword())
                {
                    $this->registry->template->error = "Password Mismatch, your current password does not match the one provided";
                }
                elseif(!is_null($oldPassword) && $profile->getPassword() === $updateUser->getPassword())
                {
                    $updateUser->setPassword($newPassword);
                    $updateUser->hashPassword();
                    $updateUser->setEmail($email);
                    $updateUser->setFullName($fullName);
                    $updateUser->setProfile($profileData);
                    if($this->uploader() === true)
                    {
                        $updateUser->setProfilePicture($this->uploadedImage);
                    }
                }
                else
                {
                    $updateUser->setEmail($email);
                    $updateUser->setFullName($fullName);
                    $updateUser->setProfile($profileData);
                    if($this->uploader() === true)
                    {
                        $updateUser->setProfilePicture($this->uploadedImage);
                    }
                }

                if($userManager->editUser($updateUser) === false)
                {
                    $this->registry->template->error  = "Failed to update your profile";
                }
                else
                {
                    $this->registry->template->success = "Congratulations your profile has been updated successfully";
                }

                $profile = null;

            }

            $user = new User();
            $user->setUserId($userManager->getCurrentSessionUserId());
            $profile = $userManager->getUser($user);
            //Template::dump($profile);
            if(is_null($profile->getProfilePicture()))
            {
                $profile->useDefaultProfilePicture();
            }
            $this->registry->template->profile = $profile;
            $this->registry->template->loadView("manageprofile");
            return;
        }

        header("Location: signin?profile=false");

    }


    public function uploader()
    {

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (!isset($_FILES['profilepicture']['error']) || is_array($_FILES['profilepicture']['error']))
            {
                throw new \RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['profilepicture']['error'] value.
            switch ($_FILES['profilepicture']['error']) {
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
            if ($_FILES['profilepicture']['size'] > 1000000) {
                throw new \RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $_FILES['profilepicture']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);

            if (false === $ext = array_search($finfo->file($_FILES['profilepicture']['tmp_name']),array('jpg' => 'image/jpeg','png' => 'image/png','gif' => 'image/gif',), true))
            {
                throw new \RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['profilepicture']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $data = sprintf(_SITE_PATH.'view'.DIRECTORY_SEPARATOR.'profile-pictures'.DIRECTORY_SEPARATOR.'%s.%s',sha1_file($_FILES['profilepicture']['tmp_name']),$ext);

            if (!move_uploaded_file($_FILES['profilepicture']['tmp_name'],$data))
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