<?php
$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    } else {
        if (realpath("../../index.php")) {
            $pontos = '../../';
        }
    }
}
?>

<nav class="nav-extended white">
    <div class="nav-wrapper" style="width: 100vw; margin-left: auto; margin-right: auto;">
        <a href="<?php echo $pontos; ?>./Tela/home.php" class="brand-logo left black-text">Sloth</a>
        <ul class="right hide-on-med-and-down">
            
            <!--aluno-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='aluno'>Aluno</a>
                <ul id='aluno' class='dropdown-content'>
                    
                    <!--alunoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroAluno.php">registro</a></li>
                    <!--alunoregistro-->
                    <!--alunolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemAluno.php">listagem</a></li>
                    <!--alunolistagem-->
                    <!--alunoitem-->
                
                
                
                </ul>
            </li>
            <!--aluno-->
            
            <!--codigoconfirmacao-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='codigoconfirmacao'>Codigoconfirmacao</a>
                <ul id='codigoconfirmacao' class='dropdown-content'>
                    
                    <!--codigoconfirmacaoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroCodigoconfirmacao.php">registro</a></li>
                    <!--codigoconfirmacaoregistro-->
                    <!--codigoconfirmacaolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemCodigoconfirmacao.php">listagem</a></li>
                    <!--codigoconfirmacaolistagem-->
                    <!--codigoconfirmacaoitem-->
                
                
                
                </ul>
            </li>
            <!--codigoconfirmacao-->
            
            <!--curso-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='curso'>Curso</a>
                <ul id='curso' class='dropdown-content'>
                    
                    <!--cursoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroCurso.php">registro</a></li>
                    <!--cursoregistro-->
                    <!--cursolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemCurso.php">listagem</a></li>
                    <!--cursolistagem-->
                    <!--cursoitem-->
                
                
                
                </ul>
            </li>
            <!--curso-->
            
            <!--encaminhamento-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='encaminhamento'>Encaminhamento</a>
                <ul id='encaminhamento' class='dropdown-content'>
                    <!--encaminhamentoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroEncaminhamento.php">registro</a></li>
                    <!--encaminhamentoregistro-->
                    <!--encaminhamentolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemEncaminhamento.php">listagem</a></li>
                    <!--encaminhamentolistagem-->
                    <!--encaminhamentoitem-->
                
                
                </ul>
            </li>
            <!--encaminhamento-->
            
            <!--mensagem-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='mensagem'>Mensagem</a>
                <ul id='mensagem' class='dropdown-content'>
                    <!--mensagemregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroMensagem.php">registro</a></li>
                    <!--mensagemregistro-->
                    <!--mensagemlistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemMensagem.php">listagem</a></li>
                    <!--mensagemlistagem-->
                    <!--mensagemitem-->
                
                
                </ul>
            </li>
            <!--mensagem-->
            
            <!--motivoencaminhamento-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='motivoencaminhamento'>Motivoencaminhamento</a>
                <ul id='motivoencaminhamento' class='dropdown-content'>
                    <!--motivoencaminhamentoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroMotivoencaminhamento.php">registro</a></li>
                    <!--motivoencaminhamentoregistro-->
                    <!--motivoencaminhamentolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemMotivoencaminhamento.php">listagem</a></li>
                    <!--motivoencaminhamentolistagem-->
                    <!--motivoencaminhamentoitem-->
                
                
                </ul>
            </li>
            <!--motivoencaminhamento-->
            
            <!--motivorefenc-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='motivorefenc'>Motivorefenc</a>
                <ul id='motivorefenc' class='dropdown-content'>
                    <!--motivorefencitem-->
                </ul>
            </li>
            <!--motivorefenc-->
            
            <!--servidor-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='servidor'>Servidor</a>
                <ul id='servidor' class='dropdown-content'>
                    <!--servidorregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroServidor.php">registro</a></li>
                    <!--servidorregistro-->
                    <!--servidorlistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemServidor.php">listagem</a></li>
                    <!--servidorlistagem-->
                    <!--servidoritem-->
                
                
                </ul>
            </li>
            <!--servidor-->
            
            <!--sugestaorefenc-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='sugestaorefenc'>Sugestaorefenc</a>
                <ul id='sugestaorefenc' class='dropdown-content'>
                    <!--sugestaorefencitem-->
                </ul>
            </li>
            <!--sugestaorefenc-->
            
            <!--sugestaoresolucao-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='sugestaoresolucao'>Sugestaoresolucao</a>
                <ul id='sugestaoresolucao' class='dropdown-content'>
                    <!--sugestaoresolucaoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroSugestaoresolucao.php">registro</a></li>
                    <!--sugestaoresolucaoregistro-->
                    <!--sugestaoresolucaolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemSugestaoresolucao.php">listagem</a></li>
                    <!--sugestaoresolucaolistagem-->
                    <!--sugestaoresolucaoitem-->
                
                
                </ul>
            </li>
            <!--sugestaoresolucao-->
            
            <!--tentativaresolucao-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='tentativaresolucao'>Tentativaresolucao</a>
                <ul id='tentativaresolucao' class='dropdown-content'>
                    <!--tentativaresolucaoregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroTentativaresolucao.php">registro</a></li>
                    <!--tentativaresolucaoregistro-->
                    <!--tentativaresolucaolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemTentativaresolucao.php">listagem</a></li>
                    <!--tentativaresolucaolistagem-->
                    <!--tentativaresolucaoitem-->
                
                
                </ul>
            </li>
            <!--tentativaresolucao-->
            
            <!--tentavivarefenc-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='tentavivarefenc'>Tentavivarefenc</a>
                <ul id='tentavivarefenc' class='dropdown-content'>
                    <!--tentavivarefencitem-->
                </ul>
            </li>
            <!--tentavivarefenc-->
            
            <!--usuario-->
            <li>
                <a class='dropdown-trigger center black-text' style="background-color: transparent" data-hover="true" href='#' data-target='usuario'>Usuario</a>
                <ul id='usuario' class='dropdown-content'>
                    
                    
                    <!--usuariologin-->
                    <li><a href="<?php echo $pontos; ?>./Tela/login.php">login</a></li>
                    <!--usuariologin-->
                    <!--usuarioregistro-->
                    <li><a href="<?php echo $pontos; ?>./Tela/registroUsuario.php">registro</a></li>
                    <!--usuarioregistro-->
                    <!--usuariolistagem-->
                    <li><a href="<?php echo $pontos; ?>./Tela/listagemUsuario.php">listagem</a></li>
                    <!--usuariolistagem-->
                    <!--usuarioitem-->
                
                
                
                
                
                </ul>
            </li>
            <!--usuario-->
            <!--proximo-->


























        </ul>
    </div>
</nav>
<script>
$('.dropdown-trigger').dropdown({
        coverTrigger: false,
    });
</script>
