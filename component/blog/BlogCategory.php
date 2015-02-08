<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 02/02/15
 * Time: 12:45
 */

namespace component\blog;


class BlogCategory {

    private $categoryId;
    private $category;

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }



} 