<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/05/15
 * Time: 09:04
 */

namespace controller;

use config\ControllerConfigurer;
use service\UserService;

class UserController extends ControllerConfigurer{

    private $service;

    public function __construct(UserService $userService){
        parent::__construct ();
        $this->service = $userService;
    }

    function routeRegister(){
        $that = $this;

        $this->app->post('/api/login', function() use($that) {
            $credentials = $this->serializeJsonToObject($this->app->request->getBody());
            $result = $that->login($credentials->username, $credentials->pwd);
            $this->setBody($this->serialize($result));
        });

    }

    public function login($username, $password) {
        $user = $this->service->validateCredentials($username, $password);
        if(!empty($user)){
            $arrRtn['user'] = $user;
            $arrRtn['token'] = bin2hex(openssl_random_pseudo_bytes(16));

            $tokenExpiration = date('Y-m-d H:i:s', strtotime('+2 hour'));

            $this->service->updateToken($arrRtn['user'], $arrRtn['token'], $tokenExpiration);

            return $arrRtn;
        }

        return false;
    }

    static function validateToken(){
        return true;
    }

    static function keepTokenALive(){

    }



} 