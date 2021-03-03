SELECT * FROM bookstoredata.author;

CREATE TABLE `bookstoredata`.`author` (
  `author_id` INT NOT NULL auto_increment,
  `author_name` VARCHAR(45) NOT NULL,
  `book_id` INT NOT NULL,
  PRIMARY KEY (`author_id`),
  INDEX `book_id_idx` (`book_id` ASC) ,
  CONSTRAINT `book_id`
    FOREIGN KEY (`book_id`)
    REFERENCES `bookstoredata`.`bookstorecreator` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO `bookstoredata`.`author` (`author_name`, `book_id`) VALUES ('nepolian hill', '1');
INSERT INTO `bookstoredata`.`author` (`author_name`, `book_id`) VALUES ('Robert Jr', '1');
INSERT INTO `bookstoredata`.`author` (`author_name`, `book_id`) VALUES ('Mr. Will', '3');
