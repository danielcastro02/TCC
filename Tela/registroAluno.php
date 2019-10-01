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
        include_once '../Modelo/Curso.php';
        include_once '../Controle/cursoPDO.php'; 
        $cursoPDO = new CursoPDO();
        $stmtCursos = $cursoPDO->selectCurso();
        ?>
        <main>
            <div class="row" >
                <form action="../Controle/alunoControle.php?function=inserirAluno" class="card col l8 offset-l2 m10 offset-m1 s10 offset-s1" method="post">
                    <div class="row center">
                        <h4 class="textoCorPadrao2">Cadastrar Aluno</h4>
                        <div class="input-field col s6">
                            <input type="text" name="nome">
                            <label>Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="apelido">
                            <label>Apelido</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="email">
                            <label>Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="matricula">
                            <label>Matricula</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="id_curso">
                                <?php
                                if($stmtCursos){
                                    while($linha = $stmtCursos->fetch()){
                                        $curso = new curso($linha);
                                        echo "<option value='".$curso->getId_curso()."'>".$curso->getNome()." ".$curso->getTurno()."</option>";
                                    }
                                }else{
                                    echo "<option value='0'>Nenhum Curso Registrado</option>";
                                }
                                ?>
                            </select>
                            <label>Curso</label>
                        </div>
                    </div><div class="row">
                        <div class = "input-field col s6">
                            <input type="password" name="senha1">
                            <label>Senha</label>
                        </div>
                        <div class = "input-field col s6">
                            <input type="password" name="senha2">
                            <label>Repita a senha</label>
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

