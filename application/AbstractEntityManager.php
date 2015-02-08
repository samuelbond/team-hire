<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */

namespace application;


use model\DatabaseConfiguration;
use Doctrine\ORM\EntityManager;

/**
 * Class AbstractEntityManager
 * @package application
 */
class AbstractEntityManager {


    private   $dbName      = "my_database";
    private   $dbUser      = "root";
    private   $dbDriver    = "pdo_mysql";
    private   $dbPassword  = "root";
    private   $dbHost      = "localhost";
    private   $dbPort      = 3307;
    private   $entityPath  = null;
    private   $proxyPath   = null;
    private   $proxyNamespace  = null;
    private   $entityNamespace  = null;

    /**
     * Creates the entity manager
     * @return EntityManager
     */
    public function createEntityManager()
    {
        $databaseConfig = new DatabaseConfiguration();
        $this->dbName  = $databaseConfig->getDbName();
        $this->dbUser = $databaseConfig->getDbUsername();
        $this->dbPassword = $databaseConfig->getDbPassword();
        $this->dbHost = $databaseConfig->getHost();
        $this->dbPort = $databaseConfig->getPort();
        return $this->newConfig();
    }


    /**
     * Configures and creates a new EntityManager
     * @return EntityManager
     */
    public function newConfig()
    {
        $config = new \Doctrine\ORM\Configuration();

        // Proxy Configuration
        $config->setProxyDir($this->getProxyPath());
        $config->setProxyNamespace($this->getProxyNameSpace());
        $config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));
        //$config->setAutoGenerateProxyClasses(false);

        // Mapping Configuration
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/xml");
        //$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/yml");
        $driverImpl = $config->newDefaultAnnotationDriver($this->getEntityPath());
        $config->setMetadataDriverImpl($driverImpl);

        // Caching Configuration
        if (APPLICATION_ENV == "development") {
            $cache = new \Doctrine\Common\Cache\ArrayCache();
        } else {
            $cache = new \Doctrine\Common\Cache\ApcCache();
        }
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // obtaining the entity manager
        $evm = new \Doctrine\Common\EventManager();
        $entityManager = \Doctrine\ORM\EntityManager::create($this->getDbParam(), $config, $evm);

        // For generating entities From database
        $driverDb = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
            $entityManager->getConnection()->getSchemaManager()
        );
        $driverDb->setNamespace("model\\entities\\");
        $entityManager->getConfiguration()->setMetadataDriverImpl($driverDb);
        $cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($entityManager);

        return $entityManager;
    }


    /**
     * Gets the parameters of the database
     * @return array
     */
    public function getDbParam()
    {

        $dbParams = array(
            "driver"    => $this->dbDriver,
            "user"      => $this->dbUser,
            "password"  => $this->dbPassword,
            "dbname"    => $this->dbName,
             "host"     => $this->dbHost
        );

        return $dbParams;
    }

    /**
     * Gets the path to entities
     * @return array|null
     */
    public function getEntityPath()
    {
        if(!is_null($this->entityPath))
        {
            return $this->entityPath;
        }

        return array(_SITE_PATH."model".DIRECTORY_SEPARATOR."entities");
    }

    /**
     * Gets the path to entity proxies
     * @return array|null
     */
    public function getProxyPath()
    {
        if(!is_null($this->proxyPath))
        {
            return $this->proxyPath;
        }

        return _SITE_PATH."model".DIRECTORY_SEPARATOR."entities".DIRECTORY_SEPARATOR."proxy";
    }

    /**
     * Gets the namespace of entity proxies
     * @return null|string
     */
    public function getProxyNameSpace()
    {
        if(!is_null($this->proxyNamespace))
        {
            return $this->proxyNamespace;
        }

        return 'model\entities\proxy';
    }


    /**
     * Gets the namespace of entity proxies
     * @return null|array
     */
    public function getEntityNameSpace()
    {
        if(!is_null($this->entityNamespace))
        {
            return $this->entityNamespace;
        }

        return array('model\entities');
    }


    /**
     * @param string $dbDriver
     */
    public function setDbDriver($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    /**
     * @return string
     */
    public function getDbDriver()
    {
        return $this->dbDriver;
    }

    /**
     * @param string $dbHost
     */
    public function setDbHost($dbHost)
    {
        $this->dbHost = $dbHost;
    }

    /**
     * @return string
     */
    public function getDbHost()
    {
        return $this->dbHost;
    }

    /**
     * @param string $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @param string $dbPassword
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;
    }

    /**
     * @return string
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * @param string $dbUser
     */
    public function setDbUser($dbUser)
    {
        $this->dbUser = $dbUser;
    }

    /**
     * @return string
     */
    public function getDbUser()
    {
        return $this->dbUser;
    }

    /**
     * @param null $proxyNamespace
     */
    public function setProxyNamespace($proxyNamespace)
    {
        $this->proxyNamespace = $proxyNamespace;
    }

    /**
     * @param null $entityPath
     */
    public function setEntityPath($entityPath)
    {
        $this->entityPath = $entityPath;
    }

    /**
     * @param null $proxyPath
     */
    public function setProxyPath($proxyPath)
    {
        $this->proxyPath = $proxyPath;
    }





} 
