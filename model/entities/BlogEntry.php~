<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogEntry
 *
 * @ORM\Table(name="blog_entry", uniqueConstraints={@ORM\UniqueConstraint(name="entry_id_UNIQUE", columns={"entry_id"})}, indexes={@ORM\Index(name="fk_blog_1_idx", columns={"entry_category"})})
 * @ORM\Entity
 */
class BlogEntry
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
     * @ORM\Column(name="entry_id", type="string", length=45, nullable=false)
     */
    private $entryId;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_title", type="string", length=255, nullable=false)
     */
    private $entryTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_cover", type="string", length=255, nullable=true)
     */
    private $entryCover;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_author", type="string", length=45, nullable=true)
     */
    private $entryAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="entry", type="text", nullable=false)
     */
    private $entry;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \model\entities\BlogEntryCategory
     *
     * @ORM\ManyToOne(targetEntity="model\entities\BlogEntryCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entry_category", referencedColumnName="id")
     * })
     */
    private $entryCategory;


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
     * Set entryId
     *
     * @param string $entryId
     * @return BlogEntry
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;

        return $this;
    }

    /**
     * Get entryId
     *
     * @return string 
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * Set entryTitle
     *
     * @param string $entryTitle
     * @return BlogEntry
     */
    public function setEntryTitle($entryTitle)
    {
        $this->entryTitle = $entryTitle;

        return $this;
    }

    /**
     * Get entryTitle
     *
     * @return string 
     */
    public function getEntryTitle()
    {
        return $this->entryTitle;
    }

    /**
     * Set entryCover
     *
     * @param string $entryCover
     * @return BlogEntry
     */
    public function setEntryCover($entryCover)
    {
        $this->entryCover = $entryCover;

        return $this;
    }

    /**
     * Get entryCover
     *
     * @return string 
     */
    public function getEntryCover()
    {
        return $this->entryCover;
    }

    /**
     * Set entryAuthor
     *
     * @param string $entryAuthor
     * @return BlogEntry
     */
    public function setEntryAuthor($entryAuthor)
    {
        $this->entryAuthor = $entryAuthor;

        return $this;
    }

    /**
     * Get entryAuthor
     *
     * @return string 
     */
    public function getEntryAuthor()
    {
        return $this->entryAuthor;
    }

    /**
     * Set entry
     *
     * @param string $entry
     * @return BlogEntry
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return string 
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return BlogEntry
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
     * @return BlogEntry
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
     * Set entryCategory
     *
     * @param \model\entities\BlogEntryCategory $entryCategory
     * @return BlogEntry
     */
    public function setEntryCategory(\model\entities\BlogEntryCategory $entryCategory = null)
    {
        $this->entryCategory = $entryCategory;

        return $this;
    }

    /**
     * Get entryCategory
     *
     * @return \model\entities\BlogEntryCategory 
     */
    public function getEntryCategory()
    {
        return $this->entryCategory;
    }
}
