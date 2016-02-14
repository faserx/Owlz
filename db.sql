CREATE TABLE `cms`.`pagine` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(30) NOT NULL , `contenuto` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `cms`.`admin` ( `id_admin` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `password` VARCHAR(32) NOT NULL , `email` TEXT NOT NULL , PRIMARY KEY (`id_admin`)) ENGINE = InnoDB;
