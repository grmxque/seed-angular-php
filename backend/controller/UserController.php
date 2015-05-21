<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/05/15
 * Time: 09:04
 */

namespace controller;

use config\ControllerConfigurer;

class UserController extends ControllerConfigurer{

    public function __construct(){
        parent::__construct ();
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

        /*if ($username == 'admin' && $password == 'mysecurepass') { //implement your own validation method against your db

            $arrRtn['user'] = 'Chuck Norris'; //Just return the user name for reference
            $arrRtn['token'] = bin2hex(openssl_random_pseudo_bytes(16)); //generate a random token

            $tokenExpiration = date('Y-m-d H:i:s', strtotime('+1 hour'));//the expiration date will be in one hour from the current moment

            CUser::updateToken($username, $arr['token'], $tokenExpiration); //This function can update the token on the database and set the expiration date-time, implement your own
            return json_encode($arrRtn);
        }

        return false;*/

        $user = array(
            'user' => 'chuck norris',
            'token' => '1JUcleYpx7eO946uTaFv3ih4wkl9vcL1'
        );

        return $user;
    }

} 