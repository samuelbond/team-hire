<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPageBlocks
 *
 * @ORM\Table(name="cms_page_blocks", indexes={@ORM\Index(name="fk_cms_page_blocks_1_idx", columns={"cms_page"})})
 * @ORM\Entity
 */
class CmsPageBlocks
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
     * @ORM\Column(name="block_title", type="string", length=45, nullable=false)
     */
    private $blockTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="block_content", type="text", nullable=true)
     */
    private $blockContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var \model\entities\CmsPages
     *
     * @ORM\ManyToOne(targetEntity="model\entities\CmsPages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cms_page", referencedColumnName="id")
     * })
     */
    private $cmsPage;


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
     * Set blockTitle
     *
     * @param string $blockTitle
     * @return CmsPageBlocks
     */
    public function setBlockTitle($blockTitle)
    {
        $this->blockTitle = $blockTitle;

        return $this;
    }

    /**
     * Get blockTitle
     *
     * @return string 
     */
    public function getBlockTitle()
    {
        return $this->blockTitle;
    }

    /**
     * Set blockContent
     *
     * @param string $blockContent
     * @return CmsPageBlocks
     */
    public function setBlockContent($blockContent)
    {
        $this->blockContent = $blockContent;

        return $this;
    }

    /**
     * Get blockContent
     *
     * @return string 
     */
    public function getBlockContent()
    {
        return $this->blockContent;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CmsPageBlocks
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
     * Set cmsPage
     *
     * @param \model\entities\CmsPages $cmsPage
     * @return CmsPageBlocks
     */
    public function setCmsPage(\model\entities\CmsPages $cmsPage = null)
    {
        $this->cmsPage = $cmsPage;

        return $this;
    }

    /**
     * Get cmsPage
     *
     * @return \model\entities\CmsPages 
     */
    public function getCmsPage()
    {
        return $this->cmsPage;
    }
}
