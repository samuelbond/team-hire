<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:16
 */

namespace component\blog;


class BlogEntry {
    private $id = null;
    private $entryId = null;
    private $entryTitle = null;
    private $entryDate = null;
    private $entryAuthor = null;
    private $entryCategory = null;
    private $entryCover = null;
    private $entry = null;
    private $entryComments = null;
    private $entryStatus = null;

    /**
     * @param mixed $entry
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;
    }

    /**
     * @return mixed
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param mixed $entryAuthor
     */
    public function setEntryAuthor($entryAuthor)
    {
        $this->entryAuthor = $entryAuthor;
    }

    /**
     * @return mixed
     */
    public function getEntryAuthor()
    {
        return $this->entryAuthor;
    }

    /**
     * @param mixed $entryComments
     */
    public function setEntryComments($entryComments)
    {
        $this->entryComments = $entryComments;
    }

    /**
     * @return mixed
     */
    public function getEntryComments()
    {
        return $this->entryComments;
    }

    /**
     * @param mixed $entryDate
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * @param mixed $entryTitle
     */
    public function setEntryTitle($entryTitle)
    {
        $this->entryTitle = $entryTitle;
    }

    /**
     * @return mixed
     */
    public function getEntryTitle()
    {
        return $this->entryTitle;
    }

    /**
     * @param mixed $entryId
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;
    }

    /**
     * @return mixed
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * @param mixed $entryCategory
     */
    public function setEntryCategory($entryCategory)
    {
        $this->entryCategory = $entryCategory;
    }

    /**
     * @return mixed
     */
    public function getEntryCategory()
    {
        return $this->entryCategory;
    }

    /**
     * @param mixed $entryCover
     */
    public function setEntryCover($entryCover)
    {
        $this->entryCover = $entryCover;
    }

    /**
     * @return mixed
     */
    public function getEntryCover()
    {
        return $this->entryCover;
    }

    /**
     * @param int $entryStatus
     */
    public function setEntryStatus($entryStatus)
    {
        $this->entryStatus = $entryStatus;
    }

    /**
     * @return int
     */
    public function getEntryStatus()
    {
        return $this->entryStatus;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function useDefaultCover()
    {
        $this->entryCover = "view".DIRECTORY_SEPARATOR."blog-covers".DIRECTORY_SEPARATOR."default.png";
    }

} 