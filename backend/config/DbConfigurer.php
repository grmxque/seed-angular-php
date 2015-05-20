<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 20/05/15
 * Time: 15:36
 */

namespace config;

use Monolog\Registry;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DbConfigurer {
    private $logger;

    private $entityManager;

    public function __construct(){
        $this->logger = Registry::getInstance('api');
        $this->logger->debug('Creation EntityManager');

        $paths = array("backend/entity");
        $isDevMode = true;

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($this->getDbParams(), $config);
        $this->entityManager->getConnection()->connect();
    }

    private function getDbParams() {
        $db_ini = parse_ini_file("backend/db.properties");
        return array (
            'driver' => 'pdo_mysql',
            'host' => $db_ini ['app.host'],
            'user' => $db_ini ['app.username'],
            'password' => $db_ini ['app.password'],
            'dbname' => $db_ini ['app.database'],
            'charset' => 'utf8',
            'driverOptions' => array (
                1002 => 'SET NAMES utf8'
            )
        );
    }

    public function getEntityManager() {
        return $this->entityManager;
    }
} 