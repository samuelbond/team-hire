<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/02/15
 * Time: 09:47
 */

namespace component\cms\version\v1;


use component\cms\Cms;
use component\cms\CMSInterface;
use component\cms\Menu;
use component\cms\MenuType;
use component\cms\Page;
use component\cms\PageBlock;

class CmsV1 extends Cms implements CMSInterface{

    /**
     * Creates a new cms item i.e (menu, page, block, e.t.c)  based on the object type
     * @param $object
     * @return bool
     */
    public function createNewCMSItem($object)
    {
        if($object instanceof MenuType)
        {
            return $this->dao->insertNewMenuType($object);
        }
        elseif($object instanceof Menu)
        {
            return $this->dao->insertNewMenu($object);
        }
        elseif($object instanceof Page)
        {
            return $this->dao->insertNewPage($object);
        }
        elseif($object instanceof PageBlock)
        {
            return $this->dao->insertNewPageBlock($object);
        }

        return false;
    }

    /**
     * Modifies an existing cms item i.e (menu, page, block, e.t.c)  based on the object type
     * @param $object
     * @return bool
     */
    public function modifyCMSItem($object)
    {
        if($object instanceof MenuType)
        {
            return $this->dao->updateMenuType($object);
        }
        elseif($object instanceof Menu)
        {
            return $this->dao->updateMenu($object);
        }
        elseif($object instanceof Page)
        {
            return $this->dao->updatePage($object);
        }
        elseif($object instanceof PageBlock)
        {
            return $this->dao->updatePageBlock($object);
        }

        return false;
    }

    /**
     * Gets all cms item based on the cms item object type
     * @param $cmsItemObject
     * @return array
     */
    public function getAllCMSItem($cmsItemObject)
    {
        if($cmsItemObject instanceof MenuType)
        {
            return $this->dao->fetchAllMenuTypes();
        }
        elseif($cmsItemObject instanceof Menu)
        {
            return $this->dao->fetchAllMenus();
        }
        elseif($cmsItemObject instanceof Page)
        {
            return $this->dao->fetchAllPages();
        }
        elseif($cmsItemObject instanceof PageBlock)
        {
            return $this->dao->fetchAllPageBlocks();
        }

        return array();
    }

    /**
     * Gets a specific cms item based on the parameters set in the cms item object
     * @param $cmsItemObject
     * @return array
     */
    public function getCMSItem($cmsItemObject)
    {
        if($cmsItemObject instanceof MenuType)
        {
            return $this->dao->fetchMenuType($cmsItemObject);
        }
        elseif($cmsItemObject instanceof Menu)
        {
            return $this->dao->fetchMenu($cmsItemObject);
        }
        elseif($cmsItemObject instanceof Page)
        {
            return $this->dao->fetchPage($cmsItemObject);
        }
        elseif($cmsItemObject instanceof PageBlock)
        {
            return $this->dao->fetchPageBlocks($cmsItemObject);
        }

        return array();
    }


} 