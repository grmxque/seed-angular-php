<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 20/05/15
 * Time: 12:55
 */

namespace controller;

use config\ControllerConfigurer;

class TestController extends ControllerConfigurer{

    public function __construct(){
        parent::__construct ();
    }

   function routeRegister(){
       $that = $this;

       $this->app->get('/api/test', function() use($that) {
           $test = array('1' => 'foo', '2' => 'foo');
           $this->setBody($this->serialize($test));
       });
   }
} 