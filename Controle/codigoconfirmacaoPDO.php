<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Codigoconfirmacao.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Codigoconfirmacao.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Codigoconfirmacao.php';
        }
    }
}


class CodigoconfirmacaoPDO{
    
             
             /*inserir*/
    function inserirCodigoconfirmacao() {
        $codigoconfirmacao = new codigoconfirmacao($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Codigoconfirmacao values(default , :id_usuario , :codigo);' );

            $stmt->bindValue(':id_usuario', $codigoconfirmacao->getId_usuario());    
        
            $stmt->bindValue(':codigo', $codigoconfirmacao->getCodigo());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=codigoconfirmacaoInserido');
            }else{
                header('location: ../index.php?msg=codigoconfirmacaoErroInsert');
            }
    }
    /*inserir*/
                
                
    

            

    public function selectCodigoconfirmacao(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from codigoconfirmacao ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCodigoconfirmacaoId_codigo($id_codigo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from codigoconfirmacao where id_codigo = :id_codigo;');
        $stmt->bindValue(':id_codigo', $id_codigo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCodigoconfirmacaoId_usuario($id_usuario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from codigoconfirmacao where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectCodigoconfirmacaoCodigo($codigo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from codigoconfirmacao where codigo = :codigo;');
        $stmt->bindValue(':codigo', $codigo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateCodigoconfirmacao(Codigoconfirmacao $codigoconfirmacao){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update codigoconfirmacao set id_usuario = :id_usuario , codigo = :codigo where id_codigo = :id_codigo;');
        $stmt->bindValue(':id_usuario', $codigoconfirmacao->getId_usuario());
        
        $stmt->bindValue(':codigo', $codigoconfirmacao->getCodigo());
        
        $stmt->bindValue(':id_codigo', $codigoconfirmacao->getId_codigo());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteCodigoconfirmacao($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from codigoconfirmacao where id_codigo = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteCodigoconfirmacao($_GET['id']);
        header('location: ../Tela/listarCodigoconfirmacao.php');
    }



            /*editar*/
            function editar() {
                $codigoconfirmacao = new Codigoconfirmacao($_POST);
                    if($this->updateCodigoconfirmacao($codigoconfirmacao) > 0){
                        header('location: ../index.php?msg=codigoconfirmacaoAlterado');
                    } else {
                        header('location: ../index.php?msg=codigoconfirmacaoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                