<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsMenuType
 *
 * @ORM\Table(name="cms_menu_type")
 * @ORM\Entity
 */
class CmsMenuType
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
     * @ORM\Column(name="menu_type", type="string", length=45, nullable=false)
     */
    private $menuType;


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
     * Set menuType
     *
     * @param string $menuType
     * @return CmsMenuType
     */
    public function setMenuType($menuType)
    {
        $this->menuType = $menuType;

        return $this;
    }

    /**
     * Get menuType
     *
     * @return string 
     */
    public function getMenuType()
    {
        return $this->menuType;
    }
}
