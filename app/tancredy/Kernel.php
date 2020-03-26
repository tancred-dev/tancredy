<?php

namespace Tancredy;

use FastRoute;

class Kernel
{   
    private $routeur;
    private $engine;
    public function __construct(){
        $this->routeur = new Routeur();
    }
    public function run(){  

        $routes = include dirname(__DIR__) . '/routes.php';
        $dispatcher = $this->routeur->setRoute($routes);
        $this->routeur->runRoute($dispatcher);
    }
}
