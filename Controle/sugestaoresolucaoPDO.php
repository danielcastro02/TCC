<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Sugestaoresolucao.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Sugestaoresolucao.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Sugestaoresolucao.php';
        }
    }
}


class SugestaoresolucaoPDO{
    
             /*inserir*/
    function inserirSugestaoresolucao() {
        $sugestaoresolucao = new sugestaoresolucao($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Sugestaoresolucao values(default , :sugestao_resolucao , :tipo_encaminhamento);' );

            $stmt->bindValue(':sugestao_resolucao', $sugestaoresolucao->getSugestao_resolucao());    
        
            $stmt->bindValue(':tipo_encaminhamento', $sugestaoresolucao->getTipo_encaminhamento());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=sugestaoresolucaoInserido');
            }else{
                header('location: ../index.php?msg=sugestaoresolucaoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectSugestaoresolucao(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaoresolucao ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaoresolucaoId_sugestao($id_sugestao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaoresolucao where id_sugestao = :id_sugestao;');
        $stmt->bindValue(':id_sugestao', $id_sugestao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaoresolucaoSugestao_resolucao($sugestao_resolucao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaoresolucao where sugestao_resolucao = :sugestao_resolucao;');
        $stmt->bindValue(':sugestao_resolucao', $sugestao_resolucao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaoresolucaoTipo_encaminhamento($tipo_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaoresolucao where tipo_encaminhamento = :tipo_encaminhamento;');
        $stmt->bindValue(':tipo_encaminhamento', $tipo_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateSugestaoresolucao(Sugestaoresolucao $sugestaoresolucao){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update sugestaoresolucao set sugestao_resolucao = :sugestao_resolucao , tipo_encaminhamento = :tipo_encaminhamento where id_sugestao = :id_sugestao;');
        $stmt->bindValue(':sugestao_resolucao', $sugestaoresolucao->getSugestao_resolucao());
        
        $stmt->bindValue(':tipo_encaminhamento', $sugestaoresolucao->getTipo_encaminhamento());
        
        $stmt->bindValue(':id_sugestao', $sugestaoresolucao->getId_sugestao());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteSugestaoresolucao($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from sugestaoresolucao where id_sugestao = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteSugestaoresolucao($_GET['id']);
        header('location: ../Tela/listarSugestaoresolucao.php');
    }



            /*editar*/
            function editar() {
                $sugestaoresolucao = new Sugestaoresolucao($_POST);
                    if($this->updateSugestaoresolucao($sugestaoresolucao) > 0){
                        header('location: ../index.php?msg=sugestaoresolucaoAlterado');
                    } else {
                        header('location: ../index.php?msg=sugestaoresolucaoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                