-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/03/2025 às 18:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_gamexchange`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cupom`
--

CREATE TABLE `tb_cupom` (
  `id_cupom` int(2) NOT NULL,
  `nome_cupom` varchar(10) NOT NULL,
  `desconto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cupom`
--

INSERT INTO `tb_cupom` (`id_cupom`, `nome_cupom`, `desconto`) VALUES
(1, 'PAULIN10', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_jogos`
--

CREATE TABLE `tb_jogos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `classificacao_indicativa` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` int(11) NOT NULL,
  `data_lancamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_jogos`
--

INSERT INTO `tb_jogos` (`id`, `nome`, `foto`, `classificacao_indicativa`, `nota`, `descricao`, `preco`, `data_lancamento`) VALUES
(1, 'Smuggler\'s Run', 'smugglers_run.png', 12, 70, 'Jogo de corrida e ação ambientado no universo de Star Wars.', 100, '2001-09-17'),
(2, 'Grand Theft Auto V', 'gta_v.png', 18, 97, 'Jogo de ação e aventura em mundo aberto com narrativa envolvente.', 200, '2013-09-17'),
(3, 'God of War Ragnarök', 'gow_ragnarok.png', 18, 93, 'Continuação da saga de Kratos, explorando mitologias nórdicas.', 250, '2022-11-09'),
(4, 'Dead Cells', 'dead_cells.png', 12, 85, 'Jogo de ação com elementos de roguelike e progressão não linear.', 80, '2018-08-07'),
(5, 'Days Gone', 'days_gone.png', 18, 71, 'Jogo de sobrevivência em mundo aberto pós-apocalíptico.', 150, '2019-04-26'),
(6, 'Fall Guys', 'fall_guys.png', 3, 70, 'Battle royale com minijogos coloridos e competitivos.', 70, '2020-08-04'),
(7, 'Forza Motorsport 7', 'forza_motorsport_7.png', 3, 86, 'Simulador de corrida com mais de 700 carros e gráficos impressionantes.', 200, '2017-09-29'),
(8, 'Minecraft', 'minecraft.png', 10, 86, 'Jogo de construção e exploração em um mundo gerado proceduralmente.', 130, '2011-11-18'),
(9, 'Fortnite', 'fortnite.png', 12, 81, 'Battle royale com construção e combate dinâmico.', 0, '2017-07-25'),
(10, 'Counter-Strike 2', 'cs_2.png', 18, 85, 'Jogo de tiro tático com partidas competitivas entre equipes.', 50, '2004-08-01'),
(11, 'Red Dead Redemption 2', 'rdr_2.png', 18, 97, 'Jogo de ação e aventura no Velho Oeste com narrativa profunda.', 250, '2018-10-26'),
(12, 'The Last of Us Part II', 'the_last_of_us_part_ii.png', 18, 84, 'Continuação da história de Ellie em um mundo pós-apocalíptico.', 200, '2020-06-19'),
(13, 'Cyberpunk 2077', 'cyberpunk_2077.png', 18, 65, 'Jogo de RPG ambientado em uma cidade futurista distópica.', 250, '2020-12-10'),
(14, 'The Witcher 3: Wild Hunt', 'the_witcher_3.png', 18, 92, 'Jogo de RPG com uma rica narrativa e mundo aberto repleto de decisões impactantes.', 150, '2015-05-19'),
(15, 'Horizon Zero Dawn', 'horizon_zero_dawn.png', 16, 89, 'Aventura de ação com uma protagonista lutando contra máquinas em um mundo pós-apocalíptico.', 200, '2017-02-28'),
(16, 'Assassin\'s Creed Odyssey', 'assassins_creed_odyssey.png', 18, 87, 'RPG de ação em mundo aberto com elementos de mitologia grega e combate envolvente.', 250, '2018-10-05'),
(17, 'The Elder Scrolls V: Skyrim', 'skyrim.png', 18, 94, 'Jogo de RPG de mundo aberto ambientado em um cenário de fantasia medieval.', 130, '2011-11-11'),
(18, 'Sekiro: Shadows Die Twice', 'sekiro_shadows_die_twice.png', 18, 93, 'Jogo de ação desafiador onde o protagonista deve combater samurais e criaturas míticas.', 230, '2019-03-22'),
(19, 'Borderlands 3', 'borderlands_3.png', 18, 81, 'FPS com elementos de RPG, ambientado em um mundo pós-apocalíptico cheio de humor e ação.', 200, '2019-09-13'),
(20, 'DOOM Eternal', 'doom_eternal.png', 18, 88, 'Jogo de tiro em primeira pessoa com combates intensos e uma história de ficção científica.', 180, '2020-03-20'),
(21, 'Naruto Shippuden: Ultimate Ninja Storm 4', 'naruto_shippuden_ultimate_ninja_storm_4.png', 12, 85, 'Jogo de luta baseado no anime Naruto, com batalhas épicas entre ninjas.', 130, '2016-02-04'),
(22, 'Monster Hunter: World', 'monster_hunter_world.png', 16, 90, 'Jogo de ação onde os jogadores caçam monstros em vastos ambientes e batalhas desafiadoras.', 200, '2018-01-26'),
(23, 'Bloodborne', 'bloodborne.png', 18, 92, 'Jogo de ação e aventura em um mundo gótico repleto de criaturas sombrias e um enredo intrigante.', 250, '2015-03-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nome_perfil` varchar(255) NOT NULL,
  `nome_real` varchar(255) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `data_nascimento` date NOT NULL,
  `qtd_jogos` int(11) NOT NULL,
  `tipo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `email`, `nome_perfil`, `nome_real`, `senha`, `data_nascimento`, `qtd_jogos`, `tipo`) VALUES
(1, 'juvenalban2x@hotmail.com', 'Emolas', 'Matheus Guida', 'adminEmolas123', '2004-01-02', 0, 'admin'),
(2, 'ryanlimagermano@gmail.com', 'Fishy', 'Ryan Lima Germano', 'adminFishy123', '2008-03-02', 0, 'admin'),
(3, 'nevekminecraft@hotmail.com', 'Junin', 'junin', '$2y$10$KuA1twpgCZDFe/D7ymKEzOv', '2000-01-01', 0, 'comum'),
(4, 'nevekminecraft2@hotmail.com', 'JuninMataRato', 'junin mataRato', 'JuninMataR@to123', '2000-01-01', 0, 'comum');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  ADD PRIMARY KEY (`id_cupom`);

--
-- Índices de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  MODIFY `id_cupom` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
