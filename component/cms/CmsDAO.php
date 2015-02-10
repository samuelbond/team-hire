<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/02/15
 * Time: 09:48
 */

namespace component\cms;


use application\AbstractDAO;

abstract class CmsDAO extends AbstractDAO{

    /**
     * Provides a way to find a specific item
     * @param array $item
     * @throws |Exception
     * @return mixed
     */
    public function find(array $item)
    {
        throw new \Exception("Unsupported method");
    }

    /**
     * Fetches all pages
     * @return array
     */
    public abstract function fetchAllPages();

    /**
     * Fetch's a given page block
     * @param PageBlock $pageBlock
     * @return array
     */
    public abstract function fetchPageBlocks(PageBlock $pageBlock);

    /**
     * Fetches all menus
     * @return array
     */
    public abstract function fetchAllMenus();

    /**
     * Fetch's a given menu
     * @param Menu $menu
     * @return array
     */
    public abstract function fetchMenu(Menu $menu);

    /**
     * Fetch's a given page
     * @param Page $page
     * @return array
     */
    public abstract function fetchPage(Page $page);

    /**
     * Inserts a new page
     * @param Page $page
     * @return bool
     */
    public abstract function insertNewPage(Page $page);

    /**
     * Inserts a new menu
     * @param Menu $menu
     * @return bool
     */
    public abstract function insertNewMenu(Menu $menu);

    /**
     * Inserts a new page block
     * @param PageBlock $pageBlock
     * @return bool
     */
    public abstract function insertNewPageBlock(PageBlock $pageBlock);

    /**
     * Inserts a new menu type
     * @param MenuType $menuType
     * @return bool
     */
    public abstract function insertNewMenuType(MenuType $menuType);

    /**
     * Fetch's a given menu type
     * @param MenuType $menuType
     * @return array
     */
    public abstract function fetchMenuType(MenuType $menuType);

    /**
     * Fetches all menu types
     * @return array
     */
    public abstract function fetchAllMenuTypes();

    /**
     * Fetches all page blocks
     * @return array
     */
    public abstract function fetchAllPageBlocks();

} 