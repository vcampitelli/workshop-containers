CREATE DATABASE `app`;
USE `app`;

CREATE TABLE `users`
(
    `id`   mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(100)          NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO `users`
VALUES (NULL, 'Bill Gates'),
       (NULL, 'Steve Jobs'),
       (NULL, 'Mark Zuckerberg'),
       (NULL, 'Evan Spiegel'),
       (NULL, 'Jack Dorsey');
