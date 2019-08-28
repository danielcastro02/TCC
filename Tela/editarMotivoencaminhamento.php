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
        include_once '../Controle/motivoencaminhamentoPDO.php';
        $Motivoencaminhamento = new motivoencaminhamentoPDO();
            $stmt = $Motivoencaminhamento->selectMotivoencaminhamentoId_motivo($_GET['id']);
                $nomeNormal = new Motivoencaminhamento($stmt->fetch());
        ?>
        <main>
            <div class="row" style="margin-top: 10vh;">
                <form action="../Controle/motivoencaminhamentoControle.php?function=editar" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Editar Motivoencaminhamento</h4>
                        <div class="input-field col s6" hidden>
                            <input type="text" name="id_motivo" value="<?= $nomeNormal->getId_motivo() ?>">
                            <label>id_motivo</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="motivo" value="<?= $nomeNormal->getMotivo() ?>">
                            <label>motivo</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="tipo_encaminhamento" value="<?= $nomeNormal->getTipo_encaminhamento() ?>">
                            <label>tipo_encaminhamento</label>
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

