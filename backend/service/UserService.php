<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/05/15
 * Time: 09:21
 */

namespace service;

use utils\LoggerResolver;

class UserService {
    private $logger;

    public function __construct(LoggerResolver $loggerResolver){
        $this->logger = $loggerResolver->getLogger();
    }
} 