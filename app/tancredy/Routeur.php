<?php
namespace Tancredy;
use FastRoute;
class Routeur
{
    public function setRoute($routes){
        return FastRoute\simpleDispatcher($routes);
    }
    public function runRoute($dispatcher){
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        
        $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
        if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
            // Je vérifie si mon parametre est une chaine de caractere
            if(is_string($routeInfo[1])) {
                // si dans la chaine reçu on trouve les ::
                if(strpos($routeInfo[1], '::') !== false) {
                    //on coupe sur l'operateur de resolution de portée (::)
                    // qui est symbolique ici dans notre chaine de caractere.
                    $route = explode('::', $routeInfo[1]);
                    $method = [new $route[0], $route[1]];
                } else {
                    // sinon c'est directement la chaine qui nous interesse
                    $method = $routeInfo[1];
                }
            }
            // dans le cas ou c'est appelable (closure (fonction anonyme) par 
            //exemple)
            elseif(is_callable($routeInfo[1])) {
                $method = $routeInfo[1];
            }
            // on execute avec call_user_func_array
            echo call_user_func_array($method, $routeInfo[2]);
        } elseif ($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND) {
            header("HTTP/1.0 404 Not Found");
            include "error_404.phtml";
        }
    }
}