<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 20:54
 */

namespace component\usermanager;



use application\Template;
use component\EntityManager;
use model\entities\Users;
use model\entities\UserTypes;

class DoctrineDAO extends UserManagerDAO{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $currentEntity = null;

    /**
     * Creates a new user
     * @param User $user
     * @return bool
     */
    public function createANewUser(User $user)
    {
        $newUser = new Users();
        $newUser->setEmail($user->getEmail());
        $newUser->setFullname($user->getFullName());
        $newUser->setPassword($user->getPassword());
        $newUser->setProfile($user->getProfile());
        $newUser->setProfilePicture($user->getProfilePicture());
        $newUser->setStatus(0);
        $type = $this->getUserType(1);
        $newUser->setUserType($type);
        $newUser->setDateCreated(new \DateTime());

        try
        {
            $this->entityManager->persist($newUser);
            $this->entityManager->flush();
        }
        catch(\Exception $ex)
        {
            echo $ex->getMessage();
            return false;
        }

        return true;
    }

    /**
     * Modifies a users account
     * @param User $user
     * @return bool
     */
    public function modifyUserDetails(User $user)
    {
        $this->getUser($user);
        $userEntity = $this->currentEntity;

        if($userEntity === null)
        {
            return false;
        }

        if($user->getEmail() !== null)
        {
            $userEntity->setEmail($user->getEmail());
        }

        if($user->getProfilePicture() !== null)
        {
            $userEntity->setProfilePicture($user->getProfilePicture());
        }

        if($user->getProfile() !==  null)
        {
            $userEntity->setProfile($user->getProfile());
        }

        if($user->getPassword() !== null)
        {
            $userEntity->setPassword($user->getPassword());
        }

        if($user->getFullName() !== null)
        {
            $userEntity->setFullName($user->getFullName());
        }

        if($user->getStatus() !== null)
        {
            $userEntity->setStatus($user->getStatus());
        }

        try
        {
            $this->entityManager->merge($userEntity);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            echo $ex->getMessage();
            return false;
        }
    }

    /**
     * Gets a given user
     * @param User $user
     * @return User
     */
    public function getUser(User $user)
    {
        try
        {
            if(is_null($user->getUserId()) && !is_null($user->getEmail()))
            {
                $obj = $this->entityManager->getRepository("model\\entities\\Users")->findBy(array("email" => $user->getEmail()));
                $obj = ((is_array($obj) && sizeof($obj) > 0) ? $obj[0] : null);
            }
            else
            {
                $obj = $this->entityManager->find("model\\entities\\Users", $user->getUserId());
            }

            if(is_object($obj))
            {
                $user = null;
                $user = new User();
                $user->setEmail($obj->getEmail());
                $user->setProfile($obj->getProfile());
                $user->setFullName($obj->getFullname());
                $user->setProfilePicture($obj->getProfilePicture());
                $user->setUserId($obj->getUserId());
                $user->setUserType($obj->getUserType()->getUserRole());
                $user->setPassword($obj->getPassword());
                $user->setStatus($obj->getUserStatus());
                $this->currentEntity = $obj;
            }

            return $user;
        }
        catch(\Exception $ex)
        {
            echo $ex->getMessage();
            return null;
        }
    }


    /**
     * Gets a given user type
     * @param  $typeId
     * @return  \model\entities\UserTypes
     */
    public function getUserType($typeId)
    {
        try
        {
            $obj = $this->entityManager->find("model\\entities\\UserTypes", $typeId);

            return $obj;
        }
        catch(\Exception $ex)
        {
            return null;
        }
    }

    /**
     * Finds a given user(s)
     * @param User $user
     * @return array
     */
    public function findUser(User $user)
    {
        // TODO: Implement findUser() method.
    }

    /**
     * Deletes a given user
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user)
    {
        // TODO: Implement deleteUser() method.
    }

    /**
     * Gets all users
     * @return array
     */
    public function getAllUsers()
    {
        try
        {
            $obj = $this->entityManager->getRepository("model\\entities\\Users")->findAll();
            return $this->reArrangeEntityArray($obj);
        }
        catch(\Exception $ex)
        {
            echo $ex->getMessage();
            return array();
        }
    }

    /**
     * @param mixed $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }


    protected function reArrangeEntityArray(array $entityArray)
    {
        $result = array();

        if(sizeof($entityArray) > 0)
        {
            foreach($entityArray as $userEntity)
            {
                $result[] = array(
                    "fullname" => $userEntity->getFullname(),
                    "userid" => $userEntity->getUserId(),
                    "email" => $userEntity->getEmail(),
                    "status" => $userEntity->getStatus(),
                    "date_created" => $userEntity->getDateCreated()->format('g:ia \o\n l jS F Y'),
                );
            }
        }

        return $result;

    }



} 