<?php

use config\AppConfigurer;

/* ************************* SETTINGS SERVEUR ************************* */
session_cache_limiter(false);
session_start ();
ini_set ( 'default_charset', 'UTF-8' );
ini_set ( "memory_limit", - 1 );
set_time_limit ( 300 );
error_reporting ( E_ALL | E_STRICT );

/* ************************* COMPOSER (VENDORS) ************************* */
require 'backend/vendor/autoload.php';

/* ************************* REQUIRE ONCE ************************* */
// Config
include_once('backend/config.php');
// Utils
include_once('backend/utils.php');
// Repository
include_once('backend/repository.php');
// Services
include_once('backend/service.php');
// Controllers
include_once('backend/controller.php');
// Entities
include_once('backend/entity.php');

/* ************************* SLIM (API)************************* */
$app = new \Slim\Slim();

$appConfigurer = new AppConfigurer();
$appConfigurer->configure($app);

/* ************************* PIMPLE (DI) ************************* */
include_once('backend/pimple_di.php');
// Repository
include_once('backend/repository_di.php');
// Service
include_once('backend/service_di.php');
// Controller
include_once('backend/controller_di.php');

$app->run();