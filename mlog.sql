--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `status` tinytext NOT NULL,
  `type` tinytext NOT NULL,
  `message` text NOT NULL,
  `details` text NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;