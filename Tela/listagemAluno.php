<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Aluno</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/alunoPDO.php';
            include_once '../Controle/cursoPDO.php';
            include_once '../Modelo/Aluno.php';
            include_once '../Modelo/Curso.php';
            $alunoPDO = new alunoPDO();
            $cursoPDO = new CursoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Aluno</h4>
                    <tr class="center">

                        <td class='center'>Nome</td>
                        <td class='center'>E-mail</td>
                        <td class='center'>Matricula</td>
                        <td class='center'>Apelido</td>
                        <td class='center'>Curso</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $alunoPDO->selectAluno();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $aluno = new aluno($linha);
                            $stCurso = $cursoPDO->selectCursoId_curso($aluno->getId_curso());
                            $curso = new curso($stCurso->fetch());
                            ?>
                        <tr>
                            <td class="center"><?php echo $aluno->getNome()?></td>
                            <td class="center"><?php echo $aluno->getEmail()?></td>
                            <td class="center"><?php echo $aluno->getMatricula()?></td>
                            <td class="center"><?php echo $aluno->getApelido()?></td>
                            <td class="center"><?php echo $curso->getNome()?></td>
                            <td class = 'center'><a href="./editarAluno.php?id=<?php echo $aluno->getid_usuario()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/alunoControle.php?function=deletar&id=<?php echo $aluno->getid_usuario()?>">Excluir</a></td>
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

