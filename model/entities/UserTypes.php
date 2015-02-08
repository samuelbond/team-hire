<?php

namespace model\entities;


/**
 * UserTypes
 *
 * @Table(name="user_types", uniqueConstraints={@UniqueConstraint(name="user_role_UNIQUE", columns={"user_role"})})
 * @Entity
 */
class UserTypes
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="user_role", type="string", length=45, nullable=false)
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

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
