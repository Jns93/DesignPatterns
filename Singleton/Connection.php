<?php 

namespace Singleton;


class Connection
{
    //Terceira caracteristica (variavel instance privada static)
    private static $instance;
    public $id;

    // Primeira caracteristica (contrutor privado)

    private function __construct() 
    {
        $this->id = random_int(1, 10);
    }

    // segunda caracteristica (metodo statico getInstance)
    static function getInstance()
    {
        if (!$instance) {
            $instance = new Connection(); //Chamando o construtor dessa classe
        }
        return $instance;
    }
}

