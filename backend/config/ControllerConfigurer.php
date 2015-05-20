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
        // Gestion des routes
        $this->app = Slim::getInstance('api');
        // Logger de l'api
        $this->logger = Registry::getInstance('api');
        // Formattage JSON
        $this->serializer = SerializerBuilder::create()->build();
    }


    public function setBody($content) {
        $this->app->response->setBody ( $content );
    }

    public function serialize($obj, $format = 'json') {
        return $this->serializer->serialize ( $obj, $format );
    }

    public function setHeaderForDownload($filename) {
        header ( 'Content-Disposition: attachment; filename="' . $filename . '"' );
        header ( 'Content-Description: File Transfer' );
        header ( 'Content-Type: application/force-download' );
    }

    public function setupCsvAttachment($filename) {
        $this->logger->debug ( 'set attachment => ' . $filename );
        $this->app->response->headers->set ( 'Content-Type', 'text/csv; charset=UTF-8' );
        $this->app->response->headers->set ( 'Content-Disposition', 'attachment; filename=' . $filename );
    }

    public function sendHeadersCSV($filename, $length) {
        $this->app->response->headers->set ( 'Content-Type', 'text/csv; charset=UTF-8' );
        $this->app->response->headers->set ( 'Content-Disposition', 'attachment; filename=' . $filename );
        $this->app->response->headers->set ( 'Content-Length', $length );
    }

    function sendHeadersZIP($filename, $length) {
        $this->app->response->headers->set ( 'Pragma', 'public' );
        $this->app->response->headers->set ( 'Expires', '0' );
        $this->app->response->headers->set ( 'Cache-Control', 'must-revalidate, post-check=0, pre-check=0' );
        $this->app->response->headers->set ( 'Cache-Control', 'public' );
        $this->app->response->headers->set ( 'Content-Description', 'File Transfer' );
        $this->app->response->headers->set ( 'Content-type', 'application/octet-stream' );
        $this->app->response->headers->set ( 'Content-Disposition', 'attachment; filename="' . $filename . '"' );
        $this->app->response->headers->set ( 'Content-Transfer-Encoding', 'binary' );
        $this->app->response->headers->set ( 'Content-Length', $length );
    }

    function sendHeadersTXT($filename, $length) {
        $this->app->response->headers->set ( 'Pragma', 'public' );
        $this->app->response->headers->set ( 'Expires', '0' );
        $this->app->response->headers->set ( 'Content-Type', 'plain/text; charset=UTF-8' );
        $this->app->response->headers->set ( 'Content-Disposition', 'attachment; filename=' . $filename );
        $this->app->response->headers->set ( 'Content-Transfer-Encoding', 'binary' );
        $this->app->response->headers->set ( 'Content-Length', $length );
    }
} 