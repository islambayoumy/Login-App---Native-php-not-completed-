CREATE TABLE `logindb`.`users` 
( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `fName` TEXT NOT NULL , 
    `lName` TEXT NOT NULL , 
    `email` TEXT NOT NULL , 
    `password` TEXT NOT NULL , 
    `timestamp` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
);