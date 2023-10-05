
-- Table structure for table `smtp`

CREATE TABLE `smtp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `smtp`

INSERT INTO smtp (id, server, port, username, password, date_updated) VALUES ('1', 'smtp.gmail.com', '5762', 'test021@email.com', 'password', '2023-10-04');
