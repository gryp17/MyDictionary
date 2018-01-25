
CREATE TABLE word (
    id int PRIMARY KEY AUTO_INCREMENT,
    en varchar(100),
    bg varchar(100),
    note varchar(500)
);

INSERT INTO `word` (`id`, `en`, `bg`, `note`) VALUES
(1, 'test', 'тест', 'нещо си'),
(2, 'apple', 'ябълка', NULL),
(3, 'orange', 'портокал', 'оранжев цвят?'),
(4, 'car', 'кола', NULL),
(5, 'bus', 'автобус', 'някаква бележка...'),
(6, 'cat', 'котка', NULL),
(7, 'dog', 'куче', NULL),
(8, 'parrot', 'папагал', NULL),
(9, 'bull', 'бик', NULL),
(10, 'red', 'червено', NULL),
(11, 'blue', 'синьо', NULL),
(12, 'dictionary', 'речник', 'obvious');