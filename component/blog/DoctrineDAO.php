<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 02/02/15
 * Time: 12:07
 */

namespace component\blog;


use application\Template;
use component\blog\BlogEntry;
use model\entities\BlogEntryCategory;
use model\entities\BlogEntryComment;
use model\entities\BlogSubscribers;
use model\entities\PublishAlerts;

class DoctrineDAO extends BlogDAO{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    private $currentEntity;

    /**
     * Creates a new blog entry
     * @param BlogEntry $blogEntry
     * @return bool
     */
    public function insertNewBlogEntry(BlogEntry $blogEntry)
    {
        $newBlogEntry = new \model\entities\BlogEntry();
        $id = $this->randomAlphaNumericGenerator(10);
        $newBlogEntry->setEntryId($id);
        $newBlogEntry->setEntryTitle($blogEntry->getEntryTitle());
        $category = new BlogCategory();
        $category->setCategoryId($blogEntry->getEntryCategory());
        $this->getEntryCategory($category);
        $newBlogEntry->setEntryCategory($this->currentEntity);
        $newBlogEntry->setEntry($blogEntry->getEntry());
        $newBlogEntry->setEntryAuthor($blogEntry->getEntryAuthor());
        $newBlogEntry->setEntryCover($blogEntry->getEntryCover());
        $newBlogEntry->setDateCreated(new \DateTime());


        try
        {

            $this->entityManager->persist($newBlogEntry);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Gets all blog entries belonging to a given author
     * @param $author
     * @return array
     */
    public function getAllBlogEntriesBelongingToAuthor($author)
    {
        try
        {
            $result = $this->entityManager->getRepository("model\\entities\\BlogEntry")->findBy(array("entryAuthor" => $author));
            return $this->rearrangeBlogEntry($result);
        }catch (\Exception $ex)
        {
            echo "exception ; ".$ex->getMessage();
            return array();
        }
    }


    /**
     * Searches for blog entries based on members which are set
     * @param BlogEntry $blogEntry
     * @return array
     */
    public function findBlogEntry(BlogEntry $blogEntry)
    {
        // TODO: Implement findBlogEntry() method.
    }

    /**
     * Gets a blog entry
     * @param $blogEntryId
     * @param bool $useAsEntryId
     * @return BlogEntry|null
     */
    public function getBlogEntry($blogEntryId, $useAsEntryId = false)
    {
        try
        {
            $default = "view".DIRECTORY_SEPARATOR."blog-covers".DIRECTORY_SEPARATOR."default.png";

            if($useAsEntryId === false)
            {
                $result = $this->entityManager->find("model\\entities\\BlogEntry", $blogEntryId);
            }
            else
            {
                $result = $this->entityManager->getRepository("model\\entities\\BlogEntry")->findBy(array("entryId" => $blogEntryId));
                $result = $result[0];
            }

            $entry = new BlogEntry();
            $entry->setEntryId($result->getEntryId());
            $entry->setId($result->getId());
            $entry->setEntry($result->getEntry());
            $entry->setEntryCover(((is_null($result->getEntryCover()) || strlen($result->getEntryCover()) < 5)  ? $default : $result->getEntryCover()));
            $entry->setEntryTitle($result->getEntryTitle());
            $entry->setEntryAuthor($result->getEntryAuthor());
            $entry->setEntryCategory($result->getEntryCategory());
            $entry->setEntryStatus($result->getStatus());
            $entry->setEntryDate($result->getDateCreated()->format('l jS F Y'));
            $this->currentEntity = $result;
            return $entry;
        }catch (\Exception $ex)
        {
            return null;
        }
    }

    /**
     * Modifies a given blog entry
     * @param BlogEntry $blogEntry
     * @return bool
     */
    public function modifyBlogEntry(BlogEntry $blogEntry)
    {
        $this->getBlogEntry($blogEntry->getId());
        $entry = $this->currentEntity;
        try
        {
            if(!is_object($entry))
            {
                return false;
            }

            if(!is_null($blogEntry->getEntryStatus()))
            {
                if(intval($entry->getStatus()) === intval($blogEntry->getEntryStatus()))
                {
                    return false;
                }
                $entry->setStatus($blogEntry->getEntryStatus());
            }
            else
            {
                $entry->setEntryTitle($blogEntry->getEntryTitle());
                $entry->setEntry($blogEntry->getEntry());
            }

            $this->entityManager->merge($entry);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }

    }

    /**
     * Adds a comment for a given blog entry
     * @param BlogEntry $blogEntry
     * @param BlogComment $blogComment
     * @return mixed
     */
    public function addCommentForBlogEntry(BlogEntry $blogEntry, BlogComment $blogComment)
    {
         $this->getBlogEntry($blogEntry->getId());

        try
        {
            $comment = new BlogEntryComment();
            $comment->setComment($blogComment->getComment());
            $comment->setEntry($this->currentEntity);
            $comment->setCommentorName($blogComment->getCommentAuthor());
            $comment->setCommentorEmail($blogComment->getCommentAuthorEmail());
            $comment->setDateCreated(new \DateTime());
            $this->entityManager->persist($comment);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }

    }

    /**
     * Gets all blog entries
     * @return array
     */
    public function getAllBlogEntry()
    {
        try
        {
            $result = $this->entityManager->getRepository("model\\entities\\BlogEntry")->findBy(array("status" => 1));
            return $this->rearrangeBlogEntry($result);
        }catch (\Exception $ex)
        {
            echo "exception ; ".$ex->getMessage();
            return array();
        }
    }

    /**
     * Gets all blog entries in a given category
     * @param $entryCategory
     * @return array
     */
    public function getEntryInCategory($entryCategory)
    {
        try
        {
            $query = $this->entityManager->createQuery("SELECT u, p FROM model\\entities\\BlogEntry u JOIN u.entryCategory p  WHERE u.status = 1 AND p.id = ".$entryCategory);
            $objArray = $query->getResult();
            return $this->rearrangeBlogEntry($objArray);
        }catch (\Exception $ex)
        {
            echo "exception ; ".$ex->getMessage();
            return array();
        }
    }

    /**
     * Search for a given term in all blog entries
     * @param $searchTerm
     * @return mixed
     */
    public function searchBlog($searchTerm)
    {
        try
        {
            $query = $this->entityManager->getRepository("model\\entities\\BlogEntry")->createQueryBuilder("b")
            ->where("b.entryTitle LIKE :title")
            ->orWhere("b.entry LIKE :bEntry")
            ->setParameter("title", "%".trim($searchTerm)."%")
            ->setParameter("bEntry", "%".trim($searchTerm)."%");

            $objArray = $query->getQuery()->getResult();
            return $this->rearrangeBlogEntry($objArray);
        }catch (\Exception $ex)
        {
            echo "exception ; ".$ex->getMessage();
            return array();
        }
    }


    /**
     * Delete a given blog entry
     * @param BlogEntry $blogEntry
     * @return bool
     */
    public function deleteBlogEntry(BlogEntry $blogEntry)
    {
        // TODO: Implement deleteBlogEntry() method.
    }

    /**
     * Publish a comment so it can be visible
     * @param BlogComment $blogComment
     * @return bool
     */
    public function publishBlogEntryComment(BlogComment $blogComment)
    {
        $this->getComment($blogComment->getCommentId());
        $comment = $this->currentEntity;

        try
        {
            $comment->setStatus($blogComment->getStatus());
            $this->entityManager->merge($comment);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    public function getComment($commentId)
    {
        try
        {
            $comment = $this->entityManager->find("model\\entities\\BlogEntryComment", $commentId);
            $blogComment = new BlogComment();
            $blogComment->setStatus($comment->getStatus());
            $blogComment->setComment($comment->getComment());
            $blogComment->setCommentId($comment->getId());
            $blogComment->setBlogEntryId($comment->getEntry()->getId());
            $blogComment->setCommentAuthor($comment->getCommentorName());
            $blogComment->setCommentAuthorEmail($comment->getCommentorEmail());
            $blogComment->setDateCreated($comment->getDateCreated()->format('l jS F Y'));
            $blogComment->setBlogEntry($comment->getEntry());
            $this->currentEntity = $comment;
            return $blogComment;
        }catch (\Exception $ex)
        {
            echo $ex->getMessage();
            return null;
        }
    }

    /**
     * @param $email
     * @return mixed
     */
    public function addNewBlogSubscriber($email)
    {
        $subscribe = new BlogSubscribers();
        $subscribe->setEmail($email);
        $subscribe->setDateCreated(new \DateTime());
        try
        {
            $this->entityManager->persist($subscribe);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }
    }


    /**
     * Publish a given blog entry
     * @param BlogEntry $blogEntry
     * @return bool
     */
    public function publishBlogEntry(BlogEntry $blogEntry)
    {
        $this->getBlogEntry($blogEntry->getId());
        $entry = $this->currentEntity;
        $alert = $this->getAlert($entry);

        if(!is_object($alert))
        {
            return false;
        }
        $alert->getEntry()->setStatus(1);
        $alert->setStatus(1);
        try
        {
            $this->entityManager->merge($alert);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }
    }


    /**
     * @param mixed $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Gets a category
     * @param BlogCategory $category
     * @return BlogCategory
     */
    public function getEntryCategory(BlogCategory $category)
    {
       try
       {
           $obj = $this->entityManager->find("model\\entities\\BlogEntryCategory", $category->getCategoryId());
           $category = null;
           $category = new BlogCategory();
           $category->setCategory($obj->getCategory());
           $category->setCategoryId($obj->getId());
           $this->currentEntity = $obj;
           return $category;
       }catch (\Exception $ex)
       {
           return null;
       }
    }

    /**
     * Create a new blog entry category
     * @param BlogCategory $category
     * @return mixed
     */
    public function insertNewBlogEntryCategory(BlogCategory $category)
    {
        $newCategory = new BlogEntryCategory();
        $newCategory->setCategory($category->getCategory());

        try
        {

            $this->entityManager->persist($newCategory);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }
    }

    /**
     *  Save a new Publish Request for a given blog entry
     * @param BlogEntry $blogEntry
     * @return bool
     */
    public function insertPublishRequest(BlogEntry $blogEntry)
    {
        $this->getBlogEntry($blogEntry->getId());
        $entry = $this->currentEntity;
        if(is_object($this->getAlert($entry)))
        {
            return true;
        }
        $alert = new PublishAlerts();
        $alert->setStatus(0);
        $alert->setEntry($entry);

        try
        {
            $this->entityManager->persist($alert);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $ex)
        {
            return false;
        }
    }


    /**
     * Gets all category
     * @return array
     */
    public function getAllEntryCategory()
    {
        try
        {
            $objArray = $this->entityManager->getRepository("model\\entities\\BlogEntryCategory")->findAll();
            return $this->rearrangeCategories($objArray);
        }catch (\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Gets all blog entries with a publish request
     * @return array
     */
    public function getAllBlogToPublish()
    {
        try
        {
            $objArray = $this->entityManager->getRepository("model\\entities\\PublishAlerts")->findBy(array("status" => 0));
            return $this->rearrangePublishAlert($objArray);
        }catch (\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Gets all comment to be publish
     * @param $author
     * @return array
     */
    public function getAllCommentToPublish($author)
    {
        try
        {
            $query = $this->entityManager->createQuery("SELECT u, p FROM model\\entities\\BlogEntryComment u JOIN u.entry p  WHERE u.status = 0 AND p.entryAuthor = ".$author);
            $objArray = $query->getResult();
            return $this->rearrangeToPublishComment($objArray);
        }catch (\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Gets blog comments
     * @param $blogId
     * @return array
     */
    public function getBlogComments($blogId)
    {
        try
        {
            $query = $this->entityManager->createQuery("SELECT u, p FROM model\\entities\\BlogEntryComment u JOIN u.entry p  WHERE u.status = 1 AND p.id = ".$blogId);
            $objArray = $query->getResult();
            return $this->rearrangeToPublishComment($objArray);
        }catch (\Exception $ex)
        {
            return array();
        }
    }


    protected function getAlert($entry)
    {
        try
        {
            $objArray = $this->entityManager->getRepository("model\\entities\\PublishAlerts")->findBy(array("entry" => $entry));
            if(is_array($objArray) && sizeof($objArray) > 0)
            {
                return $objArray[0];
            }
            return null;
        }catch (\Exception $ex)
        {
            return array();
        }
    }


    public function randomAlphaNumericGenerator($length)
    {
        srand ((double) microtime() * 10000000);
        $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
            "R","S","T","U","V","W","X","Y","Z");
        $random_generator="";
        for($i=1;$i<$length+1;$i++)
        {
            if(rand(1,2) == 1)
            {
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index];
            }
            else
            {
                $random_generator .=rand(1,10);
            }
        }
        return $random_generator;
    }


    protected function rearrangeCategories($categoryEntityArray)
    {
        $result = array();

        if(is_array($categoryEntityArray) && sizeof($categoryEntityArray) > 0)
        {
            foreach($categoryEntityArray as $category)
            {
                $result[] = array(
                    "id" => $category->getId(),
                    "category" => $category->getCategory(),
                );
            }
        }

        return $result;
    }

    protected function rearrangeBlogEntry($blogEntryEntityArray)
    {
        $result = array();
        $default = "view".DIRECTORY_SEPARATOR."blog-covers".DIRECTORY_SEPARATOR."default.png";
        if(is_array($blogEntryEntityArray) && sizeof($blogEntryEntityArray) > 0)
        {
            foreach($blogEntryEntityArray as $entry)
            {
                $result[] = array(
                    "id" => $entry->getId(),
                    "entry_id" => $entry->getEntryId(),
                    "title" => $entry->getEntryTitle(),
                    "cover" => ((is_null($entry->getEntryCover()) || strlen($entry->getEntryCover()) < 5) ? $default : $entry->getEntryCover()),
                    "author" => $entry->getEntryAuthor(),
                    "entry" => $entry->getEntry(),
                    "category_id" => $entry->getEntryCategory()->getId(),
                    "category" => $entry->getEntryCategory()->getCategory(),
                    "status" => $entry->getStatus(),
                    "date_created" => $entry->getDateCreated()->format('g:ia \o\n l jS F Y'),
                );
            }
        }
        return $result;
    }

    protected function rearrangePublishAlert($publishEntityArray)
    {
        $result = array();

        if(is_array($publishEntityArray) && sizeof($publishEntityArray) > 0)
        {
            foreach($publishEntityArray as $publish)
            {
                $result[] = array(
                    "id" => $publish->getId(),
                    "title" => $publish->getEntry()->getEntryTitle(),
                    "entry_id" => $publish->getEntry()->getId(),
                    "entryId" => $publish->getEntry()->getEntryId(),
                    "category" => $publish->getEntry()->getEntryCategory()->getCategory(),
                    "author" => $publish->getEntry()->getEntryAuthor(),
                    "date_created" => $publish->getEntry()->getDateCreated()->format('g:ia \o\n l jS F Y'),
                    "status" => $publish->getEntry()->getStatus(),
                );
            }
        }

        return $result;
    }


    protected function rearrangeToPublishComment($publishEntityArray)
    {
        $result = array();

        if(is_array($publishEntityArray) && sizeof($publishEntityArray) > 0)
        {
            foreach($publishEntityArray as $publish)
            {
                $result[] = array(
                    "id" => $publish->getId(),
                    "title" => $publish->getEntry()->getEntryTitle(),
                    "entry_id" => $publish->getEntry()->getId(),
                    "entryId" => $publish->getEntry()->getEntryId(),
                    "category" => $publish->getEntry()->getEntryCategory()->getCategory(),
                    "author" => $publish->getEntry()->getEntryAuthor(),
                    "commenter" => $publish->getCommentorName(),
                    "commenter_email" => $publish->getCommentorEmail(),
                    "comment" => $publish->getComment(),
                    "date_created" => $publish->getDateCreated()->format('g:ia \o\n l jS F Y'),
                    "status" => $publish->getStatus(),
                );
            }
        }

        return $result;
    }




} 