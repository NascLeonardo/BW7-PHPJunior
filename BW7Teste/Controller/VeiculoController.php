<?php
require_once  "DAO/VeiculoDAO.php";
require_once  "Model/Veiculo.php";


class VeiculoController{
    /**
     * Atribui o ID na sessão no objeto veiculo e procede com o cadastro do objeto no banco de dados.
     *
     * @return  true Em caso de sucesso e o veiculo tiver sido criado.
     * @return false Em caso de falha e o veiculo não tiver sido criado.
     */ 
    public static function CadastroVeiculo(Veiculo $veiculo){
        session_start();
        $veiculo->setIdUsuario($_SESSION["UserId"]);
        return VeiculoDAO::Cadastro($veiculo);
    }
    /**
     * Retorna todos os veículos cadastrado por um usuário autenticado.
     *
     * @return  Veiculo[] Se o Usuário estiver autenticado.
     * @return false Caso o usuário não estiver autenticadco.
     */ 
    public static function GetAllVeiculos(){
        session_start();
        return VeiculoDAO::GetAll($_SESSION["UserId"]);
    }
    /**
     * Retorna um veículo pelo seu id.
     *
     * @return Veiculo Se o veículo estiver cadastrado e o usuário autenticado tiver o cadastrado.
     * @return false Caso o veículo não exista ou o usuário autenticado não o tenha cadastrado.
     */ 
    public static function GetById(int $id){
        session_start();

        $veiculo = VeiculoDAO::GetById($id);
        if($veiculo != false && $veiculo->getIdUsuario() == $_SESSION["UserId"]){
            return $veiculo;
        } 
        return false;
    }
    /**
     * Altera um veículo levando em consideração o id do veículo.
     *
     * @return true Se o veículo tiver sido alterado.
     * @return false Caso o usuário autenticado não seja o mesmo usuário que tenha cadastrado o veículo, ou caso a alteração tenha falhado.
     */ 
    public static function EditarVeiculo(Veiculo $veiculo){        
        if(VeiculoDAO::GetById($veiculo->getId()) != false){
            return VeiculoDAO::Alterar($veiculo);
        }else{
            return false;
        }
    }

    /**
     * Exclui um veículo levando em consideração o id do veículo.
     *
     * @return true Se o veículo tiver sido excluido.
     * @return false Caso o usuário autenticado não seja o mesmo usuário que tenha cadastrado o veículo, ou caso a exclusão tenha falhado.
     */ 
    public static function ExcluirVeiculo(int $id){
        if(VeiculoDAO::GetById($id) != false){
            return VeiculoDAO::Excluir($id);
        }else{
            return false;
        }
    }
    /**
     * Altera o estado de um veículo levando em consideração o id do veículo e o altera no banco de dados.
     *
     * @return true Se o veículo tiver sido alterado.
     * @return false Caso o usuário autenticado não seja o mesmo usuário que tenha cadastrado o veículo, ou caso a alteração tenha falhado.
     */ 
    public static function AlterarDisponibilidade(int $id){
        $veiculo = VeiculoController::GetById($id);
        if($veiculo != false){
            if(intval($veiculo->getDisponivel()) == 1){
                $veiculo->setDisponivel(0);
            }else{
                $veiculo->setDisponivel(1);
            }
            $result = VeiculoDAO::Alterar($veiculo);
            return $result;
        }
        return false;        
    }
}

?>