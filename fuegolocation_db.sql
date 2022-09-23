SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";

CREATE DATABASE IF NOT EXISTS `fuegoLocation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fuegoLocation`;


CREATE TABLE `user` (
	`idUser` SMALLINT(6) UNSIGNED NOT NULL,
	`username` VARCHAR(32) NOT NULL,
	`email` VARCHAR(320) NOT NULL,
	`password` CHAR(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vehicule` (
	`idVehicule` SMALLINT(6) UNSIGNED NOT NULL,
	`marque` VARCHAR(30) NOT NULL,
	`modele` VARCHAR(50) NOT NULL,
	`annee` YEAR NOT NULL,
	`immatriculation` VARCHAR(7) NOT NULL,
	`nbChevaux` SMALLINT(4) UNSIGNED NOT NULL,
	`idUser` SMALLINT(6) UNSIGNED
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `location` (
	`idUser` SMALLINT(6) UNSIGNED NOT NULL,
	`idVehicule` SMALLINT(6) UNSIGNED NOT NULL,
	`dateDebut` DATETIME NOT NULL,
	`dateFin` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `user`
    MODIFY `idUser` SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `vehicule`
    MODIFY `idVehicule` SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `user`
    ADD PRIMARY KEY (`idUser`),
    ADD UNIQUE KEY `username` (`username`),
    ADD UNIQUE KEY `email` (`email`) USING BTREE;

ALTER TABLE `vehicule`
    ADD PRIMARY KEY (`idVehicule`),
    ADD UNIQUE KEY `id` (`idVehicule`,`idUser`) USING BTREE;

ALTER TABLE `location`
    ADD PRIMARY KEY (`idUser`,`idVehicule`);

