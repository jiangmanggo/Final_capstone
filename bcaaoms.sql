-- DATABASE NAME: bcaaoms


CREATE TABLE `association_chairman` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `association` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `association_chairman` VALUES('10', 'BAMAIFA', 'Jia Mae Gaspar', 'LunaLauv', '202cb962ac59075b964b07152d234b70', '');
INSERT INTO `association_chairman` VALUES('12', 'SFAADA', 'Ariel', 'ariel23', '4900d0a19b6894a4a514e9ff3afcc2c0', '');
INSERT INTO `association_chairman` VALUES('14', 'MOVA', 'ada', 'ada', '8c8d357b5e872bbacd45197626bd5759', '');



CREATE TABLE `buyer` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `buyer` VALUES('2', 'browny', 'ming', 'japan', 'ming@gmail.com', '987653112', '', 'brown', 'f05c8652de134d5c50729fa1b31d355b');
INSERT INTO `buyer` VALUES('3', 'browny', 'ming', 'japan', 'SDSDSD@asas', '987653112', '', 'brown', '95c90aa47733b9023c318d9914606339');
INSERT INTO `buyer` VALUES('7', 'jeff', 'michael', 'bago', 'jeff@gmail.com', '35423424234', '', 'bago', '002fd9bc0b24de3b80ce1efd7bc4dc19');
INSERT INTO `buyer` VALUES('15', 'Cherelyn', 'Lachica', 'Bago', 'c@gmail.com', '9876543212', '362281215_1626087751134478_1159189263628734869_n-654f7a7e2c1ca.png', 'che', 'f81e986ee4c9f80d6002bf5302b3ea87');
INSERT INTO `buyer` VALUES('16', 'Abegail', 'Eparosa', 'lcc', 'abegail@gmail.com', '9493193312', '', 'abegail', '7eb036d95efd0ec315606393479aec4a');
INSERT INTO `buyer` VALUES('17', 'Kent Marvin', 'Perez', '0171', 'admin@gmail.com', '9278824722', '', 'nerdskill', 'b3cd915d758008bd19d0f2428fbb354a');
INSERT INTO `buyer` VALUES('18', 'Kent Marvin', 'Perez', '0171', 'a@gmail.com', '12345678912', '', 'LunaLauv', '7e98b8a17c0aad30ba64d47b74e2a6c1');
INSERT INTO `buyer` VALUES('19', 'Dhea', 'Catanyag', 'Binubuhan', 'dea@gmail.com', '12345678912', 'agri-64ffbf6c77df3.png', 'dea', '96991368fec63c8a1bfc48a70010f84a');
INSERT INTO `buyer` VALUES('20', 'Anna Nicole', 'Ermeo', 'Brgy. Busay', 'annanicoleermeo@gmail.com', '9274228329', '', 'Anna', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `buyer` VALUES('21', 'roberto', 'robert', 'bago city', 'r@gmail.com', '9123456789', '', 'roberts', 'e95dafe7231707ebe28f6aeef49153c7');
INSERT INTO `buyer` VALUES('22', 'angel', 'vicentino', 'brgy.zone2', 'angelmarievicentino@gmail.com', '9499422964', '', 'angel', '827ccb0eea8a706c4c34a16891f84e7b');



CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no.` varchar(225) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cart` VALUES('290', '', '9', '48', '11', 'peanut', '2', 'peanut_shell_silo_310-c4dd8596761f45af82ee0658996a845c-6509ad9bc2066.jpg', '130');
INSERT INTO `cart` VALUES('292', '', '9', '43', '1', 'brown sugar', '1', 'washed-sugar-6509ad494735e.jpg', '77');
INSERT INTO `cart` VALUES('295', '', '9', '48', '14', 'peanut', '4', 'peanut_shell_silo_310-c4dd8596761f45af82ee0658996a845c-6509ad9bc2066.jpg', '130');
INSERT INTO `cart` VALUES('299', '', '11', '50', '14', 'Garlic', '2', 'garlic-6509ab93e1db1.jpeg', '140');
INSERT INTO `cart` VALUES('473', '', '12', '77', '19', 'Calamansi', '3', 'Calamansi-3-6509a44a615e6.jpg', '100');
INSERT INTO `cart` VALUES('474', '', '11', '47', '19', 'kamote', '2', 'corn-652f7cf085a1b.png', '300');
INSERT INTO `cart` VALUES('484', '', '11', '47', '22', 'kamote', '2', 'istockphoto-104091897-612x612-654c362b816c9.jpg', '300');
INSERT INTO `cart` VALUES('485', '', '12', '77', '22', 'Calamansi', '2', 'Calamansi-3-654c3694ce71b.jpg', '100');



CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` VALUES('3', 'Fruits');
INSERT INTO `category` VALUES('4', 'Other Basic Commodites');
INSERT INTO `category` VALUES('5', 'Lowland Vegetables');
INSERT INTO `category` VALUES('6', 'Highland Vegetables');
INSERT INTO `category` VALUES('7', 'Spices');
INSERT INTO `category` VALUES('8', 'Root Crops');



CREATE TABLE `client_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `shipping_fee` decimal(11,0) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `client_address` VALUES('1', 'Abuanan', '36');
INSERT INTO `client_address` VALUES('2', 'Alianza', '27');
INSERT INTO `client_address` VALUES('3', 'Atipuluan', '31');
INSERT INTO `client_address` VALUES('4', 'Bacong-Mortilla', '0');
INSERT INTO `client_address` VALUES('5', 'Bagroy', '0');
INSERT INTO `client_address` VALUES('6', 'Balingasag', '0');
INSERT INTO `client_address` VALUES('9', 'Binubuan', '0');
INSERT INTO `client_address` VALUES('10', 'Busay', '0');
INSERT INTO `client_address` VALUES('11', 'Calumangan', '0');
INSERT INTO `client_address` VALUES('12', 'Caridad', '0');
INSERT INTO `client_address` VALUES('13', 'Don Jorge L. Araneta', '0');
INSERT INTO `client_address` VALUES('14', 'Dulao', '0');
INSERT INTO `client_address` VALUES('15', 'Ilijan', '0');
INSERT INTO `client_address` VALUES('16', 'Lag-Asan', '0');
INSERT INTO `client_address` VALUES('17', 'Ma-ao', '0');
INSERT INTO `client_address` VALUES('18', 'Mailum', '50');
INSERT INTO `client_address` VALUES('19', 'Malingin', '0');
INSERT INTO `client_address` VALUES('20', 'Napoles', '0');
INSERT INTO `client_address` VALUES('21', 'Pacol', '0');
INSERT INTO `client_address` VALUES('22', 'Poblacion', '0');
INSERT INTO `client_address` VALUES('23', 'Sagasa', '0');
INSERT INTO `client_address` VALUES('24', 'Tabunan', '0');
INSERT INTO `client_address` VALUES('25', 'Taloc', '0');
INSERT INTO `client_address` VALUES('26', 'Sampinit', '0');



CREATE TABLE `farmer` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `association` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phonenumber` bigint(20) DEFAULT NULL,
  `farmers_identification_number` bigint(20) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `farmer` VALUES('9', 'gabriel', 'gabriel', 'pacol', 'BAMAIFA', 'gabriel@gmail.com', '9785483924', '123456789', '', 'BAMAIFA', '647431b5ca55b04fdf3c2fce31ef1915');
INSERT INTO `farmer` VALUES('11', 'Remie', 'Ventuales', 'Lunao', 'SFAADA', 'r@yahoo.com', '12345678912', '98765432', '', 'remie', 'c010ee455db4d2458f3b071bef2e25d0');
INSERT INTO `farmer` VALUES('12', 'Adrian', 'Catanyag', 'Mailum', 'MOVA', 'adrian@gmail.com', '12345678912', '12345', '', 'adrian', '8c4205ec33d8f6caeaaaa0c10a14138c');
INSERT INTO `farmer` VALUES('14', 'Anggelo', 'Cortez', 'Bagroy', 'MOVA', 'angelo@gmail.com', '9123456789', '64502011001064', '', 'angelo', '98a8d3f11b400ddc06d7343375b71a84');



CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity_stocks_left` varchar(255) NOT NULL,
  `quantity_purchased` varchar(255) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `number` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_ordered` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `order` VALUES('105', '3765281409', '9', '78', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'cooking oil', '1', '27', 'CANCELLED', '2023-10-13 02:09:33');
INSERT INTO `order` VALUES('106', '9831256740', '9', '78', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'cooking oil', '1', '27', 'received', '2023-10-13 12:42:10');
INSERT INTO `order` VALUES('107', '7843925106', '9', '78', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'cooking oil', '1', '27', 'received', '2023-10-13 14:09:28');
INSERT INTO `order` VALUES('108', '7843925106', '9', '43', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'brown sugar', '1', '77', 'received', '2023-10-13 14:09:28');
INSERT INTO `order` VALUES('109', '3498617025', '9', '43', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'brown sugar', '1', '77', 'received', '2023-10-13 14:47:01');
INSERT INTO `order` VALUES('110', '3498617025', '9', '78', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'cooking oil', '1', '27', 'received', '2023-10-13 14:47:01');
INSERT INTO `order` VALUES('111', '3498617025', '9', '48', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'peanut', '1', '130', 'received', '2023-10-13 14:47:01');
INSERT INTO `order` VALUES('112', '3796825104', '9', '80', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'dragon fruit', '1', '80', 'received', '2023-10-15 00:02:03');
INSERT INTO `order` VALUES('113', '5803172694', '9', '48', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'peanut', '1', '130', 'RECEIVED', '2023-10-16 13:09:17');
INSERT INTO `order` VALUES('114', '5068347291', '9', '48', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'peanut', '1', '130', 'received', '2023-10-16 17:53:01');
INSERT INTO `order` VALUES('115', '2569340178', '14', '81', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bago', 'watermelon', '1', '50', 'received', '2023-10-17 10:18:44');
INSERT INTO `order` VALUES('116', '9153026478', '12', '77', '15', 'Cherelyn', 'Lachica', '9876543212', 'Mailum', 'Calamansi', '1', '100', 'received', '2023-10-17 10:19:13');
INSERT INTO `order` VALUES('117', '7462830159', '14', '81', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bago', 'watermelon', '1', '50', 'received', '2023-10-17 15:17:34');
INSERT INTO `order` VALUES('118', '6459702831', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bago', 'watermelon', '10', '50', 'received', '2023-10-18 14:09:37');
INSERT INTO `order` VALUES('119', '6459702831', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '4', '180', 'received', '2023-10-18 14:09:37');
INSERT INTO `order` VALUES('120', '6459702831', '14', '87', '19', 'Dhea', 'Catanyag', '12345678912', 'Bago', 'sitaw', '2', '20', 'received', '2023-10-18 14:09:37');
INSERT INTO `order` VALUES('121', '6459702831', '14', '88', '19', 'Dhea', 'Catanyag', '12345678912', 'Bago', 'radish', '1', '25', 'received', '2023-10-18 14:09:37');
INSERT INTO `order` VALUES('122', '4635802971', '14', '90', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bago', 'tomato', '1', '1', 'received', '2023-10-18 22:52:54');
INSERT INTO `order` VALUES('123', '6237095481', '14', '90', '19', 'Dhea', 'Catanyag', '12345678912', 'Bago', 'tomato', '1', '1', 'received', '2023-10-18 23:23:48');
INSERT INTO `order` VALUES('124', '7963480152', '14', '91', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bago', 'bitter gourd', '1', '30', 'received', '2023-10-19 09:29:00');
INSERT INTO `order` VALUES('125', '4582907163', '14', '91', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bago', 'bitter gourd', '1', '30', 'received', '2023-10-19 10:13:44');
INSERT INTO `order` VALUES('126', '1396847052', '14', '81', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bagroy', 'watermelon', '7', '50', 'received', '2023-10-19 10:24:05');
INSERT INTO `order` VALUES('127', '0693841725', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'received', '2023-10-25 03:07:18');
INSERT INTO `order` VALUES('128', '8420639517', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '2', '180', 'RECEIVED', '2023-10-25 03:29:00');
INSERT INTO `order` VALUES('129', '8420639517', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-25 03:29:00');
INSERT INTO `order` VALUES('130', '8420639517', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-10-25 03:29:00');
INSERT INTO `order` VALUES('131', '7568134092', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-25 03:31:35');
INSERT INTO `order` VALUES('132', '7568134092', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-25 03:31:35');
INSERT INTO `order` VALUES('133', '7568134092', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-10-25 03:31:35');
INSERT INTO `order` VALUES('134', '7568134092', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-10-25 03:31:35');
INSERT INTO `order` VALUES('135', '1602937854', '14', '88', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'radish', '8', '25', 'received', '2023-10-25 16:32:16');
INSERT INTO `order` VALUES('136', '8701639254', '14', '88', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'radish', '1', '25', 'RECEIVED', '2023-10-25 21:26:32');
INSERT INTO `order` VALUES('137', '5831240769', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-10-25 22:07:22');
INSERT INTO `order` VALUES('138', '4895261307', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-10-25 22:10:27');
INSERT INTO `order` VALUES('139', '3819760245', '14', '91', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-10-25 23:39:24');
INSERT INTO `order` VALUES('140', '0285416379', '14', '81', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-25 23:54:16');
INSERT INTO `order` VALUES('141', '3705189642', '14', '81', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-25 23:55:46');
INSERT INTO `order` VALUES('142', '3561709284', '0', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', '', 'kamote', '0', '300', 'pending', '2023-10-25 23:58:56');
INSERT INTO `order` VALUES('143', '3475280916', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-25 23:59:08');
INSERT INTO `order` VALUES('144', '9017834265', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 00:06:12');
INSERT INTO `order` VALUES('145', '5872190364', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '2', '300', 'RECEIVED', '2023-10-26 00:30:56');
INSERT INTO `order` VALUES('146', '8714056932', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 00:36:19');
INSERT INTO `order` VALUES('147', '0985473162', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 00:46:56');
INSERT INTO `order` VALUES('148', '0279546138', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 00:57:21');
INSERT INTO `order` VALUES('149', '9840627315', '14', '81', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'watermelon', '7', '50', 'RECEIVED', '2023-10-26 01:20:01');
INSERT INTO `order` VALUES('150', '4973862051', '14', '81', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-26 07:10:27');
INSERT INTO `order` VALUES('151', '4973862051', '14', '87', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'sitaw', '5', '20', 'RECEIVED', '2023-10-26 07:10:27');
INSERT INTO `order` VALUES('152', '2653749810', '14', '87', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'sitaw', '5', '20', 'RECEIVED', '2023-10-26 08:34:22');
INSERT INTO `order` VALUES('153', '3186240759', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 09:14:35');
INSERT INTO `order` VALUES('154', '8137496025', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-10-26 09:16:16');
INSERT INTO `order` VALUES('155', '1327086549', '0', '90', '21', 'roberto', 'robert', '9123456789', '', 'Papaya', '0', '1', 'pending', '2023-10-26 09:22:33');
INSERT INTO `order` VALUES('156', '3095478612', '14', '81', '21', 'roberto', 'robert', '9123456789', 'Bagroy', 'watermelon', '2', '50', 'CANCELLED', '2023-10-26 09:24:05');
INSERT INTO `order` VALUES('157', '2403951678', '14', '90', '21', 'roberto', 'robert', '9123456789', 'Bagroy', 'Papaya', '10', '1', 'RECEIVED', '2023-10-26 09:24:17');
INSERT INTO `order` VALUES('158', '9632058471', '14', '90', '21', 'roberto', 'robert', '9123456789', 'Bagroy', 'Papaya', '2', '1', 'RECEIVED', '2023-10-26 09:26:50');
INSERT INTO `order` VALUES('159', '4653892710', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-10-26 11:22:36');
INSERT INTO `order` VALUES('160', '5249137806', '14', '81', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-07 15:50:37');
INSERT INTO `order` VALUES('161', '8462573190', '14', '88', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'radish', '3', '25', 'RECEIVED', '2023-11-07 22:45:29');
INSERT INTO `order` VALUES('162', '9247063581', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 12:11:40');
INSERT INTO `order` VALUES('163', '9247063581', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 12:11:40');
INSERT INTO `order` VALUES('164', '9247063581', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-11-08 12:11:40');
INSERT INTO `order` VALUES('165', '0157938624', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 13:20:32');
INSERT INTO `order` VALUES('166', '0157938624', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 13:20:32');
INSERT INTO `order` VALUES('167', '0157938624', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 13:20:32');
INSERT INTO `order` VALUES('168', '0895376142', '11', '47', '15', 'Cherelyn', 'Lachica', '9876543212', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 16:22:56');
INSERT INTO `order` VALUES('169', '0895376142', '12', '77', '15', 'Cherelyn', 'Lachica', '9876543212', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 16:22:56');
INSERT INTO `order` VALUES('170', '0895376142', '14', '81', '15', 'Cherelyn', 'Lachica', '9876543212', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 16:22:56');
INSERT INTO `order` VALUES('171', '0685143972', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-11-08 17:27:11');
INSERT INTO `order` VALUES('172', '0685143972', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 17:27:11');
INSERT INTO `order` VALUES('173', '0685143972', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 17:27:11');
INSERT INTO `order` VALUES('174', '7423185960', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'RECEIVED', '2023-11-08 17:31:51');
INSERT INTO `order` VALUES('175', '7423185960', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 17:31:51');
INSERT INTO `order` VALUES('176', '7423185960', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 17:31:51');
INSERT INTO `order` VALUES('177', '1739285460', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 17:59:36');
INSERT INTO `order` VALUES('178', '1739285460', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 17:59:36');
INSERT INTO `order` VALUES('179', '1739285460', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 17:59:36');
INSERT INTO `order` VALUES('180', '1739285460', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 17:59:36');
INSERT INTO `order` VALUES('181', '5973168240', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 18:36:19');
INSERT INTO `order` VALUES('182', '5973168240', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 18:36:19');
INSERT INTO `order` VALUES('183', '5973168240', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 18:36:19');
INSERT INTO `order` VALUES('184', '5973168240', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 18:36:19');
INSERT INTO `order` VALUES('185', '6049571832', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 18:40:35');
INSERT INTO `order` VALUES('186', '6049571832', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 18:40:35');
INSERT INTO `order` VALUES('187', '6049571832', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 18:40:35');
INSERT INTO `order` VALUES('188', '6049571832', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 18:40:35');
INSERT INTO `order` VALUES('189', '4039612578', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '2', '180', 'RECEIVED', '2023-11-08 18:55:13');
INSERT INTO `order` VALUES('190', '4039612578', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 18:55:13');
INSERT INTO `order` VALUES('191', '4162783590', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 19:20:24');
INSERT INTO `order` VALUES('192', '4162783590', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'RECEIVED', '2023-11-08 19:20:24');
INSERT INTO `order` VALUES('193', '0419732685', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 21:16:04');
INSERT INTO `order` VALUES('194', '0419732685', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 21:16:04');
INSERT INTO `order` VALUES('195', '0419732685', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 21:16:04');
INSERT INTO `order` VALUES('196', '8901542376', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 21:21:02');
INSERT INTO `order` VALUES('197', '8901542376', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 21:21:02');
INSERT INTO `order` VALUES('198', '8901542376', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 21:21:02');
INSERT INTO `order` VALUES('199', '7156289043', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 21:35:51');
INSERT INTO `order` VALUES('200', '7156289043', '14', '87', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'sitaw', '1', '20', 'RECEIVED', '2023-11-08 21:35:51');
INSERT INTO `order` VALUES('201', '9615837024', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'cancelled', '2023-11-08 21:38:23');
INSERT INTO `order` VALUES('202', '9615837024', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'cancelled', '2023-11-08 21:38:23');
INSERT INTO `order` VALUES('203', '3960281574', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'cancelled', '2023-11-08 23:06:38');
INSERT INTO `order` VALUES('204', '3960281574', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'cancelled', '2023-11-08 23:06:38');
INSERT INTO `order` VALUES('205', '3960281574', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'cancelled', '2023-11-08 23:06:38');
INSERT INTO `order` VALUES('206', '7068593142', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'RECEIVED', '2023-11-08 23:24:12');
INSERT INTO `order` VALUES('207', '7068593142', '12', '77', '19', 'Dhea', 'Catanyag', '12345678912', 'Mailum', 'Calamansi', '1', '100', 'RECEIVED', '2023-11-08 23:24:12');
INSERT INTO `order` VALUES('208', '7068593142', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'RECEIVED', '2023-11-08 23:24:12');
INSERT INTO `order` VALUES('209', '1924568307', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'cancelled', '2023-11-08 23:51:24');
INSERT INTO `order` VALUES('210', '1924568307', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'cancelled', '2023-11-08 23:51:24');
INSERT INTO `order` VALUES('211', '1073849562', '11', '47', '19', 'Dhea', 'Catanyag', '12345678912', 'Lunao', 'kamote', '1', '300', 'received', '2023-11-09 07:00:36');
INSERT INTO `order` VALUES('212', '1073849562', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'CONFIRMED', '2023-11-09 07:00:36');
INSERT INTO `order` VALUES('213', '5608793142', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'received', '2023-11-09 07:17:14');
INSERT INTO `order` VALUES('214', '5608793142', '14', '91', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'bitter gourd', '1', '30', 'received', '2023-11-09 07:17:14');
INSERT INTO `order` VALUES('215', '6382140975', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '2', '50', 'received', '2023-11-09 07:21:46');
INSERT INTO `order` VALUES('216', '6382140975', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '1', '180', 'CONFIRMED', '2023-11-09 07:21:46');
INSERT INTO `order` VALUES('217', '5723896104', '9', '84', '19', 'Dhea', 'Catanyag', '12345678912', 'pacol', 'banana', '4', '180', 'RECEIVED', '2023-11-09 07:43:12');
INSERT INTO `order` VALUES('218', '1407528639', '14', '81', '19', 'Dhea', 'Catanyag', '12345678912', 'Bagroy', 'watermelon', '1', '50', 'received', '2023-11-09 09:11:51');
INSERT INTO `order` VALUES('219', '1753096284', '0', '47', '15', 'Cherelyn', 'Lachica', '9876543212', '', 'kamote', '0', '300', 'pending', '2023-11-11 18:56:25');
INSERT INTO `order` VALUES('220', '4398607215', '0', '90', '22', 'angel', 'vicentino', '9499422964', '', 'Papaya', '0', '1', 'pending', '2023-11-15 13:33:08');
INSERT INTO `order` VALUES('221', '4375810926', '14', '90', '22', 'angel', 'vicentino', '9499422964', 'Bagroy', 'Papaya', '20', '1', 'received', '2023-11-15 13:34:20');
INSERT INTO `order` VALUES('222', '5298076413', '11', '47', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Lunao', 'kamote', '1', '300', 'pending', '2023-11-15 15:40:32');
INSERT INTO `order` VALUES('223', '5298076413', '12', '77', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Mailum', 'Calamansi', '1', '100', 'pending', '2023-11-15 15:40:32');
INSERT INTO `order` VALUES('224', '5298076413', '14', '81', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'Bagroy', 'watermelon', '1', '50', 'received', '2023-11-15 15:40:32');
INSERT INTO `order` VALUES('225', '5298076413', '9', '84', '20', 'Anna Nicole', 'Ermeo', '9274228329', 'pacol', 'banana', '1', '180', 'received', '2023-11-15 15:40:32');
INSERT INTO `order` VALUES('226', '3150829647', '14', '91', '22', 'angel', 'vicentino', '9499422964', 'Bagroy', 'bitter gourd', '1', '30', 'CONFIRMED', '2023-11-15 16:52:53');
INSERT INTO `order` VALUES('227', '4730961285', '9', '84', '22', 'angel', 'vicentino', '9499422964', 'pacol', 'banana', '4', '180', 'CONFIRMED', '2023-11-15 16:54:40');



CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `place_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `mode_of_payment` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `delete_flag` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_upload` date NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `product_list` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stocks` varchar(225) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `seller_id` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product_list` VALUES('47', '11', 'Lowland Vegetable', 'kamote', '284', '5 kilos', '300', 'Kilo', 'Fresh broccoli should be dark green in colour, with firm stalks and compact bud clusters. Broccoli is a fast-growing annual plant that grows 60–90 cm (24–35 inches) tall. Upright and branching with leathery leaves, broccoli bears dense green clusters of f', 'istockphoto-104091897-612x612-654c362b816c9.jpg', '2023-09-07 05:45:14');
INSERT INTO `product_list` VALUES('77', '12', 'Fruits', 'Calamansi', '214', '5 kilos', '100', 'Kilo', 'A small citrus fruit, with a bright orange flesh and a peel that goes from green to orange as it ripens. It tastes sour with a hint of sweetness, like a mix between a lime and a mandarin. It has a distinctive aroma – citrusy and floral.', 'Calamansi-3-654c3694ce71b.jpg', '2023-09-19 15:33:42');
INSERT INTO `product_list` VALUES('81', '14', 'Fruits', 'watermelon', '60', '1 kilo', '50', 'Kilo', 'Watermelons', 'TsIHwz-watermelon-clipart-file-652e98c638390.png', '2023-10-18 11:47:27');
INSERT INTO `product_list` VALUES('84', '9', 'Fruits', 'banana', '49', '5', '180', 'Kilo', 'Banana', 'Banana Lacatan-550x550-654c3662ee7c0.jpg', '2023-10-17 14:41:19');
INSERT INTO `product_list` VALUES('87', '14', 'Highland Vegetables', 'sitaw', '451', '1 kilo', '20', 'Kilo', 'Sitaw', 'FindsVegetables-61-654c36ea81325.jpg', '2023-10-18 11:47:27');
INSERT INTO `product_list` VALUES('88', '14', 'Lowland Vegetable', 'radish', '0', '1 kilo', '25', 'Kilo', 'Radish', 'radish-300x300-654c36c8838e0.jpg', '2023-10-18 11:47:27');
INSERT INTO `product_list` VALUES('90', '14', 'Fruits', 'Papaya', '430', '1 kilo', '1', 'Kilo', 'Papaya', 'a-papaya-cut-in-half-654c3739b5eb8.jpg', '2023-10-18 11:47:27');
INSERT INTO `product_list` VALUES('91', '14', 'Highland Vegetables', 'bitter gourd', '438', '1 kilo', '30', 'Kilo', 'Ampalaya', 'ampalaya-654c36d71c7ab.jpg', '2023-10-18 11:47:27');



CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `shop-name` varchar(255) NOT NULL,
  `shop-adress` varchar(255) NOT NULL,
  `total_sales` varchar(255) NOT NULL,
  `total_products` bigint(255) NOT NULL,
  `sales_date` date NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `super_admin` (
  `super_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`super_admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `super_admin` VALUES('1', 'sa123', 'f647e02a69ab0e51780373f86f89a12a');
INSERT INTO `super_admin` VALUES('2', 'sa123', 'sa123');

