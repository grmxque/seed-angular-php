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

    /**
     * Retourn l'id d'un utilisateur en fonction de $username et $pwd, null si aucune correspondance.
     *
     * @param $username
     * @param $pwd
     * @return null|userId
     */
    public function validateCredentials($username, $pwd){
        $user = $this->entityManager->getRepository('User')->findOneBy(
            array(
                'username' => $username,
                'password' => $pwd
            )
        );

        return (empty($user)?null:$user->getId());
    }
} 