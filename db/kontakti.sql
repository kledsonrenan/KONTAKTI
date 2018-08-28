-- -----------------------------------------------------
-- Database kontakti
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `kontakti`;
USE `kontakti` ;
-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL UNIQUE,
    `telefone` VARCHAR(20) NOT NULL UNIQUE,
    `aniversario` VARCHAR(12) NULL,
    `senha` VARCHAR(255) NOT NULL,
    `imagem` longblob,
    PRIMARY KEY (`id`)
);
-- -----------------------------------------------------
-- Table `contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contatos` (
    `id` INT AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45),
    `telefone` VARCHAR(20) NOT NULL,
    `aniversario` VARCHAR(12),
    `descricao` VARCHAR(255),
    `imagem` longblob,
    `user_id` INT,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`)
    REFERENCES `user`(id)
);
-- -----------------------------------------------------
-- Table `telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `telefones` (
    `id` INT AUTO_INCREMENT,
    `telefone` VARCHAR(20) NOT NULL UNIQUE,
    `contato_id` INT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`contato_id`)
    REFERENCES `contatos`(`id`)
);

CREATE TABLE IF NOT EXISTS `email` (
    `id` INT AUTO_INCREMENT,
    `email` VARCHAR(45) NOT NULL,
    `contato_id` INT,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`contato_id`)
    REFERENCES `contatos`(`id`)
);