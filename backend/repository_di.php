<?php

use config\DbConfigurer;

$container['entityManager'] = function ($c){
    $dbConfigurer = new DbConfigurer();
    return $dbConfigurer->getEntityManager();
};

$container['entityManager'];