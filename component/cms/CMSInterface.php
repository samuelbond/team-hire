<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 10/02/15
 * Time: 16:30
 */

namespace component\cms;


interface CMSInterface {

    /**
     * Creates a new cms item i.e (menu, page, block, e.t.c)  based on the object type
     * @param $object
     * @return bool
     */
    public function createNewCMSItem($object);

    /**
     * Modifies an existing cms item i.e (menu, page, block, e.t.c)  based on the object type
     * @param $object
     * @return bool
     */
    public function modifyCMSItem($object);

    /**
     * Gets all cms item based on the cms item object type
     * @param $cmsItemObject
     * @return array
     */
    public function getAllCMSItem($cmsItemObject);

    /**
     * Gets a specific cms item based on the parameters set in the cms item object
     * @param $cmsItemObject
     * @return array
     */
    public function getCMSItem($cmsItemObject);
} 