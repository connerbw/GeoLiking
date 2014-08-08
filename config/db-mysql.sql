CREATE TABLE IF NOT EXISTS `bars` (
  `id`        INT(11)         NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(255)    NOT NULL,
  `latitude`  DECIMAL(11, 8) NOT NULL,
  `longitude` DECIMAL(11, 8) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =13;


INSERT INTO `bars` (`id`, `name`, `latitude`, `longitude`) VALUES
  (8, 'Bondi Beach', '-33.8905420000000000', '151.2748560000000000'),
  (9, 'Coogee Beach', '-33.9230360000000000', '151.2590520000000000'),
  (10, 'Cronulla Beach', '-34.0282490000000000', '151.1575070000000000'),
  (11, 'Manly Beach', '-33.8001012865707100', '151.2874782085418700'),
  (12, 'Maroubra Beach', '-33.9501980000000000', '151.2593020000000000');


CREATE TABLE IF NOT EXISTS `promotions` (
  `id`      INT(11) NOT NULL AUTO_INCREMENT,
  `bars_id` INT(11) NOT NULL,
  `text`    TEXT    NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bars_id` (`bars_id`)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =1;


ALTER TABLE `promotions`
ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`bars_id`) REFERENCES `bars` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

