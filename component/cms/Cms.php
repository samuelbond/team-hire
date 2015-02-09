<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 09/02/15
 * Time: 09:44
 */

namespace component\cms;


use application\AbstractComponent;
use application\AbstractComponentInjector;
use component\cms\version\v1\CmsV1;

class Cms extends AbstractComponent{
    /**
     * Loads a component based on current version
     */
    protected function loadComponent()
    {
        switch($this->currentVersion)
        {
            case "1.0":
                self::$instance = new CmsV1();
                break;
            default:
                self::$instance = $this;
                break;
        }
    }

    /**
     * Returns an instance of the component
     * @param AbstractComponentInjector $componentInjector
     * @return null|$this\CmsV1
     */
    public function getInstance(AbstractComponentInjector $componentInjector)
    {
        $this->loadComponent();
        $componentInjector->inject(self::$instance);
        return self::$instance;
    }
} 