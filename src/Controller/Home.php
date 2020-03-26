<?php
 
namespace App\Controller;
 
use Tancredy\AbstractController;
 
class Home extends AbstractController
{
    public function print() 
    {
        return $this->render('home');
    }
}
