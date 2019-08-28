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
        include_once '../Controle/cursoPDO.php';
        $Curso = new cursoPDO();
            $stmt = $Curso->selectCursoId_curso($_GET['id']);
                $nomeNormal = new Curso($stmt->fetch());
        ?>
        <main>
            <div class="row" style="margin-top: 10vh;">
                <form action="../Controle/cursoControle.php?function=editar" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Editar Curso</h4>
                        <div class="input-field col s6" hidden>
                            <input type="text" name="id_curso" value="<?= $nomeNormal->getId_curso() ?>">
                            <label>id_curso</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="nome" value="<?= $nomeNormal->getNome() ?>">
                            <label>nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="turno" value="<?= $nomeNormal->getTurno() ?>">
                            <label>turno</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="nivel" value="<?= $nomeNormal->getNivel() ?>">
                            <label>nivel</label>
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

