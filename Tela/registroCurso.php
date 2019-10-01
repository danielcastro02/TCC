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
                <form action="../Controle/cursoControle.php?function=inserirCurso" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Cadastrar Curso</h4>
                        <div class="input-field col s6">
                            <input type="text" name="nome">
                            <label>Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="turno">
                                <option value="Integral">Integral</option>
                                <option value="Diurno">Diurno</option>
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                            </select>
                            <label>Turno</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="nivel">
                                <option value="Médio">Médio</option>
                                <option value="Subsequente">Subsequente</option>
                                <option value='Superior'>Superior</option>
                            </select>
                            <label>Nível</label>
                        </div>
                    </div>
                    <div class="row center">
                        <a href="../index.php" class="corPadrao3 btn">Voltar</a>
                        <input type="submit" class="btn corPadrao2" value="Cadastrar">
                    </div>
                </form>
            </div>
        </main>
        <script>
            $("select").formSelect();
        </script>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>

