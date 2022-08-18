<?php

require_once  "Model/Usuario.php";
require_once "BaseDAO.php";
//Classe estática responsável por fazer o gerenciamento das informações do usuário com o banco de dados


class UsuarioDAO extends BaseDAO{

    
    /**
     * Cadastra um novo usuario
     *
     * @return  true Em caso de sucesso e o usuário for cadastrado corretamente
     * @return false Em caso de falha e o usuário não for cadastrado corretamente
     */ 
    public static function Cadastro(Usuario $usuario){
        $output = false;
        if(UsuarioDAO::CheckEmailUse($usuario->getEmail())){

            $sql = "INSERT INTO Usuario (Nome, Email, Senha) VALUES ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}')";
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
        
        $sql = "SELECT id FROM Usuario WHERE Email='$email'";
        $conn = UsuarioDAO::conn();

        $result = $conn->query($sql);

        if($result == false || $result->num_rows == 0){
            return true;
        }else{
            return false;
        }
    }
    /**
     * Retorna o ID de um usuário caso a senha e o email sejam iguais ao do objeto paramêtro 
     *
     * @return  int Caso exista um usuário com tais dados
     * @return false Caso não exista um usuário com tais dados
     */ 
    public static function Login(Usuario $usuario){
        $sql = "SELECT * FROM Usuario WHERE Email = '{$usuario->getEmail()}'";
        $conn = UsuarioDAO::conn();
        
        $result = $conn->query($sql);
        
        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()) {               
                if(password_verify($usuario->getSenha(), $row["Senha"])){
                    return $row["id"];
                }
            }
        }else{
            return false;
        }
    }

}

?>