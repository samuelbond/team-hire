<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/02/15
 * Time: 11:18
 */

namespace component\cms;


use application\Template;
use Doctrine\ORM\EntityManager;
use model\entities\CmsMenus;
use model\entities\CmsMenuType;
use model\entities\CmsPageBlocks;
use model\entities\CmsPages;

class DoctrineDAO extends CmsDAO{

    /**
     * @var EntityManager
     */
    private $entityManager;

    private $currentEntity;

    /**
     * Fetches all pages
     * @return array
     */
    public function fetchAllPages()
    {
        try
        {
            $pages = $this->entityManager->getRepository("model\\entities\\CmsPages")->findAll();
            return $this->parsePages($pages);
        }
        catch(\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetch's a given page block
     * @param PageBlock $pageBlock
     * @return array
     */
    public function fetchPageBlocks(PageBlock $pageBlock)
    {
        try
        {
            $block = $this->entityManager->getRepository("model\\entities\\CmsPageBlocks")->findBy(array("id" => $pageBlock->getId()));
            if(is_array($block) && sizeof($block) > 0)
            {
                $this->currentEntity = $block[0];
            }

            if(is_object($block))
            {
                $this->currentEntity = $block;
            }

            return $this->parsePageBlocks($block);
        }catch (\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetches all page blocks
     * @return array
     */
    public function fetchAllPageBlocks()
    {
        try
        {
            $blocks = $this->entityManager->getRepository("model\\entities\\CmsPageBlocks")->findAll();

            return $this->parsePageBlocks($blocks);
        }catch (\Exception $ex)
        {
            return array();
        }
    }


    /**
     * Fetches all menus
     * @return array
     */
    public function fetchAllMenus()
    {
        try
        {
            $menus = $this->entityManager->getRepository("model\\entities\\CmsMenus")->findAll();
            return $this->parseMenus($menus);
        }
        catch(\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetch's a given menu
     * @param Menu $menu
     * @return array
     */
    public function fetchMenu(Menu $menu)
    {
        try
        {
            $menus = $this->entityManager->getRepository("model\\entities\\CmsMenus")->findBy(array("id" => $menu->getId()));
            if(is_array($menus) && sizeof($menus) > 0)
            {
                $this->currentEntity = $menus[0];
            }

            if(is_object($menus))
            {
                $this->currentEntity = $menus;
            }

            return $this->parseMenus($menus);
        }catch (\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetch's a given page
     * @param Page $page
     * @return array
     */
    public function fetchPage(Page $page)
    {
        try
        {
            $pages = $this->entityManager->getRepository("model\\entities\\CmsPages")->findBy(array("id" => $page->getId()));

            if(is_array($pages) && sizeof($pages) > 0)
            {
                $this->currentEntity = $pages[0];
            }

            if(is_object($pages))
            {
                $this->currentEntity = $pages;
            }

            return $this->parsePages($pages);
        }
        catch(\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetch's a given menu type
     * @param MenuType $menuType
     * @return array
     */
    public function fetchMenuType(MenuType $menuType)
    {
        try
        {
            $menus = $this->entityManager->getRepository("model\\entities\\CmsMenuType")->findBy(array("id" => $menuType->getId()));

            if(is_array($menus) && sizeof($menus) > 0)
            {
                $this->currentEntity = $menus[0];
            }

            if(is_object($menus))
            {
                $this->currentEntity = $menus;
            }

            return $this->parseMenuTypes($menus);
        }
        catch(\Exception $ex)
        {
            return array();
        }
    }

    /**
     * Fetches all menu types
     * @return array
     */
    public function fetchAllMenuTypes()
    {
        try
        {
            $menus = $this->entityManager->getRepository("model\\entities\\CmsMenuType")->findAll();
            return $this->parseMenuTypes($menus);
        }
        catch(\Exception $ex)
        {
            return array();
        }
    }


    /**
     * Inserts a new page
     * @param Page $page
     * @return bool
     */
    public function insertNewPage(Page $page)
    {
        try
        {
            $obj = new CmsPages();
            $obj->setDateCreated(new \DateTime());
            $obj->setPageTitle($page->getTitle());
            $obj->setStatus(0);
            $mt = new Menu();
            $mt->setId($page->getMenu());
            $this->fetchMenu($mt);
            $obj->setCmsMenu($this->currentEntity);
            $obj->setPageContent($page->getContent());
            $this->entityManager->persist($obj);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Inserts a new menu
     * @param Menu $menu
     * @return bool
     */
    public function insertNewMenu(Menu $menu)
    {
        try
        {
            $obj = new CmsMenus();
            $mt = new MenuType();
            $mt->setId($menu->getType());
            $this->fetchMenuType($mt);
            $obj->setMenuType($this->currentEntity);
            $obj->setStatus(0);
            $obj->setMenuLink($menu->getLink());
            $obj->setMenuTitle($menu->getTitle());
            $obj->setMenuOrder($menu->getOrder());
            $this->entityManager->persist($obj);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Inserts a new page block
     * @param PageBlock $pageBlock
     * @return bool
     */
    public function insertNewPageBlock(PageBlock $pageBlock)
    {
        try
        {
            $obj = new CmsPageBlocks();
            $obj->setStatus(0);
            $obj->setBlockContent($pageBlock->getContent());
            $obj->setBlockTitle($pageBlock->getTitle());
            $pb = new Page();
            $pb->setId($pageBlock->getPage());
            $this->fetchPage($pb);
            $obj->setCmsPage($this->currentEntity);
            $this->entityManager->persist($obj);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Inserts a new menu type
     * @param MenuType $menuType
     * @return bool
     */
    public function insertNewMenuType(MenuType $menuType)
    {
        try
        {
            $obj = new CmsMenuType();
            $obj->setMenuType($menuType->getType());
            $this->entityManager->persist($obj);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Update a given menu
     * @param Menu $menu
     * @return bool
     */
    public function updateMenu(Menu $menu)
    {
        try
        {
            $this->fetchMenu($menu);
            $menuEntity = $this->currentEntity;

            if(!is_null($menu->getTitle()))
            {
                $menuEntity->setMenuTitle($menu->getTitle());
            }

            if(!is_null($menu->getLink()))
            {
                $menuEntity->setMenuLink($menu->getLink());
            }

            if(!is_null($menu->getOrder()))
            {
                $menuEntity->setMenuOrder($menu->getOrder());
            }

            if(!is_null($menu->getStatus()))
            {
                $menuEntity->setStatus($menu->getStatus());
            }


            $this->entityManager->merge($menuEntity);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Update a given menu type
     * @param MenuType $menuType
     * @return bool
     */
    public function updateMenuType(MenuType $menuType)
    {
        try
        {
            $this->fetchMenuType($menuType);
            $menuTypeEntity = $this->currentEntity;

            if(!is_null($menuType->getType()))
            {
                $menuTypeEntity->setMenuType($menuType->getType());
            }

            $this->entityManager->merge($menuTypeEntity);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Update a given page
     * @param Page $page
     * @return bool
     */
    public function updatePage(Page $page)
    {
        try
        {
            $this->fetchPage($page);
            $pageEntity = $this->currentEntity;

            if(!is_null($page->getTitle()))
            {
                $pageEntity->setPageTitle($page->getTitle());
            }

            if(!is_null($page->getContent()))
            {
                $pageEntity->setPageContent($page->getContent());
            }

            if(!is_null($page->getStatus()))
            {
                $pageEntity->setStatus($page->getStatus());
            }

            $this->entityManager->merge($pageEntity);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
        {
            return false;
        }
    }

    /**
     * Update a given page block
     * @param PageBlock $block
     * @return bool
     */
    public function updatePageBlock(PageBlock $block)
    {
        try
        {
            $this->fetchPageBlocks($block);
            $pageBlockEntity = $this->currentEntity;

            if(!is_null($block->getTitle()))
            {
                $pageBlockEntity->setBlockTitle($block->getTitle());
            }

            if(!is_null($block->getContent()))
            {
                $pageBlockEntity->setBlockContent($block->getContent());
            }

            if(!is_null($block->getStatus()))
            {
                $pageBlockEntity->setStatus($block->getStatus());
            }

            $this->entityManager->merge($pageBlockEntity);
            $this->entityManager->flush();
            return true;
        }
        catch(\Exception $ex)
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


    protected function parsePages($pages)
    {
        $output = array();

        if(is_object($pages))
        {
            $output[] = array(
                "id" => $pages->getId(),
                "title" => $pages->getPageTitle(),
                "content" => $pages->getPageContent(),
                "status" => $pages->getStatus(),
                "menu" => $pages->getCmsMenu()->getMenuTitle(),
                "menu_id" => $pages->getCmsMenu()->getId(),
                "date_created" => $pages->getDateCreated()->format('g:ia \o\n l jS F Y'),
            );
        }else
        {
            foreach($pages as $page)
            {
                $output[] = array(
                    "id" => $page->getId(),
                    "title" => $page->getPageTitle(),
                    "content" => $page->getPageContent(),
                    "status" => $page->getStatus(),
                    "menu" => $page->getCmsMenu()->getMenuTitle(),
                    "menu_id" => $page->getCmsMenu()->getId(),
                    "date_created" => $page->getDateCreated()->format('g:ia \o\n l jS F Y'),
                );
            }
        }

        return $output;
    }

    protected function parsePageBlocks($blocks)
    {
        $output = array();

        if(is_object($blocks))
        {
            $output[] = array(
                "id" => $blocks->getId(),
                "title" => $blocks->getBlockTitle(),
                "content" => $blocks->getBlockContent(),
                "status" => $blocks->getStatus(),
                "page" => $blocks->getCmsPage()->getPageTitle(),
                "page_id" => $blocks->getCmsPage()->getId(),
            );
        }else
        {
            foreach($blocks as $block)
            {
                $output[] = array(
                    "id" => $block->getId(),
                    "title" => $block->getBlockTitle(),
                    "content" => $block->getBlockContent(),
                    "status" => $block->getStatus(),
                    "page" => $block->getCmsPage()->getPageTitle(),
                    "page_id" => $block->getCmsPage()->getId(),
                );
            }
        }

        return $output;
    }

    protected function parseMenus($menus)
    {
        $output = array();

        if(is_object($menus))
        {
            $output[] = array(
                "id" => $menus->getId(),
                "title" => $menus->getMenuTitle(),
                "link" => $menus->getMenuLink(),
                "status" => $menus->getStatus(),
                "type" => $menus->getMenuType()->getMenuType(),
                "type_id" => $menus->getMenuType()->getId(),
                "order" => $menus->getMenuOrder(),
            );
        }else
        {
            foreach($menus as $menu)
            {
                $output[] = array(
                    "id" => $menu->getId(),
                    "title" => $menu->getMenuTitle(),
                    "link" => $menu->getMenuLink(),
                    "status" => $menu->getStatus(),
                    "type" => $menu->getMenuType()->getMenuType(),
                    "type_id" => $menu->getMenuType()->getId(),
                    "order" => $menu->getMenuOrder(),
                );
            }
        }

        return $output;
    }

    protected function parseMenuTypes($menus)
    {
        $output = array();

        if(is_object($menus))
        {
            $output[] = array(
                "id" => $menus->getId(),
                "title" => $menus->getMenuType(),
            );
        }else
        {
            foreach($menus as $menu)
            {
                $output[] = array(
                    "id" => $menu->getId(),
                    "title" => $menu->getMenuType(),
                );
            }
        }

        return $output;
    }

} 