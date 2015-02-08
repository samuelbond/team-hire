<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */


require_once "bootstrap.php";
$entity = new \application\AbstractEntityManager();

$entityManager = $entity->createEntityManager();


$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager)));

return $helperSet;
//return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);