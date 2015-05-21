<?php

namespace config;

use \Slim\Middleware;

use controller\UserController;

class TokenAuth extends Middleware {

    public function __construct() {

    }

    public function deny_access() {
        $res = $this->app->response();
        $res->status(401);
    }

    /**
     * Check against the DB if the token is valid
     *
     * @param string $token
     * @return bool
     */
    public function authenticate($token) {
        return UserController::validateToken($token);
    }

    /**
     * Call
     *
     */
    public function call() {
        $tokenAuth = $this->app->request->headers->get('Authorization');

        if ($this->authenticate($tokenAuth)) {
            //Get the user and make it available for the controller
            //$usrObj = new \Subscriber\Model\User();
            //$usrObj->getByToken($tokenAuth);
            //$this->app->auth_user = $usrObj;
            //Update token's expiration
            //\Subscriber\Controller\User::keepTokenAlive($tokenAuth);
            //Continue with execution
            $this->next->call();
        } else {
            $this->deny_access();
        }
    }

} 