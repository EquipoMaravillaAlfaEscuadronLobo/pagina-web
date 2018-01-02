SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `pagina` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `pagina` ;

-- -----------------------------------------------------
-- Table `pagina`.`administrador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`administrador` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `pass` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_administrador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`galeria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`galeria` (
  `id_galeria` INT NOT NULL AUTO_INCREMENT ,
  `id_administrador` INT NOT NULL ,
  `nombre_galeria` VARCHAR(45) NULL ,
  `fecha` DATE NULL ,
  PRIMARY KEY (`id_galeria`) ,
  INDEX `fk_galeria_administrador1_idx` (`id_administrador` ASC) ,
  CONSTRAINT `fk_galeria_administrador1`
    FOREIGN KEY (`id_administrador` )
    REFERENCES `pagina`.`administrador` (`id_administrador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`foto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`foto` (
  `id_foto` INT NOT NULL AUTO_INCREMENT ,
  `direccion` VARCHAR(45) NULL ,
  `id_galeria` INT NOT NULL ,
  PRIMARY KEY (`id_foto`) ,
  INDEX `fk_foto_galeria_idx` (`id_galeria` ASC) ,
  CONSTRAINT `fk_foto_galeria`
    FOREIGN KEY (`id_galeria` )
    REFERENCES `pagina`.`galeria` (`id_galeria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`noticia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`noticia` (
  `id_noticia` INT NOT NULL AUTO_INCREMENT ,
  `id_administrador` INT NOT NULL ,
  `descripcion` VARCHAR(2000) NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_noticia`) ,
  INDEX `fk_noticia_administrador1_idx` (`id_administrador` ASC) ,
  CONSTRAINT `fk_noticia_administrador1`
    FOREIGN KEY (`id_administrador` )
    REFERENCES `pagina`.`administrador` (`id_administrador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`eventos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`eventos` (
  `id_evento` INT NOT NULL AUTO_INCREMENT ,
  `id_administrador` INT NOT NULL ,
  `descripcion_evento` VARCHAR(45) NULL ,
  `fecha` DATE NULL ,
  PRIMARY KEY (`id_evento`) ,
  INDEX `fk_eventos_administrador1_idx` (`id_administrador` ASC) ,
  CONSTRAINT `fk_eventos_administrador1`
    FOREIGN KEY (`id_administrador` )
    REFERENCES `pagina`.`administrador` (`id_administrador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`notificacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`notificacion` (
  `id_notificacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre_usuario` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(1000) NULL ,
  PRIMARY KEY (`id_notificacion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`institucion` (
  `id_institucion` INT NOT NULL AUTO_INCREMENT ,
  `id_administrador` INT NOT NULL ,
  `ubicacion` VARCHAR(45) NULL ,
  `facebook` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `historia` VARCHAR(1000) NULL ,
  `telefono` VARCHAR(10) NULL ,
  PRIMARY KEY (`id_institucion`) ,
  INDEX `fk_institucion_administrador1_idx` (`id_administrador` ASC) ,
  CONSTRAINT `fk_institucion_administrador1`
    FOREIGN KEY (`id_administrador` )
    REFERENCES `pagina`.`administrador` (`id_administrador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`autores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`autores` (
  `codigo_autor` INT(11) NOT NULL ,
  `nombre` VARCHAR(25) NULL ,
  `apellido` VARCHAR(25) NULL ,
  `nacimiento` DATE NULL ,
  `biografia` TEXT NULL ,
  PRIMARY KEY (`codigo_autor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`editoriales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`editoriales` (
  `codigo_editorial` INT(11) NOT NULL ,
  `nombre` VARCHAR(30) NULL ,
  `direccion` VARCHAR(50) NULL ,
  `pais` VARCHAR(10) NULL ,
  `email` VARCHAR(15) NULL ,
  `telefono` VARCHAR(15) NULL ,
  PRIMARY KEY (`codigo_editorial`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`libros`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`libros` (
  `codigo_libro` VARCHAR(45) NOT NULL ,
  `codigo_editorial` INT(11) NOT NULL ,
  `titulo` VARCHAR(50) NULL ,
  `estado` VARCHAR(25) NULL ,
  `fecha_publicacion` DATE NULL ,
  `foto` LONGBLOB NULL ,
  `motivo` TEXT NULL ,
  PRIMARY KEY (`codigo_libro`) ,
  INDEX `fk_libros_editoriales1_idx` (`codigo_editorial` ASC) ,
  CONSTRAINT `fk_libros_editoriales1`
    FOREIGN KEY (`codigo_editorial` )
    REFERENCES `pagina`.`editoriales` (`codigo_editorial` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pagina`.`movimiento_autores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina`.`movimiento_autores` (
  `codigo_libro` VARCHAR(45) NOT NULL ,
  `codigo_autor` INT(11) NOT NULL ,
  INDEX `fk_libros_has_autores_autores1_idx` (`codigo_autor` ASC) ,
  INDEX `fk_libros_has_autores_libros1_idx` (`codigo_libro` ASC) ,
  CONSTRAINT `fk_libros_has_autores_libros1`
    FOREIGN KEY (`codigo_libro` )
    REFERENCES `pagina`.`libros` (`codigo_libro` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libros_has_autores_autores1`
    FOREIGN KEY (`codigo_autor` )
    REFERENCES `pagina`.`autores` (`codigo_autor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `pagina` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
