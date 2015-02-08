<?php
/**
 * @author Samuel I Amaziro
 */

namespace component\blog;


use application\AbstractComponent;
use application\AbstractComponentInjector;
use component\EntityManager;

class BlogInjector extends AbstractComponentInjector{
    private static $configuration;
    /**
     * @var null|string
     */
    private $daoType = "doctrine";
    /**
     * @param array $parameters
     * @throws \Exception
     */
    public function needed(array $parameters)
    {
        self::$configuration = $parameters;
    }

    /**
     * Injects dependency to component
     * @param AbstractComponent $component
     * @return void
     */
    public function inject(AbstractComponent $component)
    {
        switch($this->daoType)
        {
            case "doctrine":
                $dao = new DoctrineDAO();
                $dao->setEntityManager(EntityManager::createEntityManager());
                $component->setDao($dao);
                break;
        }
        $component::setConfiguration(self::$configuration);
    }
    /**
     * Sets the type of DAO(Data Access Object) a component should use
     * @param $type
     * @return mixed
     */
    public function setDAO($type)
    {
        $this->daoType = $type;
    }
}