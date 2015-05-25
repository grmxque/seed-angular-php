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

    /**
     * Création d'un token si crédentials validé ou access non autorisé
     *
     * @param $username
     * @param $password
     * @return null|string
     */
    public function login($username, $password) {
        $userId = $this->service->validateCredentials($username, $password);

        if(!empty($userId)){
            $token = $this->createToken($userId);
            return $token;
        }else{
            $this->app->response()->status(401);
        }

        return false;
    }

    /**
     * Création du token JWT
     *
     * @param $userId
     * @return string
     */
    private function createToken($userId){
        $payload = array(
            "iss" => $userId,
            "exp" => strtotime('+2 hour'));

        /*JWT::decode($encoded, $this->key, array('HS256'));*/

        return JWT::encode($payload, $this->key);
    }
}