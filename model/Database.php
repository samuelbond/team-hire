<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 08/07/14
 * Time: 15:52
 */

namespace model;


class Database {

    private $dbName;
    private $dbUsername;
    private $dbPassword;
    private $dbDriver;
    private $host;
    private $port;
    private $databaseType = "mysql";

    function __construct($dbDriver, $dbName, $dbPassword, $dbUsername, $host, $port = 3306)
    {
        $this->dbDriver = $dbDriver;
        $this->dbName = $dbName;
        $this->dbPassword = $dbPassword;
        $this->dbUsername = $dbUsername;
        $this->host = $host;
        $this->port = $port;
    }


    /**
     * @param mixed $dbDriver
     */
    public function setDbDriver($dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    /**
     * @return mixed
     */
    public function getDbDriver()
    {
        return $this->dbDriver;
    }

    /**
     * @param mixed $dbName
     */
    public function setDbName($dbName)
    {
        $this->dbName = $dbName;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @param mixed $dbPassword
     */
    public function setDbPassword($dbPassword)
    {
        $this->dbPassword = $dbPassword;
    }

    /**
     * @return mixed
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * @param mixed $dbUsername
     */
    public function setDbUsername($dbUsername)
    {
        $this->dbUsername = $dbUsername;
    }

    /**
     * @return mixed
     */
    public function getDbUsername()
    {
        return $this->dbUsername;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $databaseType
     */
    public function setDatabaseType($databaseType)
    {
        $this->databaseType = $databaseType;
    }

    /**
     * @return mixed
     */
    public function getDatabaseType()
    {
        return $this->databaseType;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }




} 