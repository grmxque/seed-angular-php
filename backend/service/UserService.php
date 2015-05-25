<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/05/15
 * Time: 09:21
 */

namespace service;

use Doctrine\ORM\EntityManager;
use repository\UserRepository;
use utils\LoggerResolver;

class UserService {
    private $entityManager;

    private $logger;

    private $repository;

    public function __construct(EntityManager $entityManager, LoggerResolver $loggerResolver, UserRepository $userRepository){
        $this->entityManager = $entityManager;
        $this->logger = $loggerResolver->getLogger();
        $this->repository = $userRepository;
    }

    public function validateCredentials($username, $pwd){
        return $this->entityManager->getRepository('User')->findOneBy(
          array(
              'username' => $username,
              'password' => $pwd
          )
        );
    }

    public function updateToken($user, $token, $expirationToken){

    }

    public function validateToken($token){
        //Token exist and not expired
    }
} 