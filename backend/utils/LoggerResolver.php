<?php

namespace utils;

use Monolog\Registry;

class LoggerResolver {

    private $logger;

    public function __construct($nameLogger = 'api') {
        $this->logger = Registry::getInstance($nameLogger);
    }

    public function getLogger(){
        return $this->logger;
    }
}