
-- Table structure for table `users`

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_enrolled` int(11) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `users`

INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('11', '2', 'student1', 'test@email.com', '$2y$10$VzZng8qafgUnueC3oypLG.jLZr0N.ZriyvSrngjEBHaHpFF2Uaitu', '0', '0', '2023-10-05', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('12', '2', 'student2', 'test2@example.com', '$2y$10$I8GI.ja2A47oL2VQ05H.xeRvEW3pkJiSpGkShFsWPZruM0FQl.qYm', '0', '0', '2023-10-05', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('13', '2', 'student3', 'test3@example.com', '$2y$10$16/X/JAKFBKqjKFt5SJr4.3EsNhgcr1n9I5jS6kwUEoI23FCVb3Wq', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('14', '2', 'student4', 'test4@example.com', '$2y$10$eJ0jozct0GQZu5qJf7W0F.ioJeGv2fyqRpshLflXjRaUN.XnwUgDq', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('15', '2', 'student5', 'test5@example.com', '$2y$10$DLnK/tYKjEwsinpyCjOgsutYajCI02Ol/2eXNDvmnywazsOJqitnm', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('16', '2', 'student6', 'test6@example.com', '$2y$10$HooaR8ZbMEY10TKaxxeO8eZw1Yr1LiiTMiooFmxdaSoGzg6E6C6Tq', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('17', '2', 'student7', 'test7@example.com', '$2y$10$cYzaBYDUjj75XKcUuZU8Puymk0weY74A1bpG.R..aOA4ulfgPh/9O', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('18', '2', 'student8', 'test8@example.com', '$2y$10$7iemAGsmGT0frpobumZz.ugeo.SYJl8CaYI0o7Bh0d.7mnVH.2kAO', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('19', '2', 'student9', 'test9@example.com', '$2y$10$8srJQI4j2mg6uXMU2U8s1u5vyxjCzrJgbJSym8LvpKuEHfwQ6E2fu', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('20', '2', 'student10', 'test10@example.com', '$2y$10$K7G/rb85thRPgn/TE/wWtO9Sp0mEZzCQmoA6RU.jKrFmeRnOb1j9C', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('21', '1', 'instructor01', 'test11@example.com', '$2y$10$XvLuAUgaDDiu0ELUPG0DseWICOwdJie3bsctz4OKu7NS7zc2jShUy', '0', '1', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('22', '1', 'instructor2', 'test12@example.com', '$2y$10$ruaEcc685gmyZ6ApBnVzn.HaRxPIVvJ5LvyKLK.sKc.TNE2VnxmjK', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('23', '1', 'instructor3', 'test13@example.com', '$2y$10$FwK.KUgHGZh42dAx1OukPuFf1LyHrsI8l/IIrUywhvqzL61H0hMN.', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('24', '1', 'instructor4', 'test14@example.com', '$2y$10$.OcbN/M/IdiB8qkCVwrzEuhW7cvy8j.glvnpG3bEbUxwrCJuXyhRS', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('25', '1', 'instructor5', 'test15@example.com', '$2y$10$6WBYEUQQqKbMA2RSE1/.O.KReNQUc7t52k.OlzSHgX6wwhUHqWDgC', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('26', '1', 'instructor6', 'test16@example.com', '$2y$10$WQV2YQ7J67eG0Agwos5Rp.Gm8pMvhUmDEEneHsL3QCeSENu6ofThC', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('27', '1', 'instructor7', 'test17@example.com', '$2y$10$znyylciWW/TJckAUY4GfU.caY7spW1PhojIsyXl4BlVrIcN6c9apy', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('28', '1', 'instructor8', 'test18@example.com', '$2y$10$HoiZWBio8jyFuUuvkbfv5u6OOFbdBAMJ0lmX3Sm3Z3AbTmeS3hTTO', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('29', '1', 'instructor9', 'test19@example.com', '$2y$10$CrfCHYp5JudvOiZugoHW8OuOdvLDxjq09p4E32OzPBPABLjRR5knW', '0', '0', '2023-10-04', '2023-10-04');
INSERT INTO users (id, role, username, email, password, is_active, is_enrolled, date_updated, date_created) VALUES ('30', '1', 'instructor10', 'test20@example.com', '$2y$10$mt8wEAXl7gPK2DfO3HM7TexglqG/K1DXnfAVAPeFoC6hI0kmtkeHG', '0', '0', '2023-10-04', '2023-10-04');

-- Table structure for table `instructors`

CREATE TABLE `instructors` (
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

-- Dumping data for table `instructors`

INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('1', '38', 'Robert', 'Johnson', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '1970-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('2', '39', 'Michelle', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '1965-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('3', '40', 'Thomas', 'Davis', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1975-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('4', '41', 'Amanda', 'Clark', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '1982-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('5', '42', 'William', 'Johnson', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1978-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('6', '43', 'Elizabeth', 'White', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '1985-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('7', '44', 'Christopher', 'Thomas', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1973-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('8', '45', 'Sarah', 'Miller', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '1990-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('9', '46', 'Michael', 'Anderson', '7890123456', '876 Ash St', 'Cavite', 'Dasmarinas', '1987-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('10', '47', 'Jessica', 'Moore', '2109876543', '1098 Oakwood St', 'Rizal', 'Antipolo', '1984-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('11', '21', 'Robert', 'Johnson', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '1970-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('12', '22', 'Michelle', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '1965-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('13', '23', 'Thomas', 'Davis', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1975-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('14', '24', 'Amanda', 'Clark', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '1982-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('15', '25', 'William', 'Johnson', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1978-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('16', '26', 'Elizabeth', 'White', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '1985-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('17', '27', 'Christopher', 'Thomas', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1973-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('18', '28', 'Sarah', 'Miller', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '1990-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('19', '29', 'Michael', 'Anderson', '7890123456', '876 Ash St', 'Cavite', 'Dasmarinas', '1987-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', '');
INSERT INTO instructors (id, user_id, firstname, lastname, contact, address, province, city, birthday, status, gender, avatar, banner, bio, fb_link, ig_link, twi_link) VALUES ('20', '30', 'Jessica', 'Moore', '2109876543', '1098 Oakwood St', 'Rizal', 'Antipolo', '1984-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');
