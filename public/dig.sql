-- MySQL Script generated by MySQL Workbench
-- Sel 21 Nov 2017 11:09:41  WIB
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`agency_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`agency_categories` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`agencies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`agencies` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `agency_categories_id` INT NOT NULL,
  PRIMARY KEY (`id`, `agency_categories_id`),
  INDEX `fk_agencies_agency_categories1_idx` (`agency_categories_id` ASC),
  CONSTRAINT `fk_agencies_agency_categories1`
    FOREIGN KEY (`agency_categories_id`)
    REFERENCES `mydb`.`agency_categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `agencies_id` INT NOT NULL,
  PRIMARY KEY (`id`, `agencies_id`),
  UNIQUE INDEX `nama_UNIQUE` (`name` ASC),
  INDEX `fk_users_agencies_idx` (`agencies_id` ASC),
  CONSTRAINT `fk_users_agencies`
    FOREIGN KEY (`agencies_id`)
    REFERENCES `mydb`.`agencies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`incomes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`incomes` (
  `id` INT NOT NULL,
  `info` VARCHAR(45) NULL,
  `value` VARCHAR(45) NULL,
  `file` VARCHAR(45) NULL,
  `date` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`expenses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`expenses` (
  `id` INT NOT NULL,
  `info` VARCHAR(45) NULL,
  `value` VARCHAR(45) NULL,
  `file` VARCHAR(45) NULL,
  `date` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`finance_logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`finance_logs` (
  `id` INT NOT NULL,
  `balance` VARCHAR(45) NULL,
  `agencies_id` INT NOT NULL,
  `agencies_agency_categories_id` INT NOT NULL,
  `incomes_id` INT NOT NULL,
  `expenses_id` INT NOT NULL,
  PRIMARY KEY (`id`, `agencies_id`, `agencies_agency_categories_id`, `incomes_id`, `expenses_id`),
  INDEX `fk_finance_logs_agencies1_idx` (`agencies_id` ASC, `agencies_agency_categories_id` ASC),
  INDEX `fk_finance_logs_incomes1_idx` (`incomes_id` ASC),
  INDEX `fk_finance_logs_expenses1_idx` (`expenses_id` ASC),
  CONSTRAINT `fk_finance_logs_agencies1`
    FOREIGN KEY (`agencies_id` , `agencies_agency_categories_id`)
    REFERENCES `mydb`.`agencies` (`id` , `agency_categories_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_finance_logs_incomes1`
    FOREIGN KEY (`incomes_id`)
    REFERENCES `mydb`.`incomes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_finance_logs_expenses1`
    FOREIGN KEY (`expenses_id`)
    REFERENCES `mydb`.`expenses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
