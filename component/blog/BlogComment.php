<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:25
 */

namespace component\blog;


class BlogComment {

    private $commentId;
    private $comment;
    private $commentAuthor;
    private $commentAuthorEmail;
    private $blogEntryId;
    private $status;
    private $dateCreated;
    private $blogEntry;

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $commentAuthor
     */
    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;
    }

    /**
     * @return mixed
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    /**
     * @param mixed $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param mixed $blogEntryId
     */
    public function setBlogEntryId($blogEntryId)
    {
        $this->blogEntryId = $blogEntryId;
    }

    /**
     * @return mixed
     */
    public function getBlogEntryId()
    {
        return $this->blogEntryId;
    }

    /**
     * @param mixed $commentAuthorEmail
     */
    public function setCommentAuthorEmail($commentAuthorEmail)
    {
        $this->commentAuthorEmail = $commentAuthorEmail;
    }

    /**
     * @return mixed
     */
    public function getCommentAuthorEmail()
    {
        return $this->commentAuthorEmail;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $blogEntry
     */
    public function setBlogEntry($blogEntry)
    {
        $this->blogEntry = $blogEntry;
    }

    /**
     * @return mixed
     */
    public function getBlogEntry()
    {
        return $this->blogEntry;
    }



} 