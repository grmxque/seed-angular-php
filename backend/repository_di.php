<?php

use config\DbConfigurer;
use repository\UserRepository;

$container['entityManager'] = function ($c){
    $dbConfigurer = new DbConfigurer();
    return $dbConfigurer->getEntityManager();
};

$container['userRepository'] = function($c){
    return new UserRepository($c['entityManager']);
};

$container['entityManager'];
$container['userRepository'];