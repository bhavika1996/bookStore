create database bookstoredata;
use bookstoredata;

CREATE TABLE `bookstoredata`.`bookstorecreator` (
    `book_id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45) NOT NULL,
    `book_type` VARCHAR(45) NOT NULL,
    `price` INT NOT NULL,
    `publishing_year` DATE NOT NULL,
    `no.of pages` INT NOT NULL,
    `quantity_available` INT NOT NULL,
    PRIMARY KEY (`book_id`)
);

ALTER TABLE `bookstoredata`.`bookstorecreator` 
CHANGE COLUMN `no.of pages` `pages` INT(11) NOT NULL ;

ALTER TABLE `bookstoredata`.`bookstorecreator` 
ADD COLUMN `image` VARCHAR(100) NULL AFTER `quantity_available`;
