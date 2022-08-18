<?php

require_once  "Model/Veiculo.php";

//Classe estática responsável por fazer o gerenciamento das informações do usuário com o banco de dados


class BaseDAO
{
    /**
     * Cria uma conexão com o banco de dados
     *
     * @return Mysqli Em caso de sucesso e conexão tiver sido criado.
     * @return false Em caso de falha.
     */
    protected static function conn()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "bw7teste";
        $conn = new mysqli($servername, $username, $password, $database);
        return $conn;
    }
    
}
