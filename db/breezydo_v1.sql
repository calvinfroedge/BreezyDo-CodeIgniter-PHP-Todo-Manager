SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `breezydo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

-- -----------------------------------------------------
-- Table `breezydo`.`todo_lists`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `breezydo`.`todo_lists` (
  `list_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `list_name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`list_id`) ,
  UNIQUE INDEX `todo_id_UNIQUE` (`list_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `breezydo`.`todo_urgency`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `breezydo`.`todo_urgency` (
  `urgency_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `urgency_name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`urgency_id`) ,
  UNIQUE INDEX `urgency_id_UNIQUE` (`urgency_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `breezydo`.`todo_status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `breezydo`.`todo_status` (
  `status_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `status_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`status_id`) ,
  UNIQUE INDEX `status_id_UNIQUE` (`status_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `breezydo`.`todos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `breezydo`.`todos` (
  `todo_id` INT NOT NULL AUTO_INCREMENT ,
  `todo_description` VARCHAR(255) NOT NULL ,
  `list` INT UNSIGNED NOT NULL ,
  `urgency` INT UNSIGNED NOT NULL ,
  `time_required` VARCHAR(45) NULL ,
  `status` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`todo_id`) ,
  INDEX `todos.list_id` (`list` ASC) ,
  INDEX `todos.urgency_id` (`urgency` ASC) ,
  UNIQUE INDEX `status_UNIQUE` (`status` ASC) ,
  INDEX `todos.status_id` (`status` ASC) ,
  CONSTRAINT `todos.list_id`
    FOREIGN KEY (`list` )
    REFERENCES `breezydo`.`todo_lists` (`list_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `todos.urgency_id`
    FOREIGN KEY (`urgency` )
    REFERENCES `breezydo`.`todo_urgency` (`urgency_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `todos.status_id`
    FOREIGN KEY (`status` )
    REFERENCES `breezydo`.`todo_status` (`status_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
