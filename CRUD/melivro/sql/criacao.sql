DROP DATABASE IF EXISTS melivro;
CREATE DATABASE melivro;

use melivro;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melivro`
--

-- --------------------------------------------------------

--
-- Table structure for table `anuncio`
--

CREATE TABLE `anuncio` (
  `CODANUNCIO` int(11) NOT NULL,
  `TIPO_PRODUTO` varchar(15) NOT NULL,
  `ATIVO` tinyint(1) NOT NULL,
  `DATA_PUBLICACAO` date NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `CODPROD` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `CODAVALIACAO` int(11) NOT NULL,
  `NOTA` int(11) NOT NULL,
  `COMENTARIO` varchar(35) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `AUTOR` varchar(25) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `EDICAO` int(11) NOT NULL,
  `CODPROD` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livro`
--

INSERT INTO `livro` (`AUTOR`, `ISBN`, `EDICAO`, `CODPROD`) VALUES
('Bira', '123455', 2, 1),
('Manuel Madeira', '123455', 1, 2),
('Manuel Madeira', '123455', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `CODPAG` int(11) NOT NULL,
  `METODO_PAG` varchar(30) NOT NULL,
  `VALOR` decimal(10,2) NOT NULL,
  `CONCRETIZADO` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `AUTOR` varchar(30) NOT NULL,
  `COAUTOR` varchar(32) DEFAULT NULL,
  `AREA_CONHECIMENTO` varchar(20) NOT NULL,
  `ANO_PUBLICACAO` year(4) NOT NULL,
  `INSTITUICAO` varchar(20) NOT NULL,
  `CODPROD` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`AUTOR`, `COAUTOR`, `AREA_CONHECIMENTO`, `ANO_PUBLICACAO`, `INSTITUICAO`, `CODPROD`) VALUES
('Manuel Correia', '', 'Exatas', 2002, 'UFPEL', 4),
('Miguelito', '', 'Humanas', 2012, 'UCPEL', 5),
('paperzao', '', '', 1950, '', 88);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `CODPEDIDO` int(11) NOT NULL,
  `STATUS_PED` tinyint(1) NOT NULL,
  `DATA_PEDIDO` date NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE `pessoa` (
  `CPF` varchar(14) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `SENHA` varchar(15) NOT NULL,
  `ADMIN` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`CPF`, `NOME`, `EMAIL`, `SENHA`, `ADMIN`) VALUES
('43433', '', '', '', 0),
('30219313', 'hello', 'dksajkdsaj', 'dksamdsa', 0),
('12345', 'guizao', 'guizao@ddd', '', 0),
('2313213', 'dsasadds', '', 'das', 0),
('1315', 'ola', 'oekaok', 'gell', 0),
('1555', 'guilherme', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `CODPROD` int(11) NOT NULL,
  `TIPOPRODUTO` tinyint(4) NOT NULL,
  `TITULO` varchar(35) NOT NULL,
  `PRECO` decimal(5,2) NOT NULL,
  `DESCRICAO` varchar(52) NOT NULL,
  `IMAGEM` varchar(52) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`CODPROD`, `TIPOPRODUTO`, `TITULO`, `PRECO`, `DESCRICAO`, `IMAGEM`) VALUES
(1, 0, 'Biografia Bira', '250.00', 'Livro do bira', 'url'),
(2, 0, 'Livro dois', '250.00', 'Livro dois', 'url2'),
(3, 0, 'Biografia tres', '10.00', 'Livro tres', 'url3'),
(4, 0, 'Artigo1', '550.00', 'Artigo 1', 'urlArtigo1'),
(5, 0, 'Artigo dois', '250.00', 'Artigo 2', 'urlArtigo2'),
(6, 0, 'Revista', '999.99', 'Revista buena', 'urlbuena'),
(82, 1, 'testandopaper', '1.00', '', ''),
(81, 1, 'testandopaper', '1.00', '', ''),
(80, 0, 'dsadsadas', '1.00', '', ''),
(79, 0, 'dale', '1.00', '', ''),
(78, 0, 'daleeeeeegremio', '1.00', '', ''),
(70, 0, 'dsadas', '1.00', 'dassad', 'dsadsa'),
(69, 0, 'dsa', '1.00', 'dsa', 'asd'),
(68, 0, 'dasdsa', '1.00', 'ads', 'asd'),
(77, 0, 'eitaaaaaaaaaa', '1.00', '', ''),
(66, 0, 'dosmano', '1.00', 'edas', 'mina'),
(65, 0, 'testando', '1.00', 'testandoagora', 'agora'),
(64, 0, 'zero', '3.00', 'zerozero', 'zeromeubem'),
(83, 1, 'testandopaper', '1.00', '', ''),
(84, 1, 'dsaasads', '1.00', '', ''),
(85, 1, 'testandopaper3', '1.00', '', ''),
(86, 1, 'dasasddsa', '1.00', '', ''),
(87, 1, 'dasasddsa', '1.00', '', ''),
(88, 1, 'testandooopaperrr', '1.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produto_pedido`
--

CREATE TABLE `produto_pedido` (
  `CODPROD` int(11) NOT NULL,
  `CODPEDIDO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revista`
--

CREATE TABLE `revista` (
  `ISSN` varchar(30) NOT NULL,
  `EDITORA` varchar(25) NOT NULL,
  `CODPROD` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revista`
--

INSERT INTO `revista` (`ISSN`, `EDITORA`, `CODPROD`) VALUES
('524523', 'Abril', 6),
('52432', 'Globo', 7),
('3123', 'dsadsa', 11),
('', '', 78),
('', '', 77),
('', '', 79),
('', '', 80);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `CIDADE` varchar(20) NOT NULL,
  `ENDERECO` varchar(30) NOT NULL,
  `TELEFONE` varchar(16) NOT NULL,
  `SEXO` varchar(1) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`CIDADE`, `ENDERECO`, `TELEFONE`, `SEXO`, `CPF`) VALUES
('', '', '', '', ''),
('', 'sdaasd', '', 'f', '2313213'),
('oksaodk', 'oekasoek', '32131', 'f', '1315'),
('', '', '', 'f', '1555');

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `CODVENDA` int(11) NOT NULL,
  `VALOR_VENDA` decimal(10,2) NOT NULL,
  `DATA_VENDA` date NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `CODPAG` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venda_pedido`
--

CREATE TABLE `venda_pedido` (
  `CODPEDIDO` int(11) NOT NULL,
  `CODVENDA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`CODANUNCIO`),
  ADD KEY `CPF` (`CPF`),
  ADD KEY `CODPROD` (`CODPROD`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`CODAVALIACAO`),
  ADD KEY `CPF` (`CPF`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD KEY `CODPROD` (`CODPROD`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`CODPAG`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD KEY `CODPROD` (`CODPROD`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`CODPEDIDO`),
  ADD KEY `CPF` (`CPF`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`CODPROD`);

--
-- Indexes for table `produto_pedido`
--
ALTER TABLE `produto_pedido`
  ADD PRIMARY KEY (`CODPROD`,`CODPEDIDO`),
  ADD KEY `CODPEDIDO` (`CODPEDIDO`);

--
-- Indexes for table `revista`
--
ALTER TABLE `revista`
  ADD KEY `CODPROD` (`CODPROD`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD KEY `CPF` (`CPF`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`CODVENDA`),
  ADD KEY `CPF` (`CPF`),
  ADD KEY `CODPAG` (`CODPAG`);

--
-- Indexes for table `venda_pedido`
--
ALTER TABLE `venda_pedido`
  ADD PRIMARY KEY (`CODPEDIDO`,`CODVENDA`),
  ADD KEY `CODVENDA` (`CODVENDA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `CODPROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
