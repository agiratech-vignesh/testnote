/*

CREATE TABLE IF NOT EXISTS `ips` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_email_verfied` smallint(1) NOT NULL DEFAULT '0',
  `email_verify_key` varchar(60) DEFAULT NULL,
  `forgot_pass_key` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `users_logins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ip_id` bigint(20) NOT NULL,
  `os` varchar(80) NOT NULL,
  `browser_agent` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `users` ADD `username` VARCHAR( 255 ) NOT NULL AFTER `email` ;
ALTER TABLE `users` CHANGE `first_name` `first_name` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
CHANGE `last_name` `last_name` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ;

INSERT INTO `users` (`id`, `created`, `updated`, `first_name`, `last_name`, `dob`, `mobile`, `email`, `username`, `password`, `is_email_verfied`, `email_verify_key`, `forgot_pass_key`) VALUES
(1, '2016-04-06 12:52:29', '2016-04-06 12:52:29', 'vignesh', 'thandapani', NULL, NULL, 'vignesh@agiratech.com', 'vignesh', '123456', 1, NULL, NULL),
(2, '2016-04-06 12:56:15', '2016-04-06 12:56:15', NULL, NULL, NULL, NULL, 'test@agiratech.com', 'testuser', '321654', 1, NULL, NULL);


*/
