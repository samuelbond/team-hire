<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 17/10/14
 * Time: 14:46
 */

namespace model;


class DatabaseConfiguration {

    private $host;
    private $port;
    private $dbUsername;
    private $dbPassword;
    private $dbName;
    private $charSet;

    private $env = array(
        "local" => array(
            "host"          => "localhost",
            "port"          =>  "3307",
            "username"      => "teachcon_team",
            "password"      => "TcPL&o=Di&bJ",
            "database"      => "teachcon_team_hire",
            "charset"       => "latin1",
        ),

    );


    public function __construct()
    {
        $config = $this->getSelectEnvironmentConfig();
        $this->dbName = $config['database'];
        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->dbUsername = $config['username'];
        $this->dbPassword = $config['password'];
        $this->charSet = $config['charset'];
    }


    /**
     * @return mixed
     */
    public function getSelectEnvironmentConfig()
    {

        $config = $this->env['local'];

        return $config;

    }



    /**
     * @return mixed
     */
    public function getCharSet()
    {
        return $this->charSet;
    }

    /**
     * @return mixed
     */
    public function getDbUsername()
    {
        return $this->dbUsername;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return mixed
     */
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }



} 