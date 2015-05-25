<?php

require_once "backend\\config\\DbConfigurer.php";
require_once "backend\\config\\AppConfigurer.php";

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use config\DbConfigurer;
use config\AppConfigurer;

$appConfigurer = new AppConfigurer();
$dbConfigurer = new DbConfigurer();

return ConsoleRunner::createHelperSet($dbConfigurer->getEntityManager());