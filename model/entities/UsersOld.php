<?php

namespace model\entities;

/**
 * Users
 *
 * @Table(name="users", uniqueConstraints={@UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@Index(name="fk_users_1_idx", columns={"user_type"})})
 * @Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @Column(name="fullname", type="string", length=45, nullable=false)
     */
    private $fullname;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="profile", type="text", nullable=true)
     */
    private $profile;

    /**
     * @var string
     *
     * @Column(name="profile_picture", type="string", length=255, nullable=true)
     */
    private $profilePicture;

    /**
     * @var integer
     *
     * @Column(name="user_status", type="integer", nullable=false)
     */
    private $userStatus = '0';

    /**
     * @var \model\entities\UserTypes
     *
     * @ManyToOne(targetEntity="UserTypes")
     * @JoinColumns({
     *   @JoinColumn(name="user_type", referencedColumnName="id")
     * })
     */
    private $userType;


    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     * @return Users
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set profile
     *
     * @param string $profile
     * @return Users
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set profilePicture
     *
     * @param string $profilePicture
     * @return Users
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return string 
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * Set userStatus
     *
     * @param integer $userStatus
     * @return Users
     */
    public function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    /**
     * Get userStatus
     *
     * @return integer 
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * Set userType
     *
     * @param \model\entities\UserTypes $userType
     * @return Users
     */
    public function setUserType(\model\entities\UserTypes $userType = null)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return \model\entities\UserTypes
     */
    public function getUserType()
    {
        return $this->userType;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;


    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Users
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}
