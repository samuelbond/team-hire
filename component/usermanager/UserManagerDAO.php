<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:38
 */

namespace component\usermanager;


use application\AbstractDAO;

abstract class UserManagerDAO extends AbstractDAO{

    /**
     * Provides a way to find a specific item
     * @param array $item
     * @throws |Exception
     * @return mixed
     */
    public function find(array $item)
    {
        throw new \Exception("Unsupported method");
    }

    /**
     * Creates a new user
     * @param User $user
     * @return bool
     */
    public abstract function createANewUser(User $user);

    /**
     * Modifies a users account
     * @param User $user
     * @return bool
     */
    public abstract function modifyUserDetails(User $user);

    /**
     * Gets a given user
     * @param User $user
     * @return User
     */
    public abstract function getUser(User $user);

    /**
     * Finds a given user(s)
     * @param User $user
     * @return array
     */
    public abstract function findUser(User $user);

    /**
     * Deletes a given user
     * @param User $user
     * @return bool
     */
    public abstract function deleteUser(User $user);

    /**
     * Gets all users
     * @return array
     */
    public abstract function getAllUsers();

} 