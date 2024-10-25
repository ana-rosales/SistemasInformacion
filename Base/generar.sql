SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`subevento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`subevento` (
  `idSubevento` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `capacidad` BIGINT(50) NULL,
  `registrados` BIGINT(50) NULL,
  `asistentes` BIGINT(50) NULL,
  `descripcion` LONGTEXT NULL,
  `activo` TINYINT NULL,
  `lista` JSON NULL,
  PRIMARY KEY (`idSubevento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `activo` TINYINT NULL,
  `descripcion` MEDIUMTEXT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `evento`
    FOREIGN KEY ()
    REFERENCES `mydb`.`subevento` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asistente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`asistente` (
  `idAsistente` INT NOT NULL,
  `registros` JSON NULL,
  `constancias` VARCHAR(45) NULL,
  `asistentecol` JSON NULL,
  `usuario` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`idAsistente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `idadmin` INT NOT NULL,
  `usuario` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `contrasena` VARCHAR(45) NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`constancia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`constancia` (
  `idconstancia` INT NOT NULL,
  `asistente` VARCHAR(45) NOT NULL,
  `textoBase` VARCHAR(45) NULL,
  `linkFirma` VARCHAR(45) NULL,
  `evento` VARCHAR(45) NULL,
  `subevento` VARCHAR(45) NULL,
  `disponibles` VARCHAR(45) NULL,
  `constanciacol` VARCHAR(45) NULL,
  PRIMARY KEY (`idconstancia`),
  CONSTRAINT `idAsistente`
    FOREIGN KEY ()
    REFERENCES `mydb`.`asistente` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;