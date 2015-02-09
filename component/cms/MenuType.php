<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/02/15
 * Time: 11:36
 */

namespace component\cms;


class MenuType {

    private $id;
    private $type;

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

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


} 