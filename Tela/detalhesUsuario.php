<?php
include_once "../Base/requerAdm.php";
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>


<html>
<head>
    <meta charset="UTF-8">

    <?php
    include_once '../Base/header.php';
    include_once '../Modelo/Parametros.php';
    $parametros = new parametros();

    ?>
    <title><?php echo $parametros->getNome_empresa(); ?></title>
<body class="homeimg">
<?php
include_once '../Base/iNav.php';
?>
<main>

    <?php
    include_once "../Modelo/Usuario.php";
    include_once "../Modelo/Curso.php";
    include_once "../Modelo/Turma.php";
    include_once "../Modelo/Matricula.php";
    include_once "../Controle/CursoPDO.php";
    include_once "../Controle/usuarioPDO.php";
    include_once "../Controle/MatriculaPDO.php";
    include_once "../Controle/TurmaPDO.php";
    $usuarioPDO = new UsuarioPDO();
    $cursoPDO = new CursoPDO;
    $turmaPDO = new TurmaPDO();
    $matriculaPDO = new MatriculaPDO();
    $usuario = $usuarioPDO->selectUsuarioId_usuario($_GET['id_usuario']);
    $usuario = new usuario($usuario->fetch());
    ?>
<div class="row">
    <div class="col s12 m10 l10 offset-l1 offset-m1 card">
        <div class="row">
            <div class="col s12 m3 l3">
                <div style="margin: auto;margin-top: 20px;" class="circle">
                    <img class=" prev-img fotoPerfil center" width="150" height="150"
                         src="<?php echo $usuario->getIs_foto_url() == 1 ? $usuario->getFoto() : "../" . $usuario->getFoto() ?>">
                </div>
            </div>
            <div class="col s12 m9 l9">
                <h4><?php echo $usuario->getNome() ?></h4>
                <p>Telefone: <?php echo $usuario->getTelefone() ?></p>
                <p>Email: <?php echo $usuario->getEmail() ?></p>
                <p>Data de nascimento: <?php echo $usuario->getData_nascBarras() ?></p>
                <p>CPF: <?php echo $usuario->getCpf(); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <h5>Cursos</h5>
                <?php
                $matriculas = $matriculaPDO->selectMatriculaIdUsuario($usuario->getId_usuario());
                if($matriculas) {
                    ?>
                    <ul class="col s12 collapsible card">
                        <?php
                        while($linha = $matriculas->fetch()) {
                            $matricula = new Matricula($linha);
                            $curso = $cursoPDO->selectCursoIdTurma($matricula->getIdTurma());
                            $curso = new Curso($curso->fetch());
                                ?>
                                <li>
                                    <div class="collapsible-header">
                                        <p><?php echo $curso->getNome() . " - " . $curso->getTextModalidade(); ?></p>
                                    </div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s3">
                                                <div style="background-image: url('../<?php echo Curso::REPO.$curso->getDivulgacao() ?>');
                                                    background-repeat: no-repeat;
                                                    background-size: contain;
                                                    height: 150px;"></div>
                                            </div>
                                            <p class="col s9"><?php echo $curso->getDescricao() ?></p>
                                            <?php
                                            switch ($matricula->getStatus()){
                                                case Matricula::ST_PENDENTE:
                                                    ?><button class="btn corPadrao3">Pendente de aprovação</button> <?php
                                                    break;
                                                case Matricula::ST_CONFIRMADA:
                                                    ?><button class="btn corPadrao2">Confirmada</button><?php
                                                    break;
                                                case Matricula::ST_RECUSADA:
                                                    ?><button class="btn red darken-2">Recusada</button><?php
                                                    break;
                                                case Matricula::ST_SUSPENSA:
                                                    ?><button class="btn yellow darken-2">Suspensa</button><?php
                                                    break;
                                            }
                                            ?>
                                        </div>
                                        <div class="row center">
                                            <a class="btn corPadrao2"
                                               href="./verAulas.php?id_curso=<?php echo $curso->getIdCurso() ?>">Acessar
                                                Curso</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                        }
                        ?>
                    </ul>
                    <?php
                }else{
                    ?>

                    <h5>
                        Este aluno ainda não tem nenhum curso!
                    </h5>
                    <br>
                    <a class="btn corPadrao2" href="../index.php">Voltar</a>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    $('.parallax').parallax();
    $(".collapsible").collapsible();
</script>

<?php
include_once '../Base/footer.php';
?>
</body>
</html>

