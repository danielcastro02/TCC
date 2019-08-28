<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Mensagem</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/mensagemPDO.php';
            include_once '../Modelo/Mensagem.php';
            $mensagemPDO = new mensagemPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Mensagem</h4>
                    <tr class="center">

                        <td class='center'>Id_mensagem</td>
                        <td class='center'>Id_remetente</td>
                        <td class='center'>Id_destinatario</td>
                        <td class='center'>Assunto</td>
                        <td class='center'>Mensagem</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $mensagemPDO->selectMensagem();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $mensagem = new mensagem($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $mensagem->getId_mensagem()?></td>
                            <td class="center"><?php echo $mensagem->getId_remetente()?></td>
                            <td class="center"><?php echo $mensagem->getId_destinatario()?></td>
                            <td class="center"><?php echo $mensagem->getAssunto()?></td>
                            <td class="center"><?php echo $mensagem->getMensagem()?></td>
                            <td class = 'center'><a href="./editarMensagem.php?id=<?php echo $mensagem->getid_mensagem()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/mensagemControle.php?function=deletar&id=<?php echo $mensagem->getid_mensagem()?>">Excluir</a></td>
                        </tr>
                                <?php
                        }
                    }
                    ?>
                    </table>
            </div>
        </main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>

