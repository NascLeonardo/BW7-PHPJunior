<?php
require_once  "DAO/UsuarioDAO.php";
require_once  "Model/Usuario.php";

class UsuarioController{

    /**
     * Hasheia a senha e cadastra um usuário
     *
     * @return  true Em caso de sucesso e o usuário tiver sido criado
     * @return false Em caso de falha e o usuário não tiver sido criado
     */ 
    public static function CadastroUsuario(Usuario $usuario){
        $usuario->setSenha(password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        return UsuarioDAO::Cadastro($usuario);
    }
}

?>