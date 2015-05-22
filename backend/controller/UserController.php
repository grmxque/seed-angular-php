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
use \JWT;

class UserController extends ControllerConfigurer{

    private $service;

    private $key;

    private $token;

    public function __construct(UserService $userService){
        parent::__construct ();
        $this->service = $userService;

        $parameters = parse_ini_file("backend/parameters.properties");
        $this->key = $parameters['app.key'];
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
            $payload = array(
                "user" => $user,
                "exp" => strtotime('+2 hour'));
            $encoded = JWT::encode($payload, $this->key);

            JWT::decode($encoded, $this->key, array('HS256'));

            $this->service->updateToken($payload, $encoded);

            return $encoded;
        }else{
            $res = $this->app->response()->status(401);;
        }

        return false;
    }

    private function createToken(){
        $key = $this->key;
        $token = array(

        );
    }

    static function validateToken($encoded){
        return true;
    }

    static function keepTokenALive(){

    }



} 