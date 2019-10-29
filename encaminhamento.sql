-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2019 às 12:49
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `encaminhamento`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_usuario`, `matricula`, `apelido`, `id_curso`) VALUES
(1, '2017007243', 'Daniel', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigoconfirmacao`
--

CREATE TABLE `codigoconfirmacao` (
  `id_codigo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `turno`, `nivel`) VALUES
(1, 'Analise e Desenvolvimento de Sistemas', 'Vespertino', 'Superior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encaminhamento`
--

CREATE TABLE `encaminhamento` (
  `id_encaminhamento` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `gravidade` varchar(50) NOT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `tipo_encaminhamento` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivoencaminhamento`
--

CREATE TABLE `motivoencaminhamento` (
  `id_motivo` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `tipo_encaminhamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivorefenc`
--

CREATE TABLE `motivorefenc` (
  `id_mot_enc` int(11) NOT NULL,
  `id_encaminhamento` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `id_usuario` int(11) NOT NULL,
  `siape` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestaorefenc`
--

CREATE TABLE `sugestaorefenc` (
  `id_sug_enc` int(11) NOT NULL,
  `id_encaminhamento` int(11) NOT NULL,
  `id_sugestao_resolucao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestaoresolucao`
--

CREATE TABLE `sugestaoresolucao` (
  `id_sugestao` int(11) NOT NULL,
  `sugestao_resolucao` varchar(100) NOT NULL,
  `tipo_encaminhamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativaresolucao`
--

CREATE TABLE `tentativaresolucao` (
  `id_tentativa` int(11) NOT NULL,
  `tentativa_resolucao` varchar(100) NOT NULL,
  `tipo_encaminhamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentavivarefenc`
--

CREATE TABLE `tentavivarefenc` (
  `id_ten_enc` int(11) NOT NULL,
  `id_encaminhamento` int(11) NOT NULL,
  `id_tentativa_resolucao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `administrador` int(1) DEFAULT 0,
  `confirmado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `administrador`, `confirmado`) VALUES
(1, 'Daniel Zanini de Castro', 'zanini.castro@hotmail.com', '202cb962ac59075b964b07152d234b70', 0, 0);

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
-- Índices para tabela `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `sugestaorefenc`
--
ALTER TABLE `sugestaorefenc`
  ADD PRIMARY KEY (`id_sug_enc`),
  ADD KEY `id_encaminhamento` (`id_encaminhamento`),
  ADD KEY `id_sugestao_resolucao` (`id_sugestao_resolucao`);

--
-- Índices para tabela `sugestaoresolucao`
--
ALTER TABLE `sugestaoresolucao`
  ADD PRIMARY KEY (`id_sugestao`);

--
-- Índices para tabela `tentativaresolucao`
--
ALTER TABLE `tentativaresolucao`
  ADD PRIMARY KEY (`id_tentativa`);

--
-- Índices para tabela `tentavivarefenc`
--
ALTER TABLE `tentavivarefenc`
  ADD PRIMARY KEY (`id_ten_enc`),
  ADD KEY `id_encaminhamento` (`id_encaminhamento`),
  ADD KEY `id_tentativa_resolucao` (`id_tentativa_resolucao`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `sugestaorefenc`
--
ALTER TABLE `sugestaorefenc`
  MODIFY `id_sug_enc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sugestaoresolucao`
--
ALTER TABLE `sugestaoresolucao`
  MODIFY `id_sugestao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tentativaresolucao`
--
ALTER TABLE `tentativaresolucao`
  MODIFY `id_tentativa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tentavivarefenc`
--
ALTER TABLE `tentavivarefenc`
  MODIFY `id_ten_enc` int(11) NOT NULL AUTO_INCREMENT;

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
-- Limitadores para a tabela `codigoconfirmacao`
--
ALTER TABLE `codigoconfirmacao`
  ADD CONSTRAINT `codigoconfirmacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
-- Limitadores para a tabela `sugestaorefenc`
--
ALTER TABLE `sugestaorefenc`
  ADD CONSTRAINT `sugestaorefenc_ibfk_1` FOREIGN KEY (`id_encaminhamento`) REFERENCES `encaminhamento` (`id_encaminhamento`),
  ADD CONSTRAINT `sugestaorefenc_ibfk_2` FOREIGN KEY (`id_sugestao_resolucao`) REFERENCES `sugestaoresolucao` (`id_sugestao`);

--
-- Limitadores para a tabela `tentavivarefenc`
--
ALTER TABLE `tentavivarefenc`
  ADD CONSTRAINT `tentavivarefenc_ibfk_1` FOREIGN KEY (`id_encaminhamento`) REFERENCES `encaminhamento` (`id_encaminhamento`),
  ADD CONSTRAINT `tentavivarefenc_ibfk_2` FOREIGN KEY (`id_tentativa_resolucao`) REFERENCES `tentativaresolucao` (`id_tentativa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
