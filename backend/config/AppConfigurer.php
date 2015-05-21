<?php

namespace config;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Registry;
use config\TokenAuth;

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
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->headers->set ('Acces-Control-Allow-Origin','*');
        $app->add(new TokenAuth());

        $app->config ( array (
            'debug' => true
        ) );
    }
} 