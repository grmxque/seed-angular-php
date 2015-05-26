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
    private $salt;

    public function __construct(UserService $userService){
        parent::__construct ();
        $this->service = $userService;
        $parameters = parse_ini_file("backend/parameters.properties");
        $this->salt = $parameters['app.salt'];
    }

    function routeRegister(){
        $that = $this;

        $this->app->post('/api/signIn', function() use($that) {
            $credentials = $this->serializeJsonToObject($this->app->request->getBody());
            $result = $that->signIn($credentials->username, $credentials->pwd);
            $this->setBody($this->serialize($result));
        });

    }

    /**
     * Création d'un token si crédentials validés ou access non autorisé
     *
     * @param $username
     * @param $password
     * @return null|string
     */
    public function signIn($username, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT, array('salt' => $this->salt, "cost" => 10));

        $userId = $this->service->validateCredentials($username, $hash);

        if(!empty($userId)){
            return $this->service->createToken($userId);
        }else{
            $this->app->response()->status(401);
        }

        return false;
    }
}