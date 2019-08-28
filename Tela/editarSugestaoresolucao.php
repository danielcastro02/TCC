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
        include_once '../Controle/sugestaoresolucaoPDO.php';
        $Sugestaoresolucao = new sugestaoresolucaoPDO();
            $stmt = $Sugestaoresolucao->selectSugestaoresolucaoId_sugestao($_GET['id']);
                $nomeNormal = new Sugestaoresolucao($stmt->fetch());
        ?>
        <main>
            <div class="row" style="margin-top: 10vh;">
                <form action="../Controle/sugestaoresolucaoControle.php?function=editar" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Editar Sugestaoresolucao</h4>
                        <div class="input-field col s6" hidden>
                            <input type="text" name="id_sugestao" value="<?= $nomeNormal->getId_sugestao() ?>">
                            <label>id_sugestao</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="sugestao_resolucao" value="<?= $nomeNormal->getSugestao_resolucao() ?>">
                            <label>sugestao_resolucao</label>
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

