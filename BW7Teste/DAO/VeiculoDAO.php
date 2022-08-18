<?php

require_once  "Model/Veiculo.php";
require_once "BaseDAO.php";
//Classe estática responsável por fazer o gerenciamento das informações do usuário com o banco de dados


class VeiculoDAO extends BaseDAO
{   
    /**
     * Cadastra um novo veiculo
     *
     * @return  true Em caso de sucesso e o veiculo for cadastrado corretamente
     * @return false Em caso de falha e o veiculo não for cadastrado corretamente
     */
    public static function Cadastro(Veiculo $veiculo)
    {
        $output = false;
        if (VeiculoDAO::CheckPlacaUse($veiculo->getPlaca())) {

            $sql = "INSERT INTO Veiculo (Nome,Marca,Placa,Disponivel,PK_UsuarioAdd) VALUES ('{$veiculo->getNome()}', '{$veiculo->getMarca()}', '{$veiculo->getPlaca()}',1,'{$veiculo->getIdUsuario()}')";
            $conn = VeiculoDAO::conn();

            $output = $conn->query($sql) === TRUE;


            $conn->close();
        }

        return  $output;
    }

    /**
     * Checa se uma placa já está cadastrada
     *
     * @return  true Em caso de a placa não estiver sendo usada
     * @return false Em caso de a placa já estiver sendo usada
     */

    private static function CheckPlacaUse($placa)
    {

        $sql = "SELECT id FROM Veiculo WHERE Placa='$placa'";
        $conn = VeiculoDAO::conn();

        $result = $conn->query($sql);
        if ($result == false || $result->num_rows == 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Retorna todos os veículos vinculado a um usuário
     *
     * @return Veiculo[]
     */
    public static function GetAll(int $id)
    {
        $veiculos = array();
        $sql = "SELECT * FROM Veiculo WHERE PK_UsuarioAdd = '{$id}'";
        $conn = VeiculoDAO::conn();

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $veiculo = new Veiculo();
                $veiculo->constructCompleto($row["Nome"],$row["Marca"],$row["Placa"],$row["Disponivel"],$row["id"],$row["PK_UsuarioAdd"]);
                array_push($veiculos,$veiculo);
            }
        }
        return $veiculos;
    }
    /**
     * Retorna um veículo indicado pelo id
     *
     * @return Veiculo
     * @return false Caso ocorra algum erro no sql
     */
    public static function GetById(int $id){
        $veiculo = false;
        $sql = "SELECT * FROM Veiculo WHERE id = {$id}";
        $conn = VeiculoDAO::conn();

        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                
                $veiculo = new Veiculo();
                $veiculo->constructCompleto($row["Nome"],$row["Marca"],$row["Placa"],$row["Disponivel"],$row["id"],$row["PK_UsuarioAdd"]);
            }
        }
        return $veiculo;
    }
    /**
     * Altera um Veículo levando em consideração o id no objeto recebido.
     *
     * @return true Em caso de sucesso e o veículo tiver sido alterado.
     * @return false Em caso de falha.
     */
    public static function Alterar(Veiculo $veiculo)
    {
        $sql = "UPDATE  Veiculo SET Nome='{$veiculo->getNome()}',Marca='{$veiculo->getMarca()}',Placa='{$veiculo->getPlaca()}',Disponivel='{$veiculo->getDisponivel()}' WHERE id = '{$veiculo->getId()}'";
        $conn = VeiculoDAO::conn();

        return $conn->query($sql);
    }
       
    /**
     * exclui um Veículo levando em consideração o id.
     *
     * @return true Em caso de sucesso e o veículo tiver sido excluido.
     * @return false Em caso de falha.
     */
    public static function Excluir(int $id)
    {
        $sql = "Delete FROM Veiculo WHERE id = '{$id}'";
        $conn = VeiculoDAO::conn();

       return $conn->query($sql) === TRUE;
    }
}
