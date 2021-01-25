-- --------------------------------------------------------
-- Anfitrião:                    localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gestpresenca
CREATE DATABASE IF NOT EXISTS `gestpresenca` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gestpresenca`;

-- Dumping structure for table gestpresenca.atendimento
CREATE TABLE IF NOT EXISTS `atendimento` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assunto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `id_marcacao` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departamento` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atendimento_id_marcacao_foreign` (`id_marcacao`),
  KEY `atendimento_id_departamento_foreign` (`id_departamento`),
  CONSTRAINT `atendimento_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `atendimento_id_marcacao_foreign` FOREIGN KEY (`id_marcacao`) REFERENCES `marcacao` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.atendimento: ~3 rows (approximately)
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` (`id`, `assunto`, `estado`, `id_marcacao`, `id_departamento`, `created_at`, `updated_at`) VALUES
	('51d89aa8-0c8b-4465-bc5d-339a6eac74d6', 'Mostrar novos planfletos para propagandda.', 1, '8a79a424-bb1a-4321-84a0-d15b18652a91', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-31 17:10:12', '2020-12-31 17:10:12'),
	('801c9486-29ce-40d4-82e3-496c75d95832', 'Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral Exibição de cartazes para acto eleitoral', 1, 'db76bfa7-566a-4395-ad1c-7d659b296bf1', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-31 16:32:45', '2020-12-31 16:32:45'),
	('ae335795-f579-44bb-b5af-1b1308914eb3', 'xxxxx frrrfrf rfrfrfrfrf', 1, 'bd40d4f7-4515-4063-ae7f-8d857e281457', '42722869-51da-4136-b7dd-5e359956430e', '2021-01-05 09:03:14', '2021-01-05 09:03:14');
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secretario` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.departamento: ~2 rows (approximately)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`id`, `nome`, `sigla`, `secretario`, `telefone`, `created_at`, `updated_at`) VALUES
	('23e3a99d-26a5-4832-ad4e-12069f7ba7d4', 'Departamento de Informação e Propaganda', 'DIP', 'Arlindo Isabel', 999233222, '2020-12-29 09:09:06', '2020-12-29 09:09:06'),
	('42722869-51da-4136-b7dd-5e359956430e', 'Departamento de Assuntos Financeiros', 'DAF', 'Jorge dos Kwanzas', 911311220, '2020-12-31 16:15:34', '2020-12-31 16:15:34');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_pessoa` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departamento` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `funcionario_id_pessoa_foreign` (`id_pessoa`),
  KEY `funcionario_id_departamento_foreign` (`id_departamento`),
  CONSTRAINT `funcionario_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `funcionario_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.funcionario: ~4 rows (approximately)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_pessoa`, `id_departamento`, `created_at`, `updated_at`) VALUES
	('352b1711-2e05-4def-969b-3fc7154f9076', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-29 09:47:48', '2020-12-29 09:47:48'),
	('bc251342-68f0-4cff-8a07-72b6e3055a51', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-29 10:10:25', '2020-12-29 10:10:25'),
	('3b951771-e71d-44f1-a3f5-473491f06ab2', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-29 10:11:18', '2020-12-29 10:11:18'),
	('ba087dc4-4c44-40d6-822a-f835fbcd2227', '23e3a99d-26a5-4832-ad4e-12069f7ba7d4', '2020-12-29 19:10:57', '2020-12-29 19:10:57');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.marcacao
CREATE TABLE IF NOT EXISTS `marcacao` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_entrada` timestamp NOT NULL,
  `data_saida` timestamp NULL DEFAULT NULL,
  `id_pessoa` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marcacao_id_pessoa_foreign` (`id_pessoa`),
  CONSTRAINT `marcacao_id_pessoa_foreign` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.marcacao: ~8 rows (approximately)
/*!40000 ALTER TABLE `marcacao` DISABLE KEYS */;
INSERT INTO `marcacao` (`id`, `data_entrada`, `data_saida`, `id_pessoa`, `created_at`, `updated_at`) VALUES
	('5278888a-10a4-4018-9580-da5fdf791401', '2021-01-04 07:38:39', NULL, 'e7d54601-bf96-4d15-ad72-72a8bc9c0059', '2021-01-04 07:38:39', '2021-01-04 07:38:39'),
	('8a79a424-bb1a-4321-84a0-d15b18652a91', '2020-12-31 17:04:55', NULL, 'e42fc678-2e4a-4acd-8f49-d3ac720f8e80', '2020-12-31 17:04:55', '2020-12-31 17:04:55'),
	('976232d3-add6-4a89-951f-48d6362f5937', '2020-12-31 07:21:52', NULL, '8ba8affd-f4f4-4a8b-90d4-2a22f34a747a', '2020-12-31 07:21:53', '2020-12-31 07:21:53'),
	('ae02c2db-c02f-4837-8907-63d2981fb2e2', '2021-01-05 08:33:54', NULL, 'f3cb6dfc-ee76-4a22-a16d-a3706b44cee8', '2021-01-05 08:33:54', '2021-01-05 08:33:54'),
	('ae7ef0d2-5294-4947-9af6-d3dc3c0624a1', '2020-12-31 07:21:02', NULL, 'e2cc2ad9-b897-4058-91b0-5d51d7da3a56', '2020-12-31 07:21:02', '2020-12-31 07:21:02'),
	('bd40d4f7-4515-4063-ae7f-8d857e281457', '2021-01-05 08:29:32', '2021-01-05 10:47:10', '751e7b6c-761d-4631-a75d-7ac966f29a3b', '2021-01-05 08:29:33', '2021-01-05 10:47:10'),
	('d5e1dc22-3ed9-4851-b5e2-ececf9e381ee', '2021-01-04 09:16:34', NULL, '5c7dc392-acb6-445f-9f92-3b84ae0bfd01', '2021-01-04 09:16:35', '2021-01-04 09:16:35'),
	('db76bfa7-566a-4395-ad1c-7d659b296bf1', '2020-12-31 07:20:24', '2020-12-31 09:54:38', '225c3998-19bd-4c88-bc9e-1f4affbb80d5', '2020-12-31 07:20:25', '2020-12-31 07:20:25');
/*!40000 ALTER TABLE `marcacao` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2020_12_28_065938_create_departamento_table', 1),
	(12, '2020_12_28_073847_create_pessoa_table', 2),
	(13, '2020_12_28_074055_create_funcionario_table', 3),
	(15, '2020_12_30_101055_create_marcacao_table', 4),
	(16, '2020_12_31_141219_create_atendimento_table', 5),
	(17, '2021_01_05_200037_create_produto_table', 6),
	(18, '2021_01_06_002047_create_saida_table', 7),
	(19, '2021_01_20_195012_create_saida_table', 8),
	(20, '2021_01_20_195327_create_produto_saida_table', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` smallint(6) NOT NULL,
  `genero` smallint(6) NOT NULL,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pessoa_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.pessoa: ~12 rows (approximately)
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`id`, `nome`, `telefone`, `email`, `tipo`, `genero`, `tipo_documento`, `numero_documento`, `created_at`, `updated_at`) VALUES
	('225c3998-19bd-4c88-bc9e-1f4affbb80d5', 'Rosa Manuel', '999344455', 'rosa@gmail.com', 2, 2, '1', '1', '2020-12-31 07:20:25', '2020-12-31 07:20:25'),
	('352b1711-2e05-4def-969b-3fc7154f9076', 'Dalton Cabeia', '995299016', 'deac@gdw.com', 1, 1, '1', '000123LS097', '2020-12-29 09:47:48', '2020-12-29 09:47:48'),
	('3b951771-e71d-44f1-a3f5-473491f06ab2', 'Eduanela Vimbisi da Rosa', '923332211', 'eduanela@gmail.com', 1, 2, '1', '0023455LA034', '2020-12-29 10:11:18', '2020-12-29 10:11:18'),
	('5c7dc392-acb6-445f-9f92-3b84ae0bfd01', 'Josefina', '923545454', NULL, 2, 2, '3', '1112223456', '2021-01-04 09:16:35', '2021-01-04 09:16:35'),
	('751e7b6c-761d-4631-a75d-7ac966f29a3b', 'Andreza', NULL, NULL, 2, 2, '3', '121212', '2021-01-05 08:29:33', '2021-01-05 08:29:33'),
	('8ba8affd-f4f4-4a8b-90d4-2a22f34a747a', 'Afonso', NULL, NULL, 2, 1, '2', '112390', '2020-12-31 07:21:53', '2020-12-31 07:21:53'),
	('ba087dc4-4c44-40d6-822a-f835fbcd2227', 'Eunice Gastão', '999898989', 'gastao@gadaw.com', 1, 1, '1', '1234', '2020-12-29 19:10:57', '2020-12-29 19:10:57'),
	('bc251342-68f0-4cff-8a07-72b6e3055a51', 'Wawingi António', '925802655', 'wawingisebastiao2@gmail.com', 1, 1, '1', '003246621BO030', '2020-12-29 10:10:25', '2020-12-29 10:10:25'),
	('e2cc2ad9-b897-4058-91b0-5d51d7da3a56', 'Agostinho Silva', NULL, NULL, 2, 1, '3', '25', '2020-12-31 07:21:02', '2020-12-31 07:21:02'),
	('e42fc678-2e4a-4acd-8f49-d3ac720f8e80', 'Juliana', '924231822', NULL, 2, 2, '1', '112390', '2020-12-31 17:04:55', '2020-12-31 17:04:55'),
	('e7d54601-bf96-4d15-ad72-72a8bc9c0059', 'José Manuel', NULL, NULL, 2, 1, '1', '112233', '2021-01-04 07:38:39', '2021-01-04 07:38:39'),
	('f3cb6dfc-ee76-4a22-a16d-a3706b44cee8', 'Agusto', NULL, NULL, 2, 1, '1', '00BC040', '2021-01-05 08:33:54', '2021-01-05 08:33:54');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` smallint(6) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota_entrega` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.produto: ~3 rows (approximately)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `designacao`, `categoria`, `quantidade`, `foto`, `nota_entrega`, `created_at`, `updated_at`) VALUES
	('80b482d9-a6ba-4219-86ef-4b7ffbb49236', 'Cadeiras Escritorio', 'Material do Escritório', 30, NULL, 'NOTA20012021192513.pdf', '2021-01-06 00:00:00', '2021-01-20 19:25:13'),
	('a7bad6f7-2ad1-4d07-bf86-ea83f6ef888d', 'Computador Laptop HP', 'Material do Escritório', 50, NULL, 'NOTA20012021192431.pdf', '2021-01-04 00:00:00', '2021-01-20 19:24:32');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.produto_saida
CREATE TABLE IF NOT EXISTS `produto_saida` (
  `id_produto` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_saida` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `produto_saida_id_produto_foreign` (`id_produto`),
  KEY `produto_saida_id_saida_foreign` (`id_saida`),
  CONSTRAINT `produto_saida_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produto_saida_id_saida_foreign` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.produto_saida: ~5 rows (approximately)
/*!40000 ALTER TABLE `produto_saida` DISABLE KEYS */;
INSERT INTO `produto_saida` (`id_produto`, `id_saida`, `created_at`, `updated_at`) VALUES
	('80b482d9-a6ba-4219-86ef-4b7ffbb49236', '59fc8141-86c4-4da7-b0a6-d01bae42972d', '2021-01-21 10:27:22', '2021-01-21 10:27:22'),
	('80b482d9-a6ba-4219-86ef-4b7ffbb49236', 'ecce6533-d8a1-42bb-9d5e-a16c4255cb2e', '2021-01-21 10:27:54', '2021-01-21 10:27:54'),
	('a7bad6f7-2ad1-4d07-bf86-ea83f6ef888d', '9f91d029-3969-43c8-8bf3-9059bdaed749', '2021-01-21 10:27:54', '2021-01-21 10:27:54'),
	('80b482d9-a6ba-4219-86ef-4b7ffbb49236', 'd905542a-d5f7-4934-85a2-a3db0c97363e', '2021-01-22 15:26:16', '2021-01-22 15:26:16'),
	('a7bad6f7-2ad1-4d07-bf86-ea83f6ef888d', 'ca42dbc9-e510-46ad-b2a5-ea3a5c213677', '2021-01-22 15:26:16', '2021-01-22 15:26:16');
/*!40000 ALTER TABLE `produto_saida` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.saida
CREATE TABLE IF NOT EXISTS `saida` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordenante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recebedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motorista` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` smallint(6) NOT NULL,
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.saida: ~5 rows (approximately)
/*!40000 ALTER TABLE `saida` DISABLE KEYS */;
INSERT INTO `saida` (`id`, `ordenante`, `recebedor`, `motorista`, `matricula`, `viatura`, `quantidade`, `referencia`, `created_at`, `updated_at`) VALUES
	('59fc8141-86c4-4da7-b0a6-d01bae42972d', 'DIP', 'COMITÊ PROVINCIAL DE LUANDA', 'Andre', 'LD-90-90-BB', 'Mazda', 5, 'NE-21-01-2021-COMITÊ-PROVINCIAL-DE-LUANDA', '2021-01-21 00:00:00', '2021-01-21 10:27:22'),
	('9f91d029-3969-43c8-8bf3-9059bdaed749', 'DIP', 'COMITÊ PROVINCIAL DE LUANDA', 'Andre', 'LD-90-90-BB', 'Mazda', 10, 'NE-21-01-2021-COMITÊ-PROVINCIAL-DE-LUANDA', '2021-01-21 00:00:00', '2021-01-21 10:27:54'),
	('ca42dbc9-e510-46ad-b2a5-ea3a5c213677', 'DIP', 'COMITÊ PROVINCIAL DE LUANDA', 'Eunice', 'LD-14-92-GO', 'Ford Ranger', 10, 'NE-22-01-2021-COMITÊ-PROVINCIAL-DE-LUANDA', '2021-01-22 00:00:00', '2021-01-22 15:26:16'),
	('d905542a-d5f7-4934-85a2-a3db0c97363e', 'DIP', 'COMITÊ PROVINCIAL DE LUANDA', 'Eunice', 'LD-14-92-GO', 'Ford Ranger', 5, 'NE-22-01-2021-COMITÊ-PROVINCIAL-DE-LUANDA', '2021-01-22 00:00:00', '2021-01-22 15:26:16'),
	('ecce6533-d8a1-42bb-9d5e-a16c4255cb2e', 'DIP', 'COMITÊ PROVINCIAL DE LUANDA', 'Andre', 'LD-90-90-BB', 'Mazda', 10, 'NE-21-01-2021-COMITÊ-PROVINCIAL-DE-LUANDA', '2021-01-21 00:00:00', '2021-01-21 10:27:54');
/*!40000 ALTER TABLE `saida` ENABLE KEYS */;

-- Dumping structure for table gestpresenca.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_funcionario` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gestpresenca.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `tipo`, `created_at`, `updated_at`, `id_funcionario`, `estado`) VALUES
	('8bd3457f-3816-4f64-af2b-6cbecd8f4564', 'dalton.cabeia', 'deac@gdw.com', '$2y$10$yg2cOxl4FhG4nCGAxxb7j.1vz/JY/6714OFlLoYF.M1fHTFM50cv2', 'FjWPZKRHSGYgcSb6fbr42IETGYhV9vSmdNj6tb463omrnZ54DPZBqXRdzdZG', 1, '2020-12-29 09:47:48', '2020-12-29 09:47:48', '352b1711-2e05-4def-969b-3fc7154f9076', 1),
	('8d79f8d5-d62f-4a89-82bf-17975be608d3', 'wawingi.antonio', 'wawingisebastiao2@gmail.com', '$2y$10$7yPDHggOEGXjGyB15cZiEuOkcncIh5tXJ5dJSVaf7GUVPjOXvunla', 'Jf5JGKnrQKIoevCWyDYPQJqCm9Psb5I1dR1psjBJp4YqyvGbYvr2nL0duev5', 1, '2020-12-29 10:10:25', '2020-12-29 10:10:25', 'bc251342-68f0-4cff-8a07-72b6e3055a51', 1),
	('c41dbe9d-0421-49b2-bcdb-d9f1f5a23bbc', 'eduanela.rosa', 'eduanela@gmail.com', '$2y$10$y2QMW8Vz99h4N0X34Zffp.DS9Om5reI8v3qR5GbVWXdvGflhFHRcO', NULL, 1, '2020-12-29 10:11:18', '2020-12-29 10:11:18', '3b951771-e71d-44f1-a3f5-473491f06ab2', 1),
	('1f709abe-af91-4d4f-9b96-01a1a4ae5748', 'eunicegastao', 'gastao@gadaw.com', '$2y$10$0I4lghC6Gia9WJ6ldHVl5OeP3IPI5BBarZl67bI4jDYUJFU5dcYtq', NULL, 1, '2020-12-29 19:10:58', '2020-12-29 19:10:58', 'ba087dc4-4c44-40d6-822a-f835fbcd2227', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
