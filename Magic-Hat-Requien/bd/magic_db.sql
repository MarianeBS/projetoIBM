-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2022 às 04:02
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `magic_db`
--
CREATE DATABASE IF NOT EXISTS `magic_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `magic_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user`, `nome`, `senha`) VALUES
(1, '@vek', 'Victor', '123456'),
(2, '@roma', 'Victor', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_carrinho`
--

CREATE TABLE `tbl_carrinho` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quant` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_carrinho`
--

INSERT INTO `tbl_carrinho` (`id`, `id_cliente`, `id_produto`, `quant`) VALUES
(1, 4, 10, 6),
(2, 4, 11, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id` int(10) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `estado` enum('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO','DF') NOT NULL,
  `preferencia` enum('Princesas','Carrinhos','Bonecos','Heróis','Jogos','Bonecas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `nome`, `sobrenome`, `email`, `senha`, `endereco`, `numero`, `cep`, `cidade`, `bairro`, `estado`, `preferencia`) VALUES
(2, 'Victor', 'Cardoso', 'vektromboni@gmail.com', '123456', 'Rua Nova Friburgo', '404', '03759040', 'São Paulo', 'Jardim Penha', 'SP', 'Jogos'),
(3, 'Mariane', 'Souza', 'mariane@gmail.com', '123456', 'Rua Dom Marcos Barbosa', '874', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Jogos'),
(4, 'João', 'Cabral', 'joao@gmail.com', '123456', 'Rua Dom Marcos Barbosa', '7543', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Heróis'),
(5, 'Victor', 'Roma', 'victor@gmail.com', '123456', 'Rua Nova Friburgo', '653', '03759040', 'São Paulo', 'Jardim Penha', 'SP', 'Jogos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_compras`
--

CREATE TABLE `tbl_compras` (
  `id` int(8) NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `data_compra` date NOT NULL,
  `quant` int(4) NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_compras`
--

INSERT INTO `tbl_compras` (`id`, `id_cliente`, `data_compra`, `quant`, `valor_total`) VALUES
(1, 2, '2022-11-19', 13, 746.27),
(2, 2, '2022-11-19', 1, 74.99),
(3, 2, '2022-11-20', 5, 2355.05),
(4, 2, '2022-11-20', 1, 72.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id` int(11) NOT NULL,
  `nome_contato` text COLLATE utf8_unicode_ci NOT NULL,
  `email_contato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `assunto` text COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_contato`
--

INSERT INTO `tbl_contato` (`id`, `nome_contato`, `email_contato`, `assunto`, `mensagem`) VALUES
(2, 'Victor', 'vektromboni@gmail.com', 'Compras não recebidas', 'Onde está minha encomenda????'),
(6, 'Mariane', 'mariane@gmail.com', 'Haha', 'sou linda hehe\r\n'),
(7, 'ad', 'vektromboni@gmail.com', 'adasd', 'asda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id` int(8) NOT NULL,
  `categoria` enum('Princesas','Carrinhos','Bonecos','Heróis','Jogos','Bonecas') NOT NULL,
  `nome` text NOT NULL,
  `tipo1` enum('Afetividade','Aprendizado','Cognição','Coordenação Motora','Criatividade','Ideias Divertidas','Imaginação','Raciocínio Lógico','Responsabilidade') NOT NULL,
  `tipo2` enum('Afetividade','Aprendizado','Cognição','Coordenação Motora','Criatividade','Ideias Divertidas','Imaginação','Raciocínio Lógico','Responsabilidade') NOT NULL,
  `faixa_etaria` enum('Criança','Pré-adolescente','Adolescente') NOT NULL,
  `quant` int(8) NOT NULL,
  `preco` double NOT NULL,
  `marca` varchar(25) NOT NULL,
  `material` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id`, `categoria`, `nome`, `tipo1`, `tipo2`, `faixa_etaria`, `quant`, `preco`, `marca`, `material`, `descricao`, `img1`, `img2`, `img3`) VALUES
(1, 'Bonecas', 'Mega Casa dos Sonhos da Barbie ', 'Imaginação', 'Criatividade', 'Criança', 21, 1090.99, 'Mattel', 'Plástico', 'A criançada vai adorar brincar com a Mega Casa dos Sonhos da Barbie, de três andares, com piscina, escorregador, elevador e muito mais.', 'img/produtos/1.jpg', 'img/produtos/2.jpg', 'img/produtos/3.jpg'),
(2, 'Bonecas', 'Baby Alive Hora do Xixi', 'Afetividade', 'Responsabilidade', 'Criança', 34, 55.99, 'Baby Alive', 'Plástico, vinil, borracha e tecido ', 'A Boneca Baby Alive Hora do Xixi vai garantir muita animação e carinho. Vem com acessórios. Dê água com a mamadeira e ela irá fazer xixi em sua fralda. ', 'img/produtos/4.jpg', 'img/produtos/5.jpg', 'img/produtos/6.jpg'),
(3, 'Bonecas', 'Super Kit Fashion da Polly Pocket', 'Criatividade', 'Imaginação', 'Criança', 11, 239.99, 'Mattel', 'Plástico', 'Prepare-se para a super coleção de moda da Polly e seus amigos. A coleção apresenta quatro bonecos: Polly, Lila, Shani e Nicolas e muitos acessórios para se divertir.  ', 'img/produtos/7.jpg', 'img/produtos/8.jpg', 'img/produtos/9.jpg'),
(4, 'Bonecas', 'LOL Surprise Lils', 'Criatividade', 'Afetividade', 'Criança', 140, 95.99, 'Candide', 'Plástico', 'As crianças ficarão encantadas com a LOL Surprise Lils que conta com cinco surpresas e, para ficar melhor, as lindas bonequinhas mudam de cor na água.    ', 'img/produtos/10.jpg', 'img/produtos/11.jpg', 'img/produtos/12.jpg'),
(5, 'Bonecas', 'Hermione Granger', 'Ideias Divertidas', 'Imaginação', 'Criança', 7, 143.99, 'Sunny', 'Plástico', 'A bruxinha mais inteligente e amada do mundo mágico agora nas suas mãos. Crie aventuras por Hogwarts com Hermione e seu companheiro Bichento.  ', 'img/produtos/13.jpg', 'img/produtos/14.jpg', 'img/produtos/15.jpg'),
(6, 'Heróis', 'Batman', 'Imaginação', 'Criatividade', 'Criança', 14, 51.69, 'Sunny ', 'Plástico ', 'Lute batalhas icônicas e incríveis com seu herói favorito da DC Comics: The Batman.  ', 'img/produtos/16.jpg', 'img/produtos/17.jpg', 'img/produtos/18.jpg'),
(7, 'Heróis', 'Omnitrix Lançador de Discos', 'Imaginação', 'Criatividade', 'Criança', 103, 120.85, 'Sunny ', 'Plástico ', 'Escolha seu alien favorito no Omnitrix Lançador de Discos e se prepare para vencer os oponentes que surgirem em seu caminho.', 'img/produtos/19.jpg', 'img/produtos/20.jpg', 'img/produtos/21.jpg'),
(8, 'Heróis', 'Conjunto de Jogos dos Vingadores', 'Raciocínio Lógico', 'Cognição', 'Criança', 28, 99.99, 'Toyster', 'Papel ', 'Um super kit com um quebra-cabeça de 200 peças, jogo da memória com 20 pares e um dominó com 28 peças. Tudo isso com seus heróis favoritos. ', 'img/produtos/22.jpg', 'img/produtos/23.jpg', 'img/produtos/24.jpg'),
(9, 'Heróis', 'Pantera Negra', 'Imaginação', 'Criatividade', 'Criança', 76, 210.25, 'Mimo', 'Vinil ', 'Boneco articulado do herói Pantera Negra dos Vingadores no filme Ultimato. ', 'img/produtos/25.jpg', 'img/produtos/26.jpg', 'img/produtos/27.jpg'),
(10, 'Heróis', 'Pelúcia Capitão América', 'Afetividade', 'Criatividade', 'Criança', 26, 123.69, 'Brand New', 'Algodão ', 'Uma pelúcia adoravelmente fofa do super-herói Capitão América para se divertir e abraçar bem forte.', 'img/produtos/28.jpg', 'img/produtos/29.jpg', 'img/produtos/30\r\n.jpg'),
(11, 'Princesas', 'Mini Castelo Mágico da Elsa', 'Imaginação', 'Criatividade', 'Criança', 8, 310.99, 'Alfabay', 'Plástico ', 'Divirta-se com Elsa do filme Frozen: Uma Aventura Congelante e seu incrível castelo mágico cheio de acessórios super congelantes e fofos.', 'img/produtos/31.jpg', 'img/produtos/32.jpg', 'img/produtos/33.jpg'),
(12, 'Princesas', 'Castelo de Celebrações Portátil', 'Imaginação', 'Criatividade', 'Criança', 78, 218.75, 'Disney Girls', 'Plástico ', 'Um castelo real incrível para realizar as celebrações das suas princesas favoritas com muitos acessórios e uma alça para que você possa levar para qualquer lugar. ', 'img/produtos/34.jpg', 'img/produtos/35.jpg', 'img/produtos/36.jpg'),
(13, 'Princesas', 'Moana Bebê', 'Imaginação', 'Afetividade', 'Criança', 14, 132.29, 'Cotiplás', 'Vinil ', 'Venha viver um mar de aventuras com a pequena Moana, de movimentos articulados, super fofa e cheia de detalhes.', 'img/produtos/37.jpg', 'img/produtos/38.jpg', 'img/produtos/39.jpg'),
(14, 'Princesas', 'Quebra-Cabeça da Bela', 'Raciocínio Lógico', 'Imaginação', 'Criança', 99, 29.99, 'Toyster', 'Papel', 'Divirta-se com o lindo quebra-cabeça da princesa Bela, com duzentas peças para montar sozinho ou com toda a família.', 'img/produtos/40.jpg', 'img/produtos/41.jpg', 'img/produtos/42.jpg'),
(15, 'Princesas', 'Kit Miniatura Princesas da Disney', 'Imaginação', 'Criatividade', 'Criança', 72, 165.19, 'Disney', 'PVC', 'Kit com oito lindas princesas da Disney em miniatura para colecionar. Vem com as personagens Cinderela, Rapunzel, Bela, Aurora, Jasmine, Tiana, Branca de Neve e Ariel.', 'img/produtos/43.jpg', 'img/produtos/44.jpg', 'img/produtos/45.jpg'),
(16, 'Carrinhos', 'Coleção Carrinhos da Hot Wheels', 'Imaginação', 'Criatividade', 'Criança', 201, 245.23, 'Hot Wheels', 'Metal, plástico e papel', 'Coleção com 20 unidades de carrinhos da Hot Wheels para altas aventuras sobre rodas.', 'img/produtos/46.jpg', 'img/produtos/47.jpg', 'img/produtos/47.jpg'),
(17, 'Carrinhos', 'Caminhão Maleta', 'Imaginação', 'Criatividade', 'Criança', 85, 182.57, 'DM Toys', 'Plástico', 'Caminhão de Bombeiros que serve de para um kit de cinco carrinhos, um helicóptero e diversos acessórios como placas e cones. Tudo isso para garantir diversão e aventuras.', 'img/produtos/49.jpg', 'img/produtos/50.jpg', 'img/produtos/51.jpg'),
(18, 'Carrinhos', 'Garagem da Hot Wheels', 'Imaginação', 'Criatividade', 'Criança', 17, 204.99, 'Hot Wheels', 'Plástico ', 'Garagem da Hot Wheels com vários andares e um elevador para estacionar seus carrinhos enquanto esperam pela próxima aventura sobre rodas. ', 'img/produtos/52.jpg', 'img/produtos/53.jpg', 'img/produtos/54.jpg'),
(19, 'Carrinhos', 'Carro de Polícia', 'Imaginação', 'Responsabilidade', 'Criança', 69, 81.95, 'Roma Jensen', 'Polipropileno', 'Uma incrível picape policial na cor preta e cheia de adesivos para garantir a diversão e fazer com que as perseguições policiais se tornem únicas.', 'img/produtos/55.jpg', 'img/produtos/56.jpg', 'img/produtos/57.jpg'),
(20, 'Carrinhos', 'Relâmpago McQueen', 'Imaginação', 'Criatividade', 'Criança', 93, 155.99, 'Toyng', 'Plástico', 'Carro Relâmpago McQueen do Filme Carros. Diversão garantida com as rodas à fricção, garantindo velocidade em todas as corridas disputadas.', 'img/produtos/58.jpg', 'img/produtos/59.jpg', 'img/produtos/60.jpg'),
(21, 'Jogos', 'Caiu Perdeu', 'Coordenação Motora', 'Afetividade', 'Pré-adolescente', 127, 22.55, 'Pais e Filhos', 'Madeira de Engenharia', 'Um jogo divertido para colocar em cheque a coordenação motora da galera ao retirar e colocar as peças sem derrubar os outros blocos empilhados.', 'img/produtos/61.jpg', 'img/produtos/62.jpg', 'img/produtos/63.jpg'),
(22, 'Jogos', 'Uno Minimalista', 'Raciocínio Lógico', 'Afetividade', 'Adolescente', 198, 29.99, 'UNO', 'Papel', 'Diversão e competição para toda a família e amigos com o Uno Minimalista. Cheio de detalhes e com um design totalmente novo especialmente para você. ', 'img/produtos/64.jpg', 'img/produtos/65.jpg', 'img/produtos/66.jpg'),
(23, 'Jogos', 'Perguntados', 'Cognição', 'Aprendizado', 'Pré-adolescente', 24, 72.81, 'Copag', 'Papelão', 'Desafie seus conhecimentos com a nova versão desse jogo de perguntas e respostas de diversas áreas como Entretenimento, História, Esportes, Arte, Geografia e Ciência. ', 'img/produtos/67.jpg', 'img/produtos/68.jpg', 'img/produtos/69\r\n.jpg'),
(24, 'Jogos', 'Xadrez de O Senhor dos Anéis', 'Raciocínio Lógico', 'Afetividade', 'Adolescente', 56, 329.89, 'The Noble Collection', 'Resina, tecido e papel', 'Batalhe pelo bem ou pelo mal da Terra Média com o xadrez cheio de detalhes de O Senhor dos Anéis. ', 'img/produtos/70.jpg', 'img/produtos/71.jpg', 'img/produtos/72.jpg'),
(25, 'Jogos', 'Dominó das Frutas', 'Raciocínio Lógico', 'Aprendizado', 'Pré-adolescente', 110, 27.99, 'Toyster', 'Papelão', 'Divirta-se e aprenda com o dominó a reconhecer o nome das frutas tanto em inglês quanto em português enquanto testa seu raciocínio, vencendo seus oponentes.', 'img/produtos/73.jpg', 'img/produtos/74.jpg', 'img/produtos/75.jpg'),
(26, 'Jogos', 'Cara a Cara Toy Story 4', 'Cognição', 'Aprendizado', 'Pré-adolescente', 72, 95.79, 'Estrela', 'Cartonado e plástico', 'O desafio é garantido nesse jogo onde os oponentes ficam cara a cara e tentam descobrir qual é o personagem um do outro através de perguntas.', 'img/produtos/76.jpg', 'img/produtos/77.jpg', 'img/produtos/78.jpg'),
(27, 'Bonecos', 'Patrick Estrela', 'Imaginação', 'Criatividade', 'Criança', 9, 94.18, 'Líder Brinquedos', 'Vinil', 'O brinquedo ideal para todos os fãs de Bob Esponja chegou: boneco Patrick Estrela articulado, trazendo consigo toda a nostalgia da Fenda do Biquíni.', 'img/produtos/79.jpg', 'img/produtos/80.jpg', 'img/produtos/81.jpg'),
(28, 'Bonecas', 'Funko Pop Noiva Cadáver', 'Imaginação', 'Criatividade', 'Pré-adolescente', 74, 242.15, 'Funko', 'Vinil', 'Agora Emily, de A Noiva Cadáver está prontinha para fazer parte da sua coleção de Funkos. Cheia de detalhes e pronta para o casamento bem na sua estante. ', 'img/produtos/82.jpg', 'img/produtos/83.jpg', 'img/produtos/84.jpg'),
(29, 'Bonecos', 'Pelúcia Chase da Patrulha Canina ', 'Afetividade', 'Criatividade', 'Criança', 99, 97.49, 'Sunny', 'Fibras', 'Juntamente com Chase e seus amigos, venha se juntar às aventuras da Patrulha Canina para salvar o dia.', 'img/produtos/85.jpg', 'img/produtos/86.jpg', 'img/produtos/87.jpg'),
(30, 'Bonecas', 'Action Figure da Sailor Moon', 'Imaginação', 'Criatividade', 'Adolescente', 59, 1119.21, 'Bandai Spirits', 'PVC', 'O que acha de iniciar uma coleção de action figures com a linda Action Figure da Sailor Moon? Beleza e criatividade bem na sua estante!.', 'img/produtos/88.jpg', 'img/produtos/89.jpg', 'img/produtos/90.jpg'),
(31, 'Bonecos', 'Sasuke Uchiha', 'Imaginação', 'Criatividade', 'Pré-adolescente', 78, 213.15, 'Fun', 'Plástico', 'Participe de muitas missões e aventuras com o boneco articulado Sasuke, o ninja mais poderoso do clã Uchiha.', 'img/produtos/91.jpg', 'img/produtos/92.jpg', 'img/produtos/93.jpg'),
(32, 'Bonecos', 'Baby Yoda de Star Wars', 'Imaginação', 'Criatividade', 'Pré-adolescente', 109, 165.15, 'Mattel', 'Plástico', 'Tenha sua própria versão do adorável Baby Yoda de Star Wars para apertar e chamar de seu.', 'img/produtos/94.jpg', 'img/produtos/95.jpg', 'img/produtos/96.jpg'),
(33, 'Bonecos', 'Funko Pop Geralt de Rívia', 'Imaginação', 'Criatividade', 'Adolescente', 18, 145.95, 'Funko', 'Vinil', 'O grande bruxo de Rívia agora pode se juntar à sua coleção. Diretamente do universo de The Witcher e cheio de detalhes.', 'img/produtos/97.jpg', 'img/produtos/98.jpg', 'img/produtos/99.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_carrinho`
--
ALTER TABLE `tbl_carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_carrinho`
--
ALTER TABLE `tbl_carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_carrinho`
--
ALTER TABLE `tbl_carrinho`
  ADD CONSTRAINT `tbl_carrinho_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`),
  ADD CONSTRAINT `tbl_carrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id`);

--
-- Limitadores para a tabela `tbl_compras`
--
ALTER TABLE `tbl_compras`
  ADD CONSTRAINT `tbl_compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
