<?php
/**
 * Created by PhpStorm.
 * User: geoffrey.polan
 * Date: 13/11/17
 * Time: 15:38
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
