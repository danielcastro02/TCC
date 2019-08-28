<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Mensagem.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Mensagem.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Mensagem.php';
        }
    }
}


class MensagemPDO{
    
             /*inserir*/
    function inserirMensagem() {
        $mensagem = new mensagem($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Mensagem values(default , :id_remetente , :id_destinatario , :assunto , :mensagem);' );

            $stmt->bindValue(':id_remetente', $mensagem->getId_remetente());    
        
            $stmt->bindValue(':id_destinatario', $mensagem->getId_destinatario());    
        
            $stmt->bindValue(':assunto', $mensagem->getAssunto());    
        
            $stmt->bindValue(':mensagem', $mensagem->getMensagem());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=mensagemInserido');
            }else{
                header('location: ../index.php?msg=mensagemErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectMensagem(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMensagemId_mensagem($id_mensagem){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem where id_mensagem = :id_mensagem;');
        $stmt->bindValue(':id_mensagem', $id_mensagem);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMensagemId_remetente($id_remetente){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem where id_remetente = :id_remetente;');
        $stmt->bindValue(':id_remetente', $id_remetente);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMensagemId_destinatario($id_destinatario){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem where id_destinatario = :id_destinatario;');
        $stmt->bindValue(':id_destinatario', $id_destinatario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMensagemAssunto($assunto){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem where assunto = :assunto;');
        $stmt->bindValue(':assunto', $assunto);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMensagemMensagem($mensagem){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from mensagem where mensagem = :mensagem;');
        $stmt->bindValue(':mensagem', $mensagem);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateMensagem(Mensagem $mensagem){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update mensagem set id_remetente = :id_remetente , id_destinatario = :id_destinatario , assunto = :assunto , mensagem = :mensagem where id_mensagem = :id_mensagem;');
        $stmt->bindValue(':id_remetente', $mensagem->getId_remetente());
        
        $stmt->bindValue(':id_destinatario', $mensagem->getId_destinatario());
        
        $stmt->bindValue(':assunto', $mensagem->getAssunto());
        
        $stmt->bindValue(':mensagem', $mensagem->getMensagem());
        
        $stmt->bindValue(':id_mensagem', $mensagem->getId_mensagem());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteMensagem($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from mensagem where id_mensagem = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteMensagem($_GET['id']);
        header('location: ../Tela/listarMensagem.php');
    }



            /*editar*/
            function editar() {
                $mensagem = new Mensagem($_POST);
                    if($this->updateMensagem($mensagem) > 0){
                        header('location: ../index.php?msg=mensagemAlterado');
                    } else {
                        header('location: ../index.php?msg=mensagemErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                