-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema fuegolocation
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fuegolocation
-- -----------------------------------------------------
/*DROP DATABASE IF EXISTS fuegolocation;*/
CREATE DATABASE fuegolocation CHARACTER SET utf8 COLLATE utf8_general_ci;
USE fuegolocation;

-- -----------------------------------------------------
-- Table `fuegolocation`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fuegolocation`.`user` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fuegolocation`.`vehicule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fuegolocation`.`vehicule` (
  `idVehicule` INT NOT NULL AUTO_INCREMENT,
  `marque` VARCHAR(60) NOT NULL,
  `modele` VARCHAR(45) NOT NULL,
  `annee` INT NOT NULL,
  `immatriculation` VARCHAR(7) NOT NULL,
  `nbChevaux` INT NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idVehicule`),
  CONSTRAINT `fk_vehicule_user1`
    FOREIGN KEY (`idUser`)
    REFERENCES `fuegolocation`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fuegolocation`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fuegolocation`.`location` (
  `idlocation` INT NOT NULL AUTO_INCREMENT,
  `locataire` VARCHAR(45) NOT NULL,
  `dateDebut` DATE NOT NULL,
  `dateFin` DATE NOT NULL,
  `idVehicule` INT NOT NULL,
  PRIMARY KEY (`idlocation`),
  CONSTRAINT `fk_location_vehicule1`
    FOREIGN KEY (`idVehicule`)
    REFERENCES `fuegolocation`.`vehicule` (`idVehicule`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
