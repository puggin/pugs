CREATE TABLE `users` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`nickname` varchar(255) DEFAULT null,
	`password` varchar(255) NOT NULL,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null
) Engine=InnoDB Charset=utf8;

CREATE TABLE `user_groups` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`user_id` int(11) UNSIGNED DEFAULT 0,
	`user_group_id` int(11) UNSIGNED DEFAULT 0,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null,

	INDEX (user_id),
	INDEX (user_group_id)
) Engine=InnoDB Charset=utf8;

CREATE TABLE `groups` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` varchar(255) NOT NULL,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null
) Engine=InnoDB Charset=utf8;

CREATE TABLE `products` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null
) Engine=InnoDB Charset=utf8;

CREATE TABLE `streams` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`user_id` int(11) UNSIGNED DEFAULT 0,
	`product_id` int(11) UNSIGNED DEFAULT 0,
	`points` int(11) UNSIGNED DEFAULT 0,
	`subject` varchar(255) NOT NULL DEFAULT '(No Title)',
	`content` text NOT NULL,

	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null,

	INDEX (user_id)
	INDEX (product_id)
) Engine=InnoDB Charset=utf8;

CREATE TABLE `stream_comments` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`user_id` int(11) UNSIGNED DEFAULT 0,
	`product_id` int(11) UNSIGNED DEFAULT 0,
	`parent_id` int(11) UNSIGNED DEFAULT 0,
	`points` int(11) UNSIGNED DEFAULT 0,
	`content` text NOT NULL,

	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null,

	INDEX (user_id),
	INDEX (product_id),
	INDEX (parent_id)
) Engine=InnoDB Charset=utf8;

CREATE TABLE `auths` (
	`id` int(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	`identifying_id` int(11) UNSIGNED DEFAULT 0, # oper_id -or- user_id
	`token` text,
	`created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
	`expires_at` datetime DEFAULT null,
	`updated_at` datetime DEFAULT null,
	`deleted_at` datetime DEFAULT null,

	INDEX (user_id)
) Engine=InnoDB Charset=utf8;