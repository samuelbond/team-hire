<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 30/01/15
 * Time: 17:03
 */

namespace component\blog;


use application\AbstractComponent;
use application\AbstractComponentInjector;
use component\blog\version\v1\BlogVersion1;

class Blog extends AbstractComponent{

    /**
     * Loads a component based on current version
     */
    protected function loadComponent()
    {
        switch($this->currentVersion)
        {
            case "1.0":
                self::$instance = new BlogVersion1();
                break;
            default:
                self::$instance = $this;
                break;
        }
    }

    /**
     * Returns an instance of the component
     * @param AbstractComponentInjector $componentInjector
     * @return null|$this|\component\blog\version\v1\BlogVersion1
     */
    public function getInstance(AbstractComponentInjector $componentInjector)
    {
        $this->loadComponent();
        $componentInjector->inject(self::$instance);
        return self::$instance;
    }
} 