
-- Table structure for table `admins`

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `admins`

INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('11', 'CARL', 'LLEMOS', '09065003256', 'blk10a', 'rizal', 'taytay', '2005-12-13', 'single', 'male', 'example@email.com', 'superadmin01', '$2y$10$XvLuAUgaDDiu0ELUPG0DseWICOwdJie3bsctz4OKu7NS7zc2jShUy', '3', '1', '1696377534_a61e5a9844f54d925415.jpg', '1696377559_51341acc6354e2343d9f.jpg', '...', '', '', '', '1696295971', '');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('30', 'carl', 'llemos', '', '', '', '', '', '', '', 'test@email.com', 'carl01', '$2y$10$fzL1CsRgN5IQPHDQz3thvueyzPMv5lk1EdZlE2bg/Bu.TXNO1fmdO', '3', '0', 'male-default.jpg', 'banner-default.png', '', '', '', '', '1696292380', '1696292380');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('31', 'admin', 'admins', '', '', '', '', '', '', '', 'admin01@email.com', 'admin01', '$2y$10$uuq8Vjjv3xFCfnEUSQShaOBAC9NTMmUAH8rXbWcnz5foC.GLtfCdm', '3', '0', 'male-default.jpg', 'banner-default.png', '', '', '', '', '1696320135', '1696320135');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('32', 'admin', 'one', '1234567890', '123 main st', 'metro manila', 'quezon city', '1980-01-01', '', 'male', 'testadmin1@example.com', 'admin1', '$2y$10$ScE/.scTfP2murMEXyahpOHeYSBNoU70CdpWxvQVjHTdb8ysUr3pG', '3', '0', 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('33', 'admin', 'two', '9876543210', '456 elm st', 'cebu', 'cebu city', '1981-02-02', '', 'female', 'testadmin2@example.com', 'admin2', '$2y$10$OGzRCWmOoPuyCmg0MEerYe8cTVKSiAgLB8BdzkPSVuM2HhtBMKiNq', '3', '0', 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('34', 'admin', 'three', '2345678901', '789 oak st', 'metro manila', 'manila', '1979-03-03', '', 'male', 'testadmin3@example.com', 'admin3', '$2y$10$0us0ppHLU4eIpNV.9aLoJ.WJDTte9AUnGxS5Goz3uW5pXvF8vmyhG', '3', '0', 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');
INSERT INTO admins (id, firstname, lastname, contact, address, province, city, birthday, status, gender, email, username, password, role, is_active, avatar, banner, bio, fb_link, ig_link, twi_link, date_updated, date_created) VALUES ('35', 'admin', 'four', '8765432109', '321 pine st', 'laguna', 'santa rosa', '1982-04-04', '', 'female', 'testadmin4@example.com', 'admin4', '$2y$10$S34kOlHbqQCdyuUabpqbGOF42jGWQBxm9p8qcmQ81sVPeIrODvfQu', '3', '0', 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');
