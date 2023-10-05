
-- Table structure for table `students`

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `students`

INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('11', '11', 'carl', 'llemos', '09065003256', 'test', 'batanes', 'basco', '2005-11-29', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('12', '12', 'jane', 'smith', '09065003256', '456 elm st', 'cebu', 'cebu city', '2001-02-02', '', 'male', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('13', '13', 'Mark', 'Johnson', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1999-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('14', '14', 'Sarah', 'Williams', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '2002-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('15', '15', 'Michael', 'Brown', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1998-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('16', '16', 'Lisa', 'Miller', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '2003-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('17', '17', 'David', 'Davis', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1997-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('18', '18', 'Amy', 'Anderson', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '2004-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('19', '19', 'James', 'Wilson', '5678901234', '876 Ash St', 'Cavite', 'Dasmarinas', '1996-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO students (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('20', '20', 'Emily', 'Thomas', '4321098765', '1098 Oakwood St', 'Rizal', 'Antipolo', '2005-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');

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
