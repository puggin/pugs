CREATE TABLE `users` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`nickname` varchar(255) DEFAULT null,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL
) Engine=InnoDB Charset=utf8;

CREATE TABLE `products` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null
) Engine=InnoDB Charset=utf8;

CREATE TABLE `auths` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`token` text,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`expires_at` datetime DEFAULT null,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null
) Engine=InnoDB Charset=utf8;