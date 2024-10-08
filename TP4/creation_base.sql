DROP DATABASE IF EXISTS `my_recipes`;
CREATE DATABASE `my_recipes`;
CREATE TABLE `my_recipes`.`users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(64) NOT NULL , `email` VARCHAR(512) NOT NULL , `password` VARCHAR(512) NOT NULL , `age` INT NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = MyISAM;
CREATE TABLE `my_recipes`.`recipes` ( `recipe_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(128) NOT NULL , `recipe` TEXT NOT NULL , `author` VARCHAR(512) NOT NULL , `is_enabled` BOOLEAN NOT NULL , PRIMARY KEY (`recipe_id`)) ENGINE = MyISAM;
CREATE TABLE `my_recipes`.`comments` ( `comment_id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL, `recipe_id` INT NOT NULL, `comment` TEXT NOT NULL , PRIMARY KEY (`comment_id`), FOREIGN KEY (`user_id`) REFERENCES users(`user_id`), FOREIGN KEY (`recipe_id`) REFERENCES recipes(`recipe_id`)) ENGINE = MyISAM;

INSERT INTO my_recipes.recipes (title,recipe,author,is_enabled) VALUES ('Cassoulet',"Le cassoulet est une spécialité régionale du Languedoc, à base de haricots secs, généralement blancs, et de viande. À son origine, il était à base de fèves. Le cassoulet tient son nom de la cassole en terre cuite émaillée dite caçòla1 en occitan et fabriquée à Issel.\n",'mickael.andrieu@exemple.com',true);
INSERT INTO my_recipes.recipes (title,recipe,author,is_enabled) VALUES ('Couscous',"Le couscous est d'une part une semoule de blé dur préparée à l'huile d'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d'épices, d'huile d'olive et de viande (rouge ou de volaille) ou de poisson.",'mickael.andrieu@exemple.com',false);
INSERT INTO my_recipes.recipes (title,recipe,author,is_enabled) VALUES ('Escalope milanaise',"L'escalope à la milanaise, ou escalope milanaise est une escalope panée, de viande de veau, traditionnellement prise dans le faux-filet. Historiquement, on la cuit avec du beurre. Elle est généralement servie avec salade ou frites, accompagnée de sauce mayonnaise. On peut y ajouter un filet de jus de citron.\n\nEn Italie, ce mets ne se sert pas avec des pâtes.",'mathieu.nebra@exemple.com',true);
INSERT INTO my_recipes.recipes (title,recipe,author,is_enabled) VALUES ('Salade Romaine',"La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de « sauce César » à base de parmesan râpé, huile d'olive, pâte d'anchois, ail, vinaigre de vin, moutarde, jaune d'œuf et sauce Worcestershire.",'laurene.castor@exemple.com',false);

INSERT INTO my_recipes.users (full_name,email,password,age) VALUES ('Mickaël Andrieu','mickael.andrieu@exemple.com','S3cr3t',34);
INSERT INTO my_recipes.users (full_name,email,password,age) VALUES ('Mathieu Nebra','mathieu.nebra@exemple.com','devine',34);
INSERT INTO my_recipes.users (full_name,email,password,age) VALUES ('Laurène Castor','laurene.castor@exemple.com','P4ssW0rD',28);


