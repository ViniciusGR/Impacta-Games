-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.25a
-- Versão do PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `nascimento` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `cel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`),
  KEY `ID_3` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `nome`, `nascimento`, `sexo`, `tel`, `cel`, `email`, `cpf`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `login`, `senha`) VALUES
(1, 'Vinicius Geraldo Ruas', '1996-01-06', 'Masculino', '(11) 3881-6121', '(11) 99550-0187', 'viniciuslawliet@outlook.com', '469.888.958-84', 'Rua Córdova - 290', 'Parque Sevilha', '03157-070', 'São Paulo', 'SP', 'ViniciusLawliet', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_tem_produto`
--

CREATE TABLE IF NOT EXISTS `compra_tem_produto` (
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  KEY `id_compra` (`id_compra`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plataforma`
--

CREATE TABLE IF NOT EXISTS `plataforma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `plataforma`
--

INSERT INTO `plataforma` (`id`, `nome`) VALUES
(1, 'Xbox One'),
(2, 'Playstation 4'),
(3, 'PC'),
(4, 'Wii U');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `idioma` text NOT NULL,
  `desenvolvedor` text NOT NULL,
  `faixaEtaria` text NOT NULL,
  `genero` text NOT NULL,
  `descricao` text NOT NULL,
  `imageProduto` varchar(2083) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idProduto` (`id`),
  KEY `idProduto_2` (`id`),
  KEY `idProduto_3` (`id`),
  KEY `fk_id_plataforma` (`id_plataforma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `idioma`, `desenvolvedor`, `faixaEtaria`, `genero`, `descricao`, `imageProduto`, `preco`, `id_plataforma`) VALUES
(1, 'The Witcher 3: Wild Hunt', 'Inglês', 'CD Projekt Red', '16 anos', 'Action RPG', '<p>No jogo The Witcher 3, um mal antigo acorda. Um mal que semeia o terror, seu nome é dito apenas em sussurros: <i>Wild Hunt</i>.\r\nUm conjunto de cavaleiros espectrais místicos com grande poder de destruição, sua caça tem um único alvo: humanos.</p><br/>\r\n\r\n<p>A espada do destino tem dois gumes. Você é um deles! \r\nImperdível, <strong>The Witcher 3: Wild Hunt</strong> é o capítulo final da aclamada e moderna saga de RPG. A equipe da CD Projekt RED pretende fazer de The Witcher 3: Wild Hunt um jogo rico, maior e mais profundo - um avanço na qualidade que irá elevar a franquia a outro patamar. Mapa gigantesco, sistema de combate aprimorado, escolhas que mudam o rumo da história!</p><br/>\r\n\r\n<p>O mundo está um caos. O ar é espesso e carregado de tensão e fumaça dos vilarejos queimados. O temível Império de Nilfgaard atacou novamente, devastando os desafortunados do Reino do Norte. O outrora poderoso que tentou usar Geralt para seu próprio benefício agora esta desaparecido. Nesses tempos incertos, ninguém pode dizer o que guarda o futuro, quem trará paz ao mundo e quem irá causar apenas miséria.</p><br/>\r\n\r\n<p>Mas uma força das trevas mortal emerge. Os pequenos homens e mulheres comandando exércitos despreparados não entendem que seus conflitos são jogo de criança comparado à <i>Wild Hunt</i>, a ameaça do outro mundo que agora se aproxima. Esses cavaleiros espectrais amaldiçoam o mundo há anos, afundando-o em miséria e desespero, mas nesse momento, <i>Wild Hunt</i> procura uma pessoa em particular, aquela unida a Geralt pelo destino, a única alma que Geralt considera familiar.</p>', 'pics\\Xbox One\\TheWitcher3.jpg', 199.90, 1),
(2, 'Assassin''s Creed: Syndicate', 'Português', 'Ubisoft', '16 Anos', 'Ação', '<p>Levante e lidere o submundo para acabar com o domínio da corrupção em Londres!<br/>\r\nLondres. 1868. A Revolução Industrial. Uma era de invenções e prosperidade, erguida sobre o trabalho escravo da classe trabalhadora. Seja o gângster assassino Jacob Frye e sua irmã gêmea Evie, recrute sua gangue para lutar por justiça em nome da classe trabalhadora oprimida. Lidere o submundo para retomar Londres, em uma aventura visceral repleta de ação, intriga e combates brutais.</p><br/>\r\n\r\n<p><strong>Assuma o controle de sua gangue</strong><br/>\r\nCom a liderança de Jacob, o jogador pode organizar a gangue mais poderosa da Grã-Bretanha, a única força capaz de desafiar a elite, derrotar as gangues rivais e trazer a liberdade para as massas oprimidas. Infiltrando-se nos QGs inimigos, com a utilização de um arsenal de armas, dominar o submundo londrino será inevitável. Roubando trens ou resgatando crianças escravizadas, nada impedirá o jogador de levar a justiça para as ruas sem lei de Londres.</p><br/>\r\n\r\n<p><strong>Explore o mundo dinâmico da Londres Industrial</strong><br/>\r\nDo palácio de Buckingham para o Big Ben, lute e triunfe no mundo aberto da gigante Londres vitoriana. Faça parkour sobre veículos em movimento para rastrear inimigos ou escapar depois de um ataque ousado, tome as rédeas de carruagens e participe de corridas de rua sem regras ou crie um rastro de destruição a bordo de barcos a vapor no rio Tâmisa.</p><br/>\r\n\r\n<p><strong>Aniquile seus inimigos com combate brutal corpo a corpo</strong><br/>\r\nNão hesite em desferir contragolpes e movimentos mortais rápidos, utilizando sistema ofensivo de ataque e combate Escolha a forma de encarar cada luta, seja com novas armas ou usando o cenário à sua volta, para executar nocautes criativos e únicos.</p><br/>\r\n\r\n<p><strong>Domine a arte da furtividade como Evie Frye</strong><br/>\r\nJogue como a irmã gêmea de Jacob, Evie, uma Assassina implacável que aperfeiçoou a arte do ataque silencioso, ágil e invisível. Faça parkour no mundo aberto de Londres, usando seu status no sindicato londrino do crime para melhorar a cidade.</p>', 'pics\\Xbox One\\ACSyndicate.jpg', 249.90, 1),
(3, 'Fallout 4', 'Inglês', 'Bethesda', '18 anos', 'RPG', '<p>Como o único sobrevivente do Vault 111, você entrará em um mundo destruído pela guerra nuclear. Cada segundo é uma luta pela sobrevivência, e todas as escolhas são suas. Só você poderá reconstruir e determinar o destino da terra desolada.</p><br/> \r\n\r\n<p>Liberdade! Faça o que quiser em um enorme mundo aberto, com centenas de localidades, personagens e missões. Junte-se a várias facções que disputam o poder ou busque sozinho, as escolhas são todas suas.</p><br/>  \r\n\r\n<p>Você é E.S.P.E.C.I.A.L! Seja quem você quiser com o sistema E.S.P.E.C.I.A.L. de personagem. Desde um soldado com forte armamento até um carismático locutor, você pode escolher entre centenas de regalias e desenvolver seu próprio estilo de jogo.</p><br/>  \r\n\r\n<p>Pixels Super Luxuosos! Com novíssimos e alucinantes gráficos de última geração e um novo motor de iluminação, <strong>Fallout 4</strong> traz à vida o mundo de Fallout como nunca antes. Das florestas amaldiçoadas de Commonwealth para as ruínas de Boston, cada local é embalado com ricos e impressionantes detalhes.</p><br/>  \r\n\r\n<p>Violência e VATS! Intenso combate em primeira ou terceira pessoa pode também ser abrandada com o novo e dinâmico sistema "Vault-Tec Assisted Targeting System", que permite escolher seus ataques e curtir a carnificina cinematográfica.</p><br/>  \r\n\r\n<p>Colete e construa! Colete, atualize e construa milhares de itens no mais avançado sistema de criação. Armas, armaduras, produtos químicos e alimentos são apenas o começo - você mesmo pode construir e gerir toda sua colônia.</p>', 'pics\\Playstation 4\\Fallout4.jpg', 199.90, 2),
(4, 'FIFA 16', 'Português', 'Electronic Arts', 'Livre', 'Esporte', '<p>O <strong>FIFA 16</strong> inova em todo o campo para oferecer uma experiência de futebol equilibrada, autêntica e empolgante que possibilita a você jogar do seu jeito e competir em um nível maior. Você vai ter confiança na defesa, vai assumir o controle no meio de campo e criar mais momentos mágicos do que nunca. <strong>FIFA 16</strong>.<p><br/> \r\n\r\n<p>Oscar junta-se a Lionel Messi na capa exclusiva para o Brasil do mais autêntico videogame de futebol, licenciado oficialmente pela FIFA e que chega às lojas na versão 16, totalmente em português novamente com narração de Tiago Leifert e comentários de Caio Ribeiro. Crie mais momentos impressionantes. No <strong>FIFA 16</strong>, os jogadores terão aquela vantagem da qual todo time precisa para criar momentos mágicos e abrir a defesa adversária.<p>', 'pics\\Playstation 4\\FIFA16.jpg', 216.63, 2),
(5, 'Mad Max', 'Inglês', 'Avalanche Studios', '18 anos', 'Ação', '<p>Jogue no papel de Mad Max, um guerreiro solitário que tem de embarcar em uma perigosa jornada depois que o seu veículo Interceptor é roubado por uma gangue de saqueadores. Um herói relutante e com grande instinto de sobrevivência que não quer nada além de deixar a insanidade para trás e encontrar conforto nas lendárias "Plains of Silence".</p><br/>\r\n\r\n<p><strong>Mad Max</strong></p><br/>\r\n\r\n<p>Mad Max está preso em Wasteland sem seu fiel veículo, o Interceptor. Perseguido por um homem perturbado chamado Scrotus, Max resolve construir um veículo melhor para continuar sua jornada às "Plains of Silence" na esperança de encontrar a paz longe das crueldades do mundo. Quando tudo desanda violenta e rapidamente, a única alternativa de Max é a vingança. É então que o inesperado acontece: uma obrigação moral, algo que Max ignorou durante anos...</p><br/>\r\n\r\n<p>Explore o vasto mundo aberto de Wasteland; dispute cada pedaço de sucata com os punhos, armas de fogo e armas corpo a corpo. Faça alianças com personagens únicos e enfrente inimigos cruéis em sangrentas guerras sobre rodas. Forje armas para aumentar suas chances de sobrevivência e assuma o controle de acampamentos para construir seu próprio veículo de guerra.</p><br/>\r\n\r\n<p>Empenhe-se para equilibrar suas necessidades com a sobrevivência dos outros ao mesmo tempo em que enfrenta Scrotus e sua gangue. A humanidade exposta na dura realidade da vida em um mundo onde cada prego, cartucho de escopeta e gota d''água são disputados.</p>', 'pics\\PC\\MadMax.jpg', 97.42, 3),
(6, 'Batman: Arkham Knight', 'Português', 'Rocksteady', '16 anos', 'Ação', 'Batman: Arkham Knight leva a premiada trilogia de Arkham da Rocksteady Studios à sua conclusão épica. Desenvolvido exclusivamente para plataformas de nova geração, Batman: Arkham Knight apresenta uma versão do Batmóvel com o design único da Rocksteady. A inclusão altamente esperada do veículo lendário, combinada com a aclamada jogabilidade da série Arkham, oferece aos jogadores uma experiência definitiva e completa com o Batman. É possível percorrer as ruas e voar pelo céu de toda a Gotham City. Neste final explosivo, Batman enfrenta a maior ameaça já vista pela cidade que ele jurou proteger, quando o Espantalho volta para reunir os supercriminosos de Gotham e destruir Batman para sempre.', 'pics\\PC\\BatmanArkhamKnight.jpg', 93.67, 3),
(7, 'Hyrule Warriors', 'Inglês', 'Nintendo', '10 anos', 'Ação', '<p>Encarne Link, Impa e outros personagens de The Legend of Zelda e ao poderoso estilo de Dynasty Warriors derrote hordas de inimigos. Esta aventura permite explorar locais clássicos do reino de Hyrule e combater os inimigos mais ferozes da história da série Zelda. O delicado equilíbrio da Triforce foi perturbado e o reino de Hyrule está prestes a ser destruído por uma força das Trevas, desta vez liderada pela feiticeira Cia.</p><br/>\r\n\r\n<p>No decorrer da história novos personagens com jogabilidade e tipos de armas únicos serão desbloqueados. Colete Rupees e outros itens para equipar as suas armas e aperfeiçoar seus emblemas para incrementar as habilidades de cada guerreiro. Jogue na pele de personagens icónicos, como Link, Princesa Zelda, Midna e Impa!</p><br/>\r\n\r\n<p>-Enfrente os inimigos mais ferozes da série The Legend of Zelda em locais clássicos de Hyrule;</p>\r\n<p>-Derrote os seus adversários com ataques brutais e combos intensos;</p>\r\n<p>-Pense de forma estratégica para concluir missões da forma mais eficaz possível. Encarne Link, Impa e outros personagens de The Legend of Zelda e ao poderoso estilo de Dynasty Warriors derrote hordas de inimigos. Esta aventura permite explorar locais clássicos do reino de Hyrule e combater os inimigos mais ferozes da história da série Zelda. O delicado equilíbrio da Triforce foi perturbado e o reino de Hyrule está prestes a ser destruído por uma força das Trevas, desta vez liderada pela feiticeira Cia.</p>\r\n', 'pics\\Nintendo Wii U\\HyruleWarriors.jpg', 249.99, 4),
(8, 'Super Smash Bros.', 'Inglês', 'Nintendo', '10 anos', 'Luta', '<p>Mario! Link! Samus! Pikachu! Todos os seus personagens favoritos da Nintendo estão de volta, junto com muitas caras novas!\r\nEm <strong>Super Smash Bros.</strong> para Wii U, até quatro jogadores podem se enfrentar, localmente ou online, em fases belamente projetadas, inspiradas em jogos clássicos da Nintendo.\r\nCom uma variedade de opções de controle e compatibilidade com amiibo, as batalhas de Super Smash Bros. ganham vida e personalidade!</p><br/>\r\n\r\n<p>- Lute com personagens clássicos da série Super Smash Bros., junto com novos desafiantes como Mega Man, Little Mac ou a recém-anunciada Palutena, a Goddess of Light dos jogos Kid Icarus. Pela primeira vez, os jogadores podem competir até mesmo com seus próprios personagens Mii!</p><br/>\r\n\r\n<p>- Use uma variedade de métodos de controle durante as batalhas frenéticas e cheias de ação, incluindo os controles de Nintendo GameCube - o controle preferido dos jogadores mais harcore de Super Smash Bros</p><br/>\r\n\r\n<p>- Conte com poderes inéditos e devastadores, como Pac-Man que mantém sua forma humanoide, mas ao usar golpes específicos se transforma na icônica forma redonda e amarela que tinha na sua estreia nos fliperamas, em 1980</p><br/>\r\n\r\n<p>- Conecte-se com seu amiibo para se divertir ainda mais, personalize as listas de golpes, ajuste seu ataque, defesa e velocidade, treine-o para desbloquear habilidades incríveis e depois desafiar seus amigos para ver quem é o melhor treinador!</p><br/>\r\n\r\n<p>- Experimente a beleza de Super Smash Bros. para Wii U em impressionante alta definição HD, pela primeira vez na série.</p>', 'pics\\Nintendo Wii U\\SuperSmashBros.jpg', 258.99, 4);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`ID`);

--
-- Restrições para a tabela `compra_tem_produto`
--
ALTER TABLE `compra_tem_produto`
  ADD CONSTRAINT `compra_tem_produto_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id`),
  ADD CONSTRAINT `compra_tem_produto_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_id_plataforma` FOREIGN KEY (`id_plataforma`) REFERENCES `plataforma` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
