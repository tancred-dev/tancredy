<?php
 
namespace Tancredy;



 
abstract class AbstractController
{
    private $templateEngine;
 
    public function __construct() 
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__DIR__)) . '/templates');
        $this->templateEngine = new \Twig\Environment($loader);
    }
 
 
    protected function render($view, $vars = [])
    {
        return $this->templateEngine->render($view.'.html.twig', $vars);
    }

    public function redirectTo($url)
    { 
        header("Location: ".$url); 
    } 
    public function flash(){
        return new FlashBag();
    }
}
