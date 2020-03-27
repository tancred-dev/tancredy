<?php

namespace Tancredy\Database;

use Tancredy\GenericSingleton;

class ConnectMysql extends GenericSingleton 
{
    private $pdo;

    // En mettant le constructeur en visibilité protected on s'assure
    // que nous ne pourrons pas instancier cette classe depuis l'extérieur
    protected function __construct() 
    {
        try {

            $this->pdo = new \PDO('');
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getPDO() {
            return $this->pdo;
    }
}
