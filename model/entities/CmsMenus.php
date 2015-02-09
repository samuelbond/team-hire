<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsMenus
 *
 * @ORM\Table(name="cms_menus", indexes={@ORM\Index(name="fk_cms_menus_1_idx", columns={"menu_type"})})
 * @ORM\Entity
 */
class CmsMenus
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
     * @ORM\Column(name="menu_title", type="string", length=45, nullable=false)
     */
    private $menuTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="menu_link", type="string", length=255, nullable=true)
     */
    private $menuLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="menu_order", type="integer", nullable=false)
     */
    private $menuOrder;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var \model\entities\CmsMenuType
     *
     * @ORM\ManyToOne(targetEntity="model\entities\CmsMenuType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_type", referencedColumnName="id")
     * })
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
     * Set menuTitle
     *
     * @param string $menuTitle
     * @return CmsMenus
     */
    public function setMenuTitle($menuTitle)
    {
        $this->menuTitle = $menuTitle;

        return $this;
    }

    /**
     * Get menuTitle
     *
     * @return string 
     */
    public function getMenuTitle()
    {
        return $this->menuTitle;
    }

    /**
     * Set menuLink
     *
     * @param string $menuLink
     * @return CmsMenus
     */
    public function setMenuLink($menuLink)
    {
        $this->menuLink = $menuLink;

        return $this;
    }

    /**
     * Get menuLink
     *
     * @return string 
     */
    public function getMenuLink()
    {
        return $this->menuLink;
    }

    /**
     * Set menuOrder
     *
     * @param integer $menuOrder
     * @return CmsMenus
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * Get menuOrder
     *
     * @return integer 
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CmsMenus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set menuType
     *
     * @param \model\entities\CmsMenuType $menuType
     * @return CmsMenus
     */
    public function setMenuType(\model\entities\CmsMenuType $menuType = null)
    {
        $this->menuType = $menuType;

        return $this;
    }

    /**
     * Get menuType
     *
     * @return \model\entities\CmsMenuType 
     */
    public function getMenuType()
    {
        return $this->menuType;
    }
}
