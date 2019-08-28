<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php
        include_once '../Base/header.php';
        ?>
    <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <?php
        include_once '../Controle/mensagemPDO.php';
        $Mensagem = new mensagemPDO();
            $stmt = $Mensagem->selectMensagemId_mensagem($_GET['id']);
                $nomeNormal = new Mensagem($stmt->fetch());
        ?>
        <main>
            <div class="row" style="margin-top: 10vh;">
                <form action="../Controle/mensagemControle.php?function=editar" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Editar Mensagem</h4>
                        <div class="input-field col s6" hidden>
                            <input type="text" name="id_mensagem" value="<?= $nomeNormal->getId_mensagem() ?>">
                            <label>id_mensagem</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="id_remetente" value="<?= $nomeNormal->getId_remetente() ?>">
                            <label>id_remetente</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="id_destinatario" value="<?= $nomeNormal->getId_destinatario() ?>">
                            <label>id_destinatario</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="assunto" value="<?= $nomeNormal->getAssunto() ?>">
                            <label>assunto</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="mensagem" value="<?= $nomeNormal->getMensagem() ?>">
                            <label>mensagem</label>
                        </div>
                    <div class="row center">
                        <a href="../index.php" class="corPadrao3 btn">Voltar</a>
                        <input type="submit" class="btn corPadrao2" value="Alterar">
                    </div>
                </form>
            </div>
        </main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>

