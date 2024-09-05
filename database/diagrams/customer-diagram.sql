CREATE TABLE `customer` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `cpf` varchar(255),
  `email` varchar(255),
  `gender` varchar(255),
  `phone` varchar(255),
  `age` int,
  `date_of_birth` date,
  `photo` varchar(255)
);
