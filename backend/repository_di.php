<?php

use config\DbConfigurer;

$container['entityManager'] = function ($c){
    $dbConfigurer = new DbConfigurer();

    //die(var_dump($dbConfigurer->getEntityManager()));
    return $dbConfigurer->getEntityManager();
};

$container['entityManager'];