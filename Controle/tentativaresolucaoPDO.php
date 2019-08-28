<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Tentativaresolucao.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Tentativaresolucao.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Tentativaresolucao.php';
        }
    }
}


class TentativaresolucaoPDO{
    
             /*inserir*/
    function inserirTentativaresolucao() {
        $tentativaresolucao = new tentativaresolucao($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Tentativaresolucao values(default , :tentativa_resolucao , :tipo_encaminhamento);' );

            $stmt->bindValue(':tentativa_resolucao', $tentativaresolucao->getTentativa_resolucao());    
        
            $stmt->bindValue(':tipo_encaminhamento', $tentativaresolucao->getTipo_encaminhamento());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=tentativaresolucaoInserido');
            }else{
                header('location: ../index.php?msg=tentativaresolucaoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectTentativaresolucao(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentativaresolucao ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentativaresolucaoId_tentativa($id_tentativa){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentativaresolucao where id_tentativa = :id_tentativa;');
        $stmt->bindValue(':id_tentativa', $id_tentativa);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentativaresolucaoTentativa_resolucao($tentativa_resolucao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentativaresolucao where tentativa_resolucao = :tentativa_resolucao;');
        $stmt->bindValue(':tentativa_resolucao', $tentativa_resolucao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentativaresolucaoTipo_encaminhamento($tipo_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentativaresolucao where tipo_encaminhamento = :tipo_encaminhamento;');
        $stmt->bindValue(':tipo_encaminhamento', $tipo_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateTentativaresolucao(Tentativaresolucao $tentativaresolucao){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update tentativaresolucao set tentativa_resolucao = :tentativa_resolucao , tipo_encaminhamento = :tipo_encaminhamento where id_tentativa = :id_tentativa;');
        $stmt->bindValue(':tentativa_resolucao', $tentativaresolucao->getTentativa_resolucao());
        
        $stmt->bindValue(':tipo_encaminhamento', $tentativaresolucao->getTipo_encaminhamento());
        
        $stmt->bindValue(':id_tentativa', $tentativaresolucao->getId_tentativa());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteTentativaresolucao($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from tentativaresolucao where id_tentativa = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteTentativaresolucao($_GET['id']);
        header('location: ../Tela/listarTentativaresolucao.php');
    }



            /*editar*/
            function editar() {
                $tentativaresolucao = new Tentativaresolucao($_POST);
                    if($this->updateTentativaresolucao($tentativaresolucao) > 0){
                        header('location: ../index.php?msg=tentativaresolucaoAlterado');
                    } else {
                        header('location: ../index.php?msg=tentativaresolucaoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                