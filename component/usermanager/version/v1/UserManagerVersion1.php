<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:53
 */

namespace component\usermanager\version\v1;


use application\Template;
use component\usermanager\User;
use component\usermanager\UserManager;
use component\usermanager\UserManagerInterface;

class UserManagerVersion1 extends UserManager implements UserManagerInterface {

    private $actions = array(
        "CREATE_BLOG" => array("USER", "ADMIN"),
        "CREATE_USER" => array("ADMIN"),
        "MANAGE_USER" => array("ADMIN"),
        "MANAGE_ALL_BLOG" => array("ADMIN"),
        "MANAGE_BLOG" => array("WRITER", "ADMIN"),
        "MANAGE_PROFILE" => array("USER", "ADMIN"),
    );



    public function __construct()
    {
        @session_start();
    }

    /**
     * Log in a given user
     * @param User $user
     * @return bool
     */
    public function loginUser(User $user)
    {
        $userObj = $this->dao->getUser($user);
        if($userObj === null || is_object($userObj) && $userObj->getPassword() !== $user->getPassword() && $userObj->getEmail() !== $user->getEmail() )
        {
            return false;
        }
        $_SESSION['b_user_id'] = $userObj->getUserId();
        return true;
    }

    /**
     * Check if a given user is logged in
     * @param User $user
     * @return bool
     */
    public function isUserLoggedIn(User $user = null)
    {

        if(isset($_SESSION['b_user_id']))
        {
            if($user === null || $_SESSION['b_user_id'] === $user->getUserId())
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if a given user has the right to perform a specific action
     * @param $action
     * @param User $user
     * @return bool
     */
    public function isUserAllowedToPerformAction($action, User $user)
    {
        if(isset($this->actions[$action]))
        {
            if(in_array($user->getUserType(), $this->actions[$action]))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Logs out currently logged in user
     * @return bool
     */
    public function logOutUser()
    {
        if(isset($_SESSION['b_user_id']))
        {
            unset($_SESSION['b_user_id']);
            session_destroy();

            return true;
        }

        return false;
    }

    /**
     * Gets a given user
     * @param User $user
     * @return User
     */
    public function getUser(User $user)
    {
        if($user->getUserId() !== null)
        {
            $userObj = $this->dao->getUser($user);
            return $userObj;
        }

        return null;
    }

    /**
     * Gets all users
     * @return array
     */
    public function getAllUsers()
    {
        $result = $this->dao->getAllUsers();

        if(is_null($result) || (is_array($result) && sizeof($result) < 1))
        {
            return array();
        }

        return $result;
    }

    /**
     * Creates a new user
     * @param User $user
     * @return bool
     */
    public function createNewUser(User $user)
    {
        if($user->getEmail() === null || $user->getPassword() === null || $user->getFullName() === null )
        {
            return false;
        }

        $result = $this->dao->createANewUser($user);

        return $result;
    }

    /**
     * Edits a given user
     * @param User $user
     * @return bool
     */
    public function editUser(User $user)
    {
        return $this->dao->modifyUserDetails($user);
    }

    /**
     * Gets the id of the currently logged in user
     * @return null|string
     */
    public function getCurrentSessionUserId()
    {
        if(isset($_SESSION['b_user_id']))
        {
            return $_SESSION['b_user_id'];
        }

        return null;
    }


} 