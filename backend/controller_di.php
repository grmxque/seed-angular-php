<?php
use \controller\TestController;

$container['TestController'] = function($c) {
	$ctrl = new TestController();
    $ctrl->routeRegister();
	return $ctrl;
};

$container ['TestController'];

