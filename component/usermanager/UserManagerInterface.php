<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:48
 */

namespace component\usermanager;


interface UserManagerInterface {

    /**
     * Log in a given user
     * @param User $user
     * @return bool
     */
    public function loginUser(User $user);

    /**
     * Check if a given user is logged in
     * @param User $user
     * @return bool
     */
    public function isUserLoggedIn(User $user = null);

    /**
     * Checks if a given user has the right to perform a specific action
     * @param $action
     * @param User $user
     * @return bool
     */
    public function isUserAllowedToPerformAction($action, User $user);

    /**
     * Logs out currently logged in user
     * @return bool
     */
    public function logOutUser();

    /**
     * Gets a given user
     * @param User $user
     * @return User
     */
    public function getUser(User $user);

    /**
     * Gets all users
     * @return array
     */
    public function getAllUsers();

    /**
     * Creates a new user
     * @param User $user
     * @return bool
     */
    public function createNewUser(User $user);

    /**
     * Edits a given user
     * @param User $user
     * @return bool
     */
    public function editUser(User $user);

    /**
     * Gets the id of the currently logged in user
     * @return null|int
     */
    public function getCurrentSessionUserId();

} 