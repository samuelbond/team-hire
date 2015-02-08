<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 03/02/15
 * Time: 13:41
 */

namespace application;


trait Paginator {

    private $maxResultPerPage = 10;
    private $currentPage;
    private $sizeOfItems;

    public function pagination(array $items, $currentPage = 1)
    {
        $this->setSizeOfItems($items);
        $this->setCurrentPage($currentPage);
        $resultSet = array_slice($items, $this->positionToStart(), $this->positionToEnd());
        return $resultSet;
    }

    public function getNumberOfTotalPages()
    {
        $this->sizeOfItems = ((is_null($this->sizeOfItems)) ? 0 : ($this->sizeOfItems+1));
        if($this->sizeOfItems !== 0)
        {
            $num = round(($this->sizeOfItems/$this->maxResultPerPage));

            return $num;
        }

        return $this->sizeOfItems;
    }

    private function positionToStart()
    {
        $start = $this->currentPage * $this->maxResultPerPage;
        return (($start > $this->sizeOfItems) ? $this->sizeOfItems : $start);
    }

    private function positionToEnd()
    {
        $start = $this->positionToStart();
        $last = $this->maxResultPerPage - 1;
        $end = $start + $last;
        $end = (($end > $this->sizeOfItems) ? $this->sizeOfItems : $end);
        $diff = $end - $start;

        if(($diff + 1) === $this->maxResultPerPage)
        {
            return $this->maxResultPerPage;
        }
        elseif(($diff + 1) < $this->maxResultPerPage)
        {
            return ($diff + 1);
        }
        else
        {
            return 0;
        }

    }

    private function setCurrentPage($page)
    {
        $this->currentPage = $page - 1;
    }

    private function setSizeOfItems($items)
    {
        $size = sizeof($items);
        $this->sizeOfItems = $size - 1;
    }

    /**
     * @param mixed $maxResultPerPage
     */
    public function setMaxResultPerPage($maxResultPerPage)
    {
        $this->maxResultPerPage = $maxResultPerPage;
    }



} 