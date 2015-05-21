<?php

use \utils\LoggerResolver;
use \service\UserService;

$container['LogerResolver'] = function($c) {
    return new LoggerResolver();
};

$container['UserService'] = function($c) {
    return new UserService($c['LogerResolver'], $c['userRepository']);
};