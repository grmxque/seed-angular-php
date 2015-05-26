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
use \JWT;

class UserService {

    private $entityManager;
    private $logger;
    private $repository;
    private $key;

    public function __construct(EntityManager $entityManager, LoggerResolver $loggerResolver, UserRepository $userRepository){
        $this->entityManager = $entityManager;
        $this->logger = $loggerResolver->getLogger();
        $this->repository = $userRepository;
        $parameters = parse_ini_file("backend/parameters.properties");
        $this->key = $parameters['app.key'];
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

    /**
     * Création du token JWT
     *
     * @param $userId
     * @return string
     */
    public function createToken($userId){
        $payload = array(
            "iss" => $userId,
            "exp" => strtotime('+2 hour'));

        /*JWT::decode($encoded, $this->key, array('HS256'));*/

        return JWT::encode($payload, $this->key);
    }
} 