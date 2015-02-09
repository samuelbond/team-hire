<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPages
 *
 * @ORM\Table(name="cms_pages", indexes={@ORM\Index(name="fk_cms_pages_1_idx", columns={"cms_menu"})})
 * @ORM\Entity
 */
class CmsPages
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
     * @ORM\Column(name="page_title", type="string", length=255, nullable=false)
     */
    private $pageTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="page_content", type="text", nullable=true)
     */
    private $pageContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \model\entities\CmsMenus
     *
     * @ORM\ManyToOne(targetEntity="model\entities\CmsMenus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cms_menu", referencedColumnName="id")
     * })
     */
    private $cmsMenu;


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
     * Set pageTitle
     *
     * @param string $pageTitle
     * @return CmsPages
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * Get pageTitle
     *
     * @return string 
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Set pageContent
     *
     * @param string $pageContent
     * @return CmsPages
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;

        return $this;
    }

    /**
     * Get pageContent
     *
     * @return string 
     */
    public function getPageContent()
    {
        return $this->pageContent;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CmsPages
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return CmsPages
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

    /**
     * Set cmsMenu
     *
     * @param \model\entities\CmsMenus $cmsMenu
     * @return CmsPages
     */
    public function setCmsMenu(\model\entities\CmsMenus $cmsMenu = null)
    {
        $this->cmsMenu = $cmsMenu;

        return $this;
    }

    /**
     * Get cmsMenu
     *
     * @return \model\entities\CmsMenus 
     */
    public function getCmsMenu()
    {
        return $this->cmsMenu;
    }
}
