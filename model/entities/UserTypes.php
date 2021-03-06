<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTypes
 *
 * @ORM\Table(name="user_types")
 * @ORM\Entity
 */
class UserTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_role", type="string", length=45, nullable=false)
     */
    private $userRole;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userRole
     *
     * @param string $userRole
     * @return UserTypes
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;

        return $this;
    }

    /**
     * Get userRole
     *
     * @return string 
     */
    public function getUserRole()
    {
        return $this->userRole;
    }
}
