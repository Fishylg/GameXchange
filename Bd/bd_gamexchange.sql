-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/04/2025 às 05:57
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
-- Estrutura para tabela `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_jogos` int(11) NOT NULL,
  `chave_ativacao` varchar(50) NOT NULL,
  `data_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_jogos` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto0` varchar(255) NOT NULL,
  `classificacao_indicativa` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` int(11) NOT NULL,
  `data_lancamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_jogos`
--

INSERT INTO `tb_jogos` (`id_jogos`, `nome`, `foto1`, `foto2`, `foto3`, `foto4`, `foto0`, `classificacao_indicativa`, `nota`, `descricao`, `preco`, `data_lancamento`) VALUES
(1, 'Smuggler\'s Run', 'sr1.png', 'sr2.png', 'sr3.png', 'sr4.png', 'smugglers_run.png', 12, 70, 'Smuggler\'s Run é um jogo de corrida off-road lançado em 2000 para PS2, onde o jogador assume o papel de um contrabandista, completando missões em mapas abertos e variados, enquanto foge da polícia e rivais em alta velocidade.', 100, '2001-09-17'),
(2, 'Grand Theft Auto V', 'gtav1.png', 'gtav2.png', 'gtav3.png', 'gtav4.png', 'gta_v.png', 18, 97, 'GTA V é um jogo de ação em mundo aberto onde três criminosos realizam assaltos em Los Santos. Com narrativa envolvente e jogabilidade variada, o jogo mistura tiroteios, direção e exploração em um vasto e detalhado ambiente urbano.', 200, '2013-09-17'),
(3, 'God of War Ragnarök', 'gowr1.png', 'gowr2.png', 'gowr3.png', 'gowr4.png', 'gow_ragnarok.png', 18, 93, 'God of War Ragnarök é um jogo de ação e aventura onde Kratos e seu filho Atreus enfrentam deuses nórdicos e o fim dos tempos. Com combates intensos e narrativa épica, a jornada explora mitos, emoções e escolhas que moldam o destino.', 250, '2022-11-09'),
(4, 'Dead Cells', 'dc1.png', 'dc2.png', 'dc3.png', 'dc4.png', 'dead_cells.png', 12, 85, 'Dead Cells é um jogo de ação estilo roguelike e metroidvania, com combates rápidos, cenários gerados proceduralmente e alta dificuldade. O jogador explora, luta e evolui em uma jornada intensa por um castelo em constante mudança.', 80, '2018-08-07'),
(5, 'Days Gone', 'dg1.png', 'dg2.png', 'dg3.png', 'dg4.png', 'days_gone.png', 18, 71, 'Days Gone é um jogo de ação e sobrevivência em mundo aberto, onde o motoqueiro Deacon St. John enfrenta zumbis e humanos hostis em um mundo pós-apocalíptico. Com narrativa envolvente, o jogo mistura combate, furtividade e exploração.', 150, '2019-04-26'),
(6, 'Fall Guys', 'fg1.png', 'fg2.png', 'fg3.png', 'fg4.png', 'fall_guys.png', 3, 70, 'Fall Guys é um jogo multiplayer caótico onde até 60 jogadores competem em minijogos e corridas de obstáculos. Com visual colorido e humor leve, o objetivo é ser o último em pé em desafios eliminatórios e imprevisíveis.', 70, '2020-08-04'),
(7, 'Forza Motorsport 7', 'fm71.png', 'fm72.png', 'fm73.png', 'fm74.png', 'forza_motorsport_7.png', 3, 86, 'Forza Motorsport 7 é um simulador de corrida com gráficos realistas, mais de 700 carros e pistas detalhadas ao redor do mundo. Oferece modos solo e multiplayer, com foco em performance, física precisa e personalização de veículos.', 200, '2017-09-29'),
(8, 'Minecraft', 'mc1.png', 'mc2.png', 'mc3.png', 'mc4.png', 'minecraft.png', 10, 86, 'Minecraft é um jogo de construção e sobrevivência em mundo aberto feito de blocos. Os jogadores exploram, mineram, criam estruturas e enfrentam criaturas, tudo em um universo gerado proceduralmente, cheio de criatividade e liberdade.', 130, '2011-11-18'),
(9, 'Fortnite', 'fn1.png', 'fn2.png', 'fn3.png', 'fn4.png', 'fortnite.png', 12, 81, 'Fortnite é um jogo battle royale onde até 100 jogadores competem para ser o último sobrevivente. Com visual estilizado, construção de estruturas e eventos ao vivo, mistura ação, estratégia e criatividade em partidas dinâmicas e rápidas.', 0, '2017-07-25'),
(10, 'Counter-Strike 2', 'cs2_1.png', 'cs2_2.png', 'cs2_3.png', 'cs2_4.png', 'cs_2.png', 18, 85, 'CS2 é um jogo de tiro tático em equipes, sucessor de CS:GO, com gráficos atualizados na Source 2. Terroristas e contra-terroristas se enfrentam em rodadas intensas, exigindo estratégia, precisão e trabalho em equipe.', 50, '2023-09-27'),
(11, 'Red Dead Redemption 2', 'rdr2_1.png', 'rdr2_2.png', 'rdr2_3.png', 'rdr2_4.png', 'rdr_2.png', 18, 97, 'Red Dead Redemption 2 é um jogo de ação em mundo aberto no Velho Oeste, onde Arthur Morgan vive como fora da lei. Com narrativa profunda, mundo detalhado e liberdade de exploração, o jogo combina tiroteios, caça, cavalgadas e escolhas morais.', 250, '2018-10-26'),
(12, 'The Last of Us Part II', 'tlou2_1.png', 'tlou2_2.png', 'tlou2_3.png', 'tlou2_4.png', 'the_last_of_us_part_ii.png', 18, 84, 'The Last of Us Part II é um jogo de ação e sobrevivência com foco narrativo. Anos após os eventos do primeiro jogo, Ellie busca vingança em um mundo devastado, enfrentando dilemas morais, inimigos brutais e emoções intensas.', 200, '2020-06-19'),
(13, 'Cyberpunk 2077', 'cp2077_1.png', 'cp2077_2.png', 'cp2077_3.png', 'cp2077_4.png', 'cyberpunk_2077.png', 18, 65, 'Cyberpunk 2077 é um RPG de ação em mundo aberto ambientado em Night City, uma metrópole futurista. O jogador controla V, um mercenário em busca de poder e imortalidade, explorando narrativas densas, combates intensos e escolhas impactantes.', 250, '2020-12-10'),
(14, 'The Witcher 3: Wild Hunt', 'tw3_1.png', 'tw3_2.png', 'tw3_3.png', 'tw3_4.png', 'the_witcher_3.png', 18, 92, 'The Witcher 3: Wild Hunt é um RPG de ação em mundo aberto onde Geralt de Rívia, um caçador de monstros, busca sua filha adotiva. Com narrativa rica, escolhas morais e combates intensos, o jogo oferece um vasto e imersivo universo de fantasia.', 150, '2015-05-19'),
(15, 'Horizon Zero Dawn', 'hzd1.png', 'hzd2.png', 'hzd3.png', 'hzd4.png', 'horizon_zero_dawn.png', 16, 89, 'Horizon Zero Dawn é um jogo de ação e aventura em mundo aberto onde Aloy, uma caçadora ágil, enfrenta máquinas colossais em um futuro pós-apocalíptico. Com narrativa envolvente, exploração e combates táticos, o jogo mistura tecnologia e natureza.', 200, '2017-02-28'),
(16, 'Assassin\'s Creed Odyssey', 'aco1.png', 'aco2.png', 'aco3.png', 'aco4.png', 'assassins_creed_odyssey.png', 18, 87, 'Assassin\'s Creed Odyssey é um RPG de ação ambientado na Grécia Antiga. O jogador vive como Alexios ou Kassandra em uma jornada épica repleta de batalhas, escolhas morais e mitologia, explorando um vasto mundo aberto cheio de segredos.', 250, '2018-10-05'),
(17, 'The Elder Scrolls V: Skyrim', 'sk1.png', 'sk2.png', 'sk3.png', 'sk4.png', 'skyrim.png', 18, 94, 'The Elder Scrolls V: Skyrim é um RPG de mundo aberto onde o jogador é o Dragonborn, herói com o poder dos dragões. Em um vasto reino cheio de criaturas, magia e escolhas, é possível explorar, lutar, criar e moldar seu próprio destino.', 130, '2011-11-11'),
(18, 'Sekiro: Shadows Die Twice', 'sekiro1.png', 'sekiro2.png', 'sekiro3.png', 'sekiro4.png', 'sekiro_shadows_die_twice.png', 18, 93, 'Sekiro: Shadows Die Twice é um jogo de ação e aventura no Japão feudal. Você controla um guerreiro shinobi em busca de vingança, enfrentando inimigos desafiadores com combate preciso, furtividade e uma história intensa sobre honra e sacrifício.', 230, '2019-03-22'),
(19, 'Borderlands 3', 'bl3_1.png', 'bl3_2.png', 'bl3_3.png', 'bl3_4.png', 'borderlands_3.png', 18, 81, 'Borderlands 3 é um jogo de tiro em primeira pessoa com elementos de RPG e visual em cel-shading. Com ação frenética, humor irreverente e milhares de armas, os jogadores enfrentam inimigos em planetas diversos, sozinhos ou em cooperação.', 200, '2019-09-13'),
(20, 'DOOM Eternal', 'doom1.png', 'doom2.png', 'doom3.png', 'doom4.png', 'doom_eternal.png', 18, 88, 'DOOM Eternal é um jogo de tiro em primeira pessoa intenso e frenético, onde o Doom Slayer enfrenta hordas demoníacas para salvar a Terra. Com combate rápido, armas brutais e trilha sonora pesada, o jogo exige precisão e agressividade constantes.', 180, '2020-03-20'),
(21, 'Naruto Shippuden: Ultimate Ninja Storm 4', 'nsuns4_1.png', 'nsuns4_2.png', 'nsuns4_3.png', 'nsuns4_4.png', 'naruto_shippuden_ultimate_ninja_storm_4.png', 12, 85, 'Naruto Shippuden: Ultimate Ninja Storm 4 é um jogo de luta baseado no anime, com batalhas dinâmicas, gráficos fielmente estilizados e um vasto elenco de personagens. Reviva momentos épicos da série com combates intensos e cinemáticas impactantes.', 130, '2016-02-04'),
(22, 'Monster Hunter: World', 'mhw1.png', 'mhw2.png', 'mhw3.png', 'mhw4.png', 'monster_hunter_world.png', 16, 90, 'Monster Hunter: World é um RPG de ação onde caçadores exploram ecossistemas vibrantes para enfrentar criaturas gigantes. Com foco em cooperação, estratégia e criação de equipamentos, o jogo oferece combates desafiadores e mundo rico em detalhes.', 200, '2018-01-26'),
(23, 'Bloodborne', 'bb1.png', 'bb2.png', 'bb3.png', 'bb4.png', 'bloodborne.png', 18, 92, 'Bloodborne é um RPG de ação sombrio e desafiador, ambientado na cidade gótica de Yharnam. O jogador enfrenta horrores cósmicos e criaturas grotescas com combate rápido e tenso, explorando segredos em um mundo repleto de mistério e terror.', 250, '2015-03-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
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

INSERT INTO `tb_usuario` (`id_usuario`, `email`, `nome_perfil`, `nome_real`, `senha`, `data_nascimento`, `qtd_jogos`, `tipo`) VALUES
(1, 'juvenalban2x@hotmail.com', 'Emolas', 'Matheus Guida', 'adminEmolas123', '2004-01-02', 0, 'admin'),
(2, 'ryanlimagermano@gmail.com', 'Fishy', 'Ryan Lima Germano', 'adminFishy123', '2008-03-02', 0, 'admin'),
(3, 'nevekminecraft@hotmail.com', 'Junin', 'junin', '$2y$10$KuA1twpgCZDFe/D7ymKEzOv', '2000-01-01', 0, 'comum'),
(4, 'nevekminecraft2@hotmail.com', 'JuninMataRato', 'junin mataRato', 'JuninMataR@to123', '2000-01-01', 0, 'comum'),
(5, 'matheus.guida@senacsp.edu.br', 'pipizin', 'junin pipi', 'pipizin', '2000-01-31', 0, 'comum'),
(6, 'teamopauloth@gmail.com', 'Paulin', 'Paulo TH', 'amoopaulin', '2000-02-04', 0, 'comum'),
(7, 'aa@aa.c', 'a', 'a a', 'a', '1900-01-03', 0, 'comum');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_jogos` (`id_jogos`);

--
-- Índices de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  ADD PRIMARY KEY (`id_cupom`);

--
-- Índices de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  ADD PRIMARY KEY (`id_jogos`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  MODIFY `id_cupom` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_jogos`
--
ALTER TABLE `tb_jogos`
  MODIFY `id_jogos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`id_jogos`) REFERENCES `tb_jogos` (`id_jogos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
