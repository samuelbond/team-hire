<?php
/**
 * @author Samuel I Amaziro
 */

namespace application;

/**
 * Class AbstractComponent
 * @package application
 */
Abstract Class AbstractComponent
{
    /**
     * @var string
     */
    protected  $currentVersion = "1.0";
    /**
     * @var null|AbstractComponent
     */
    protected static $instance = null;
    /**
     * @var null|AbstractDAO
     */
    protected $dao;
    /**
     * Contains needed parameters passed to component
     * @var null|array
     */
    protected  static $configuration;
    /**
     * @var AbstractComponentInjector $componentInjector
     */
    protected static $injector;



    /**
     * Loads a component based on current version
     * @return void
     */
    abstract protected function loadComponent();

    /**
     * Configures a component based on the component injector and returns an instance of the component
     * @param AbstractComponentInjector $componentInjector
     * @return null|$this
     */
    abstract public function getInstance(AbstractComponentInjector $componentInjector);

    /**
     * Returns an instance of already created component
     * @return AbstractComponent|null
     */
    public static function getComponentInstance()
    {
        return self::$instance;
    }

    /**
     * Gets the current version of the component
     * @return string
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }
    /**
     * Returns an array of available versions for a component
     * @return array
     */
    public function getAvailableVersions()
    {
        return array($this->getCurrentVersion());
    }
    /**
     * Sets the version to use if called before loadComponent to the provided version if on the list of available versions
     * @param $version
     */
    public function setCurrentVersion($version)
    {
        if(in_array($version, $this->getAvailableVersions()))
        {
            $this->currentVersion = $version;
        }
    }

    /**
     * @param AbstractDAO|null $dao
     */
    public function setDao($dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param array|null $configuration
     */
    public static function setConfiguration($configuration)
    {
        self::$configuration = $configuration;
    }



}