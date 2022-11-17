-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2022 às 07:51
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
(2, 4, 11, 25),
(15, 2, 31, 1),
(20, 2, 6, 1),
(22, 2, 7, 1);

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
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `estado` enum('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO','DF') NOT NULL,
  `preferencia` enum('Princesas','Carrinhos','Bonecos','Heróis','Jogos','Bonecas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `nome`, `sobrenome`, `email`, `senha`, `endereco`, `cep`, `cidade`, `bairro`, `estado`, `preferencia`) VALUES
(2, 'Victor', 'Cardoso', 'vektromboni@gmail.com', 'victor19', 'Rua Nova Friburgo', '03759040', 'São Paulo', 'Jardim Penha', 'SP', 'Jogos'),
(3, 'Mariane', 'Souza', 'mariane@gmail.com', '123456', 'Rua Dom Marcos Barbosa', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Jogos'),
(4, 'João', 'Cabral', 'joao@gmail.com', '123456', 'Rua Dom Marcos Barbosa', '08485200', 'São Paulo', 'Conjunto Habitacional Santa Etelvina II', 'SP', 'Heróis'),
(5, 'Victor', 'Roma', 'victor@gmail.com', '123456', 'Rua Nova Friburgo', '03759040', 'São Paulo', 'Jardim Penha', 'SP', 'Jogos');

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
  `tipo` text NOT NULL,
  `faixa_etaria` enum('Criança','Pré-adolescente','Adolescente') NOT NULL,
  `quant` int(8) NOT NULL,
  `preco` double NOT NULL,
  `marca` varchar(25) NOT NULL,
  `material` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `filtro` enum('filter-princesas','filter-carrinhos','filter-bonecos','filter-herois','filter-jogos','filter-bonecas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id`, `categoria`, `nome`, `tipo`, `faixa_etaria`, `quant`, `preco`, `marca`, `material`, `descricao`, `img1`, `img2`, `img3`, `filtro`) VALUES
(1, 'Bonecas', 'Mega Casa dos Sonhos da Barbie ', 'Imaginação e Criatividade', 'Criança', 25, 1090.99, 'Mattel', 'Plástico', 'A criançada vai adorar brincar com a Mega Casa dos Sonhos da Barbie, de três andares, com piscina, escorregador, elevador e muito mais.', 'img/produtos/1.jpg', 'img/produtos/2.jpg', 'img/produtos/3.jpg', 'filter-bonecas'),
(2, 'Bonecas', 'Baby Alive Hora do Xixi', 'Afetividade e Responsabilidade', 'Criança', 40, 55.99, 'Baby Alive', 'Plástico, vinil, borracha e tecido ', 'A Boneca Baby Alive Hora do Xixi vai garantir muita animação e carinho. Vem com acessórios. Dê água com a mamadeira e ela irá fazer xixi em sua fralda. ', 'img/produtos/4.jpg', 'img/produtos/5.jpg', 'img/produtos/6.jpg', 'filter-bonecas'),
(3, 'Bonecas', 'Super Kit Fashion da Polly Pocket', 'Criatividade', 'Criança', 12, 239.99, 'Mattel', 'Plástico', 'Prepare-se para a super coleção de moda da Polly e seus amigos. A coleção apresenta quatro bonecos: Polly, Lila, Shani e Nicolas e muitos acessórios para se divertir.  ', 'img/produtos/7.jpg', 'img/produtos/8.jpg', 'img/produtos/9.jpg', 'filter-bonecas'),
(4, 'Bonecas', 'LOL Surprise Lils', 'Criatividade', 'Criança', 140, 95.99, 'Candide', 'Plástico', 'As crianças ficarão encantadas com a LOL Surprise Lils que conta com cinco surpresas e, para ficar melhor, as lindas bonequinhas mudam de cor na água.    ', 'img/produtos/10.jpg', 'img/produtos/11.jpg', 'img/produtos/12.jpg', 'filter-bonecas'),
(5, 'Bonecas', 'Hermione Granger', 'Ideias Divertidas', 'Criança', 7, 143.99, 'Sunny', 'Plástico', 'A bruxinha mais inteligente e amada do mundo mágico agora nas suas mãos. Crie aventuras por Hogwarts com Hermione e seu companheiro Bichento.  ', 'img/produtos/13.jpg', 'img/produtos/14.jpg', 'img/produtos/15.jpg', 'filter-bonecas'),
(6, 'Heróis', 'Batman', 'Imaginação e Criatividade', 'Criança', 21, 51.69, 'Sunny ', 'Plástico ', 'Lute batalhas icônicas e incríveis com seu herói favorito da DC Comics: The Batman.  ', 'img/produtos/16.jpg', 'img/produtos/17.jpg', 'img/produtos/18.jpg', 'filter-herois'),
(7, 'Heróis', 'Omnitrix Lançador de Discos', 'Imaginação e Criatividade ', 'Criança', 103, 120.85, 'Sunny ', 'Plástico ', 'Escolha seu alien favorito no Omnitrix Lançador de Discos e se prepare para vencer os oponentes que surgirem em seu caminho.', 'img/produtos/19.jpg', 'img/produtos/20.jpg', 'img/produtos/21.jpg', 'filter-herois'),
(8, 'Heróis', 'Conjunto de Jogos dos Vingadores', 'Raciocínio Lógico ', 'Criança', 28, 99.99, 'Toyster', 'Papel ', 'Um super kit com um quebra-cabeça de 200 peças, jogo da memória com 20 pares e um dominó com 28 peças. Tudo isso com seus heróis favoritos. ', 'img/produtos/22.jpg', 'img/produtos/23.jpg', 'img/produtos/24.jpg', 'filter-herois'),
(9, 'Heróis', 'Pantera Negra', 'Imaginação e Criatividade', 'Criança', 77, 210.25, 'Mimo', 'Vinil ', 'Boneco articulado do herói Pantera Negra dos Vingadores no filme Ultimato. ', 'img/produtos/25.jpg', 'img/produtos/26.jpg', 'img/produtos/27.jpg', 'filter-herois'),
(10, 'Heróis', 'Pelúcia Capitão América', 'Afetividade e Criatividade ', 'Criança', 26, 123.69, 'Brand New', 'Algodão ', 'Uma pelúcia adoravelmente fofa do super-herói Capitão América para se divertir e abraçar bem forte.', 'img/produtos/28.jpg', 'img/produtos/29.jpg', 'img/produtos/30\r\n.jpg', 'filter-herois'),
(11, 'Princesas', 'Mini Castelo Mágico da Elsa', 'Imaginação e Criatividad', 'Criança', 8, 310.99, 'Alfabay', 'Plástico ', 'Divirta-se com Elsa do filme Frozen: Uma Aventura Congelante e seu incrível castelo mágico cheio de acessórios super congelantes e fofos.', 'img/produtos/31.jpg', 'img/produtos/32.jpg', 'img/produtos/33.jpg', 'filter-princesas'),
(12, 'Princesas', 'Castelo de Celebrações Portátil', 'Imaginação e Criatividade', 'Criança', 78, 218.74, 'Disney Girls', 'Plástico ', 'Um castelo real incrível para realizar as celebrações das suas princesas favoritas com muitos acessórios e uma alça para que você possa levar para qualquer lugar. ', 'img/produtos/34.jpg', 'img/produtos/35.jpg', 'img/produtos/36.jpg', 'filter-princesas'),
(13, 'Princesas', 'Moana Bebê', 'Imaginação e Afetividade', 'Criança', 14, 132.29, 'Cotiplás', 'Vinil ', 'Venha viver um mar de aventuras com a pequena Moana, de movimentos articulados, super fofa e cheia de detalhes.', 'img/produtos/37.jpg', 'img/produtos/38.jpg', 'img/produtos/39.jpg', 'filter-princesas'),
(14, 'Princesas', 'Quebra-Cabeça da Bela', 'Raciocínio Lógico', 'Criança', 99, 29.99, 'Toyster', 'Papel', 'Divirta-se com o lindo quebra-cabeça da princesa Bela, com duzentas peças para montar sozinho ou com toda a família.', 'img/produtos/40.jpg', 'img/produtos/41.jpg', 'img/produtos/42.jpg', 'filter-princesas'),
(15, 'Princesas', 'Kit Miniatura Princesas da Disney', 'Imaginação e Criatividade', 'Criança', 72, 165.19, 'Disney', 'PVC', 'Kit com oito lindas princesas da Disney em miniatura para colecionar. Vem com as personagens Cinderela, Rapunzel, Bela, Aurora, Jasmine, Tiana, Branca de Neve e Ariel.', 'img/produtos/43.jpg', 'img/produtos/44.jpg', 'img/produtos/45.jpg', 'filter-princesas'),
(16, 'Carrinhos', 'Coleção Carrinhos da Hot Wheels', 'Imaginação e Criatividade', 'Criança', 201, 245.23, 'Hot Wheels', 'Metal, plástico e papel', 'Coleção com 20 unidades de carrinhos da Hot Wheels para altas aventuras sobre rodas.', 'img/produtos/46.jpg', 'img/produtos/47.jpg', 'img/produtos/48.jpg', 'filter-carrinhos'),
(17, 'Carrinhos', 'Caminhão Maleta', 'Imaginação e Criatividade', 'Criança', 85, 182.57, 'DM Toys', 'Plástico', 'Caminhão de Bombeiros que serve de para um kit de cinco carrinhos, um helicóptero e diversos acessórios como placas e cones. Tudo isso para garantir diversão e aventuras.', 'img/produtos/49.jpg', 'img/produtos/50.jpg', 'img/produtos/51.jpg', 'filter-carrinhos'),
(18, 'Carrinhos', 'Garagem da Hot Wheels', 'Imaginação e Criatividade', 'Criança', 17, 204.99, 'Hot Wheels', 'Plástico ', 'Garagem da Hot Wheels com vários andares e um elevador para estacionar seus carrinhos enquanto esperam pela próxima aventura sobre rodas. ', 'img/produtos/52.jpg', 'img/produtos/53.jpg', 'img/produtos/54.jpg', 'filter-carrinhos'),
(19, 'Carrinhos', 'Carro de Polícia', 'Imaginação e Responsabilidade', 'Criança', 69, 81.95, 'Roma Jensen', 'Polipropileno', 'Uma incrível picape policial na cor preta e cheia de adesivos para garantir a diversão e fazer com que as perseguições policiais se tornem únicas.', 'img/produtos/55.jpg', 'img/produtos/56.jpg', 'img/produtos/57.jpg', 'filter-carrinhos'),
(20, 'Carrinhos', 'Relâmpago McQueen', 'Imaginação e Criatividade ', 'Criança', 93, 155.99, 'Toyng', 'Plástico', 'Carro Relâmpago McQueen do Filme Carros. Diversão garantida com as rodas à fricção, garantindo velocidade em todas as corridas disputadas.', 'img/produtos/58.jpg', 'img/produtos/59.jpg', 'img/produtos/60.jpg', 'filter-carrinhos'),
(21, 'Jogos', 'Caiu Perdeu', 'Coordenação Motora', 'Pré-adolescente', 127, 22.55, 'Pais e Filhos', 'Madeira de Engenharia', 'Um jogo divertido para colocar em cheque a coordenação motora da galera ao retirar e colocar as peças sem derrubar os outros blocos empilhados.', 'img/produtos/61.jpg', 'img/produtos/62.jpg', 'img/produtos/63.jpg', 'filter-jogos'),
(22, 'Jogos', 'Uno Minimalista', 'Raciocínio Lógico', 'Adolescente', 198, 29.99, 'UNO', 'Papel', 'Diversão e competição para toda a família e amigos com o Uno Minimalista. Cheio de detalhes e com um design totalmente novo especialmente para você. ', 'img/produtos/64.jpg', 'img/produtos/65.jpg', 'img/produtos/66.jpg', 'filter-jogos'),
(23, 'Jogos', 'Perguntados', 'Cognição e Aprendizado', 'Pré-adolescente', 24, 72.81, 'Copag', 'Papelão', 'Desafie seus conhecimentos com a nova versão desse jogo de perguntas e respostas de diversas áreas como Entretenimento, História, Esportes, Arte, Geografia e Ciência. ', 'img/produtos/67.jpg', 'img/produtos/68.jpg', 'img/produtos/69\r\n.jpg', 'filter-jogos'),
(24, 'Jogos', 'Xadrez de O Senhor dos Anéis', 'Raciocínio Lógico', 'Adolescente', 56, 329.89, 'The Noble Collection', 'Resina, tecido e papel', 'Batalhe pelo bem ou pelo mal da Terra Média com o xadrez cheio de detalhes de O Senhor dos Anéis. ', 'img/produtos/70.jpg', 'img/produtos/71.jpg', 'img/produtos/72.jpg', 'filter-jogos'),
(25, 'Jogos', 'Dominó das Frutas', 'Raciocínio Lógico, Cognição e Aprendizado', 'Pré-adolescente', 110, 27.99, 'Toyster', 'Papelão', 'Divirta-se e aprenda com o dominó a reconhecer o nome das frutas tanto em inglês quanto em português enquanto testa seu raciocínio, vencendo seus oponentes.', 'img/produtos/73.jpg', 'img/produtos/74.jpg', 'img/produtos/75.jpg', 'filter-jogos'),
(26, 'Jogos', 'Cara a Cara Toy Story 4', 'Cognição e Aprendizado', 'Pré-adolescente', 72, 95.79, 'Estrela', 'Cartonado e plástico', 'O desafio é garantido nesse jogo onde os oponentes ficam cara a cara e tentam descobrir qual é o personagem um do outro através de perguntas.', 'img/produtos/76.jpg', 'img/produtos/77.jpg', 'img/produtos/78.jpg', 'filter-jogos'),
(27, 'Bonecos', 'Patrick Estrela', 'Imaginação e Criatividade', 'Criança', 9, 94.18, 'Líder Brinquedos', 'Vinil', 'O brinquedo ideal para todos os fãs de Bob Esponja chegou: boneco Patrick Estrela articulado, trazendo consigo toda a nostalgia da Fenda do Biquíni.', 'img/produtos/79.jpg', 'img/produtos/80.jpg', 'img/produtos/81.jpg', 'filter-bonecos'),
(28, 'Bonecas', 'Funko Pop Noiva Cadáver', 'Imaginação e Criatividade', 'Pré-adolescente', 74, 242.15, 'Funko', 'Vinil', 'Agora Emily, de A Noiva Cadáver está prontinha para fazer parte da sua coleção de Funkos. Cheia de detalhes e pronta para o casamento bem na sua estante. ', 'img/produtos/82.jpg', 'img/produtos/83.jpg', 'img/produtos/84.jpg', 'filter-bonecas'),
(29, 'Bonecos', 'Pelúcia Chase da Patrulha Canina ', 'Afetividade e Criatividade ', 'Criança', 99, 97.49, 'Sunny', 'Fibras', 'Juntamente com Chase e seus amigos, venha se juntar às aventuras da Patrulha Canina para salvar o dia.', 'img/produtos/85.jpg', 'img/produtos/86.jpg', 'img/produtos/87.jpg', 'filter-bonecos'),
(30, 'Bonecas', 'My Little Pony Princesa Pipp Petals', 'Imaginação e Criatividade', 'Criança', 59, 79.21, 'My Little Pony', 'Plástico', 'A Princesa Pipp Petals está pronta para viver grandes e emocionantes aventuras juntamente com você.', 'img/produtos/88.jpg', 'img/produtos/89.jpg', 'img/produtos/90.jpg', 'filter-bonecas'),
(31, 'Bonecos', 'Sasuke Uchiha', 'Imaginação e Criatividade', 'Pré-adolescente', 79, 213.15, 'Fun', 'Plástico', 'Participe de muitas missões e aventuras com o boneco articulado Sasuke, o ninja mais poderoso do clã Uchiha.', 'img/produtos/91.jpg', 'img/produtos/92.jpg', 'img/produtos/93.jpg', 'filter-bonecos'),
(32, 'Bonecos', 'Baby Yoda de Star Wars', 'Imaginação e Criatividade', 'Pré-adolescente', 109, 165.15, 'Mattel', 'Plástico', 'Tenha sua própria versão do adorável Baby Yoda de Star Wars para apertar e chamar de seu.', 'img/produtos/94.jpg', 'img/produtos/95.jpg', 'img/produtos/96.jpg', 'filter-bonecos'),
(33, 'Bonecos', 'Funko Pop Geralt de Rívia', 'Imaginação e Criatividade', 'Adolescente', 18, 145.95, 'Funko', 'Vinil', 'O grande bruxo de Rívia agora pode se juntar à sua coleção. Diretamente do universo de The Witcher e cheio de detalhes.', 'img/produtos/97.jpg', 'img/produtos/98.jpg', 'img/produtos/99.jpg', 'filter-bonecos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_vendas`
--

CREATE TABLE `tbl_vendas` (
  `id` int(8) NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `data_compra` date NOT NULL,
  `quant` int(4) NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

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
-- Índices para tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_carrinho`
--
ALTER TABLE `tbl_carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

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
-- Limitadores para a tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD CONSTRAINT `tbl_vendas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
