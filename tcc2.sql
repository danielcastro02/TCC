-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2020 às 22:46
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_usuario` int(11) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_usuario`, `matricula`, `apelido`, `id_curso`) VALUES
(1, '2017007243', 'Daniel', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_remetente` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `is_media` int(1) DEFAULT 0,
  `caminho_media` varchar(1000) DEFAULT NULL,
  `mensagem` varchar(500) DEFAULT NULL,
  `data_envio` datetime DEFAULT current_timestamp(),
  `visualizado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigoconfirmacao`
--

CREATE TABLE `codigoconfirmacao` (
  `id_codigo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `turno`, `nivel`) VALUES
(1, 'Analise e Desenvolvimento de Sistemas', 'Vespertino', 'Superior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinatarionotificacao`
--

CREATE TABLE `destinatarionotificacao` (
  `id_dest_not` int(11) NOT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encaminhamento`
--

CREATE TABLE `encaminhamento` (
  `id_encaminhamento` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `tipo_encaminhamento` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL,
  `id_remetente` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `id_encaminhamento` int(11) NOT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `mensagem` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivoencaminhamento`
--

CREATE TABLE `motivoencaminhamento` (
  `id_motivo` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `tipo_encaminhamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivorefenc`
--

CREATE TABLE `motivorefenc` (
  `id_mot_enc` int(11) NOT NULL,
  `id_encaminhamento` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` varchar(500) DEFAULT NULL,
  `imageUrl` varchar(150) DEFAULT NULL,
  `id_agendamento` int(11) DEFAULT NULL,
  `urlDestino` varchar(150) DEFAULT NULL,
  `prioridade` int(11) DEFAULT 0,
  `mensagemGeral` int(11) DEFAULT 0,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `enviado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `id_usuario` int(11) NOT NULL,
  `siape` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trocasenha`
--

CREATE TABLE `trocasenha` (
  `id_troSenha` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `email_confirmado` int(1) NOT NULL DEFAULT 1,
  `telefone_confirmado` int(1) NOT NULL DEFAULT 1,
  `administrador` int(1) NOT NULL,
  `ativo` int(1) NOT NULL,
  `deletado` int(1) NOT NULL,
  `facebook_id` varchar(150) NOT NULL,
  `is_foto_url` int(1) NOT NULL DEFAULT 0,
  `pre_cadastro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `senha`, `cpf`, `email`, `telefone`, `data_nasc`, `foto`, `token`, `data_cadastro`, `email_confirmado`, `telefone_confirmado`, `administrador`, `ativo`, `deletado`, `facebook_id`, `is_foto_url`, `pre_cadastro`) VALUES
(1, 'Daniel Zanini de Castro', '', '', 'zanini.castro@hotmail.com', '', '0000-00-00', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1475645079259296&height=800&width=800&ext=1587929524&hash=AeSsjpy8FP5soF0x', '', '2020-03-27 15:43:32', 1, 1, 2, 1, 0, '1475645079259296', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_remetente` (`id_remetente`),
  ADD KEY `id_destinatario` (`id_destinatario`);

--
-- Índices para tabela `codigoconfirmacao`
--
ALTER TABLE `codigoconfirmacao`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `destinatarionotificacao`
--
ALTER TABLE `destinatarionotificacao`
  ADD PRIMARY KEY (`id_dest_not`),
  ADD KEY `id_notificacao` (`id_notificacao`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `encaminhamento`
--
ALTER TABLE `encaminhamento`
  ADD PRIMARY KEY (`id_encaminhamento`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_servidor` (`id_servidor`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `id_remetente` (`id_remetente`),
  ADD KEY `id_destinatario` (`id_destinatario`),
  ADD KEY `id_encaminhamento` (`id_encaminhamento`);

--
-- Índices para tabela `motivoencaminhamento`
--
ALTER TABLE `motivoencaminhamento`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Índices para tabela `motivorefenc`
--
ALTER TABLE `motivorefenc`
  ADD PRIMARY KEY (`id_mot_enc`),
  ADD KEY `id_encaminhamento` (`id_encaminhamento`),
  ADD KEY `id_motivo` (`id_motivo`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Índices para tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `trocasenha`
--
ALTER TABLE `trocasenha`
  ADD PRIMARY KEY (`id_troSenha`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`,`email`,`telefone`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `codigoconfirmacao`
--
ALTER TABLE `codigoconfirmacao`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `destinatarionotificacao`
--
ALTER TABLE `destinatarionotificacao`
  MODIFY `id_dest_not` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `encaminhamento`
--
ALTER TABLE `encaminhamento`
  MODIFY `id_encaminhamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `motivoencaminhamento`
--
ALTER TABLE `motivoencaminhamento`
  MODIFY `id_motivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `motivorefenc`
--
ALTER TABLE `motivorefenc`
  MODIFY `id_mot_enc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `trocasenha`
--
ALTER TABLE `trocasenha`
  MODIFY `id_troSenha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `aluno_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_remetente`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `destinatarionotificacao`
--
ALTER TABLE `destinatarionotificacao`
  ADD CONSTRAINT `destinatarionotificacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `encaminhamento`
--
ALTER TABLE `encaminhamento`
  ADD CONSTRAINT `encaminhamento_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `encaminhamento_ibfk_2` FOREIGN KEY (`id_servidor`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`id_remetente`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `mensagem_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `mensagem_ibfk_3` FOREIGN KEY (`id_encaminhamento`) REFERENCES `encaminhamento` (`id_encaminhamento`);

--
-- Limitadores para a tabela `motivorefenc`
--
ALTER TABLE `motivorefenc`
  ADD CONSTRAINT `motivorefenc_ibfk_1` FOREIGN KEY (`id_encaminhamento`) REFERENCES `encaminhamento` (`id_encaminhamento`),
  ADD CONSTRAINT `motivorefenc_ibfk_2` FOREIGN KEY (`id_motivo`) REFERENCES `motivoencaminhamento` (`id_motivo`);

--
-- Limitadores para a tabela `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `servidor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `trocasenha`
--
ALTER TABLE `trocasenha`
  ADD CONSTRAINT `trocasenha_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
