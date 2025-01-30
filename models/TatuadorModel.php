<?php

require_once './database/DBHandler.php';


class TatuadorModel{

    // Instanciamos la conexion a la base de datos
    private $dbHandler;
    private $conexion;


    private function conectar(){

        $this->dbHandler = new DBHandler();
        $this->conexion = $this->dbHandler->conectar();
    }
    private function desconectar()
    {
        $this->conexion = $this->dbHandler ->desconectar();
    }
    // CRUD de tatuadores
    // Se crea un nuevo registro en la tabla de tatuadores
    function createTatuador(string $nombre, string $email, string $password, ?string $foto): TatuadorModel
    {

        //Implementa una foto predeterminada si no se asigna una concreta
        $foto = $foto ?? 'default.jpg';

        $nuevoTatuador = new TatuadorModel();
        $this->dbHandler->conectar();
        // Guardamos el nuevo registro en la base de datos
        $this->dbHandler->desconectar();
        // Devolvemos la informacion del tatuador creado
        return $nuevoTatuador;
    }

    // Obtiene la info. de un tatuador concreto
    function getTatuador($id)
    {

        $this->dbHandler->conectar();

        $this->dbHandler->desconectar();

    }

    // Actualiza la info. de un tatuador existente
    function updateTatuador($nombre, $email, $password, $foto)
    {
    }

    // Elimina un tatuador existente
    function deleteTatuador($id)
    {

    }

    // Otros metodos

    // Devuelve una  lista con la info. de todos los tatuadores
    function getAllTatuadores(): array
    {
        $tatuadores = array();
        return $tatuadores;
    }
}
?>