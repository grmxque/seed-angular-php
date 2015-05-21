<?php
use \controller\TestController;
use \controller\UserController;

$container['TestController'] = function($c) {
	$ctrl = new TestController();
    $ctrl->routeRegister();
	return $ctrl;
};

$container['UserController'] = function($c) {
    $ctrl = new UserController();
    $ctrl->routeRegister();
    return $ctrl;
};

$container ['TestController'];
$container ['UserController'];

