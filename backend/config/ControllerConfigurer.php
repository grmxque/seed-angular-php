<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 20/05/15
 * Time: 12:22
 */

namespace config;

use \Slim\Slim;
use Monolog\Registry;
use JMS\Serializer\SerializerBuilder;

class ControllerConfigurer {
    public $app;
    public $logger;
    public $serializer;

    public function __construct() {
        $this->app = Slim::getInstance('api');
        $this->logger = Registry::getInstance('api');
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function setBody($content) {
        $this->app->response->setBody ( $content );
    }

    public function serialize($obj, $format = 'json') {
        return $this->serializer->serialize ( $obj, $format );
    }

    public function serializeJsonToArray($json){
        return json_decode($json,1);
    }

    public function serializeJsonToObject($json){
        return json_decode($json);
    }

    public function deserialize($data, $type, $format = 'json') {
        return $this->serializer->deserialize ( $data, $type, $format );
    }
} 