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

    public function validateCredentials($username, $pwd){
        return $username;
    }

    public function updateToken($user, $token, $expirationToken){

    }

    public function validateToken($token){
        //Token exist and not expired
    }
} 