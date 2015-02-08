<?php

namespace model\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogEntryComment
 *
 * @ORM\Table(name="blog_entry_comment", indexes={@ORM\Index(name="fk_blog_entry_comment_1_idx", columns={"entry_id"})})
 * @ORM\Entity
 */
class BlogEntryComment
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
     * @ORM\Column(name="commentor_name", type="string", length=45, nullable=false)
     */
    private $commentorName;

    /**
     * @var string
     *
     * @ORM\Column(name="commentor_email", type="string", length=255, nullable=false)
     */
    private $commentorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \model\entities\BlogEntry
     *
     * @ORM\ManyToOne(targetEntity="model\entities\BlogEntry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entry_id", referencedColumnName="id")
     * })
     */
    private $entry;


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
     * Set commentorName
     *
     * @param string $commentorName
     * @return BlogEntryComment
     */
    public function setCommentorName($commentorName)
    {
        $this->commentorName = $commentorName;

        return $this;
    }

    /**
     * Get commentorName
     *
     * @return string 
     */
    public function getCommentorName()
    {
        return $this->commentorName;
    }

    /**
     * Set commentorEmail
     *
     * @param string $commentorEmail
     * @return BlogEntryComment
     */
    public function setCommentorEmail($commentorEmail)
    {
        $this->commentorEmail = $commentorEmail;

        return $this;
    }

    /**
     * Get commentorEmail
     *
     * @return string 
     */
    public function getCommentorEmail()
    {
        return $this->commentorEmail;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return BlogEntryComment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set entry
     *
     * @param \model\entities\BlogEntry $entry
     * @return BlogEntryComment
     */
    public function setEntry(\model\entities\BlogEntry $entry = null)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return \model\entities\BlogEntry 
     */
    public function getEntry()
    {
        return $this->entry;
    }
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
     * Set status
     *
     * @param integer $status
     * @return BlogEntryComment
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
     * @return BlogEntryComment
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
