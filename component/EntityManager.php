<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 15/07/14
 * Time: 14:11
 */

namespace component;


use application\AbstractEntityManager;
use application\BaseEntityManager;

class EntityManager implements BaseEntityManager{

    /**
     * @var null|\Doctrine\ORM\EntityManager
     */
    private static $entityManagerInstance = null;

    public function reconfigure()
    {
        $em = new AbstractEntityManager();
        return $em;
    }

    public static function createEntityManager()
    {
        if(!EntityManager::$entityManagerInstance)
        {
            $em = new EntityManager();
            self::$entityManagerInstance = $em->reconfigure()->createEntityManager();
            return self::$entityManagerInstance;
        }

        return self::$entityManagerInstance;
    }

    public static function closeEntityManager()
    {
        $em = self::$entityManagerInstance;

        if($em !== null)
        {
            $em->close();
            self::$entityManagerInstance = null;
        }
    }
} 