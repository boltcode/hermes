-- 
-- Structure for table `cor`
-- 

DROP TABLE IF EXISTS `cor`;
CREATE TABLE IF NOT EXISTS `cor` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 
-- Data for table `cor`
-- 

INSERT INTO `cor` (`id`, `nome`) VALUES
  ('1', 'Preto'),
  ('2', 'Branco'),
  ('3', 'Vermelho'),
  ('4', 'Verde'),
  ('5', 'Amarelo'),
  ('6', 'Azul');

-- 
-- Structure for table `historico`
-- 

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tamanho_id` int(2) unsigned NOT NULL,
  `cor_id` int(2) unsigned NOT NULL,
  `quantidade` int(2) unsigned DEFAULT NULL,
  `referencia` varchar(10) DEFAULT NULL,
  `artigo` varchar(50) DEFAULT NULL,
  `pagina` int(3) unsigned DEFAULT NULL,
  `preco` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historico_FKIndex1` (`cor_id`),
  KEY `historico_FKIndex2` (`tamanho_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Structure for table `produto`
-- 

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(3) unsigned NOT NULL,
  `cor_id` int(2) unsigned NOT NULL,
  `tamanho_id` int(2) unsigned NOT NULL,
  `quantidade` int(2) unsigned DEFAULT NULL,
  `referencia` varchar(10) DEFAULT NULL,
  `artigo` varchar(50) DEFAULT NULL,
  `pagina` int(3) unsigned DEFAULT NULL,
  `preco` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_FKIndex1` (`tamanho_id`),
  KEY `produto_FKIndex2` (`cor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Data for table `produto`
-- 

INSERT INTO `produto` (`id`, `cor_id`, `tamanho_id`, `quantidade`, `referencia`, `artigo`, `pagina`, `preco`) VALUES
  ('1', '1', '1', '2', 'teste', 'teste', '2', '1'),
  ('2', '5', '4', '5', 'Teste 02', 'Teste 02', '5', '1'),
  ('3', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('4', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('5', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('6', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('7', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('8', '3', '3', '5', 'Teste 03', 'Teste 03', '2', '1'),
  ('9', '3', '0', '5', 'Teste 03', 'Teste 03', '2', '1');

-- 
-- Structure for table `tamanho`
-- 

DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 
-- Data for table `tamanho`
-- 

INSERT INTO `tamanho` (`id`, `nome`) VALUES
  ('1', 'P'),
  ('2', 'M'),
  ('3', 'G'),
  ('4', 'GG');

-- 
-- Structure for table `usuario`
-- 

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

