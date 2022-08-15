<?php

require_once  "Model/Usuario.php";

//Classe estática responsável por fazer o gerenciamento das informações do usuário com o banco de dados


class UsuarioDAO{

    private static function conn(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,"bw7teste");
        return $conn;
    }
    /**
     * Cadastra um novo usuario
     *
     * @return  true Em caso de sucesso e o usuário for cadastrado corretamente
     * @return false Em caso de falha e o usuário não for cadastrado corretamente
     */ 
    public static function Cadastro(Usuario $usuario){
        $output = false;
        if(UsuarioDAO::CheckEmailUse($usuario->getEmail())){

            $sql = "INSERT INTO usuario (Nome, Email, Senha) VALUES ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}')";
            $conn = UsuarioDAO::conn();
            
            $output = $conn->query($sql) ===TRUE;
            
            
            $conn->close();
        }

        return  $output;         
         
    }

    /**
     * Checa se um email já está sendo usado
     *
     * @return  true Em caso de o email não estiver sendo usado
     * @return false Em caso de o email já estiver sendo usado
     */ 

    private static function CheckEmailUse($email){
        
        $sql = "SELECT id FROM usuario WHERE Email='$email'";
        $conn = UsuarioDAO::conn();

        $result = $conn->query($sql);

        if($result == false || $result->num_rows == 0){
            return true;
        }else{
            return false;
        }
    }

}

?>