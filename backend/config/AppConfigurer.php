<?php

namespace config;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Registry;

class AppConfigurer {

    private $logger;

    public function __construct() {
        $this->configureLog();
    }

    private function configureLog(){
            $this->logger = new Logger('api');
            $this->logger->pushHandler(new RotatingFileHandler('backend/logs/log.log', 10, Logger::DEBUG));
            Registry::addLogger($this->logger);
    }

    public function configure(\Slim\Slim $app){
        $app->setName('api');
        $app->contentType ( 'application/json; charset=utf-8' );
        $app->response->headers->set ( 'Acces-Control-Allow-Origin', '*' );

        $app->config ( array (
            'debug' => true
        ) );
    }
} 