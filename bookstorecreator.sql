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