-- MySQL Script generated by MySQL Workbench
-- Tue Jun 13 22:24:57 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`AUTOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`AUTOR` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`GENERO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`GENERO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `DESC` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`EDITORA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`EDITORA` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`LIVRO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`LIVRO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `TITULO` VARCHAR(45) NOT NULL,
  `SLUG` VARCHAR(60) NOT NULL,
  `STATUS` CHAR(1) NOT NULL,
  `QTDE` INT NOT NULL,
  `EDITORA_ID` INT NOT NULL,
  `GENERO_ID` INT NOT NULL,
  `AUTOR_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_LIVRO_EDITORA_idx` (`EDITORA_ID` ASC) VISIBLE,
  INDEX `fk_LIVRO_GENERO1_idx` (`GENERO_ID` ASC) VISIBLE,
  INDEX `fk_LIVRO_AUTOR1_idx` (`AUTOR_ID` ASC) VISIBLE,
  CONSTRAINT `fk_LIVRO_EDITORA`
    FOREIGN KEY (`EDITORA_ID`)
    REFERENCES `biblioteca`.`EDITORA` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIVRO_GENERO1`
    FOREIGN KEY (`GENERO_ID`)
    REFERENCES `biblioteca`.`GENERO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LIVRO_AUTOR1`
    FOREIGN KEY (`AUTOR_ID`)
    REFERENCES `biblioteca`.`AUTOR` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`CLIENTE` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `ENDERECO` VARCHAR(45) NOT NULL,
  `CIDADE` VARCHAR(45) NOT NULL,
  `QTDE_LIVROS` INT NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`PEDIDO_LIVRO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`PEDIDO_LIVRO` (
  `ID_PEDIDO` INT NOT NULL AUTO_INCREMENT,
  `CLIENTE_ID` INT NOT NULL,
  `LIVRO_ID` INT NOT NULL,
  `DATA_EMPRESTIMO` DATE NOT NULL,
  `DATA_DEVOLUCAO` DATE NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`),
  INDEX `fk_PEDIDO_LIVRO_CLIENTE1_idx` (`CLIENTE_ID` ASC) VISIBLE,
  INDEX `fk_PEDIDO_LIVRO_LIVRO1_idx` (`LIVRO_ID` ASC) VISIBLE,
  CONSTRAINT `fk_PEDIDO_LIVRO_CLIENTE1`
    FOREIGN KEY (`CLIENTE_ID`)
    REFERENCES `biblioteca`.`CLIENTE` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PEDIDO_LIVRO_LIVRO1`
    FOREIGN KEY (`LIVRO_ID`)
    REFERENCES `biblioteca`.`LIVRO` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;