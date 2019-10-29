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
<main>
    <div class="row" style="margin-top: 10vh;">
        <form action="../Controle/motivoencaminhamentoControle.php?function=inserirMotivoencaminhamento"
              class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
            <div class="row center">
                <h4 class="textoCorPadrao2">Cadastrar Motivo de encaminhamento</h4>
                <div class="input-field col s6">
                    <input type="text" name="motivo">
                    <label>Motivo</label>
                </div>
                <div class="input-field col s6">
                    <select name="tipo_encaminhamento">
                        <option value="Disciplinar">Disciplinar</option>
                        <option value="Aproveitamento">Aproveitamento</option>
                    </select>
                    <label>Tipo de encaminhamento</label>
                </div>
            </div>
            <div class="row center">
                <a href="../index.php" class="corPadrao3 btn">Voltar</a>
                <input type="submit" class="btn corPadrao2" value="Cadastrar">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("select").formSelect();
        });
    </script>
</main>
<?php
include_once '../Base/footer.php';
?>
</body>
</html>

