--
-- Database: `recipes`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `stepno` int(11) NOT NULL,
  `text` varchar(1024) NOT NULL
);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `units_of_measure` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20) NOT NULL
);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(45) NOT NULL
);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `recipe_ingredients_units` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL
);

