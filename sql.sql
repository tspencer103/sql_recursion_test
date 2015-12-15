-- --------------------------------------------------------

--
-- Table structure for table `test_assign_option_product`
--

CREATE TABLE IF NOT EXISTS `test_assign_option_product` (
  `option_id` bigint(20) NOT NULL default '0',
  `product_id` bigint(20) NOT NULL default '0'
);

--
-- Dumping data for table `test_assign_option_product`
--

INSERT INTO `test_assign_option_product` VALUES(1, 1);
INSERT INTO `test_assign_option_product` VALUES(1, 2);
INSERT INTO `test_assign_option_product` VALUES(2, 3);
INSERT INTO `test_assign_option_product` VALUES(2, 4);
INSERT INTO `test_assign_option_product` VALUES(3, 1);
INSERT INTO `test_assign_option_product` VALUES(5, 1);
INSERT INTO `test_assign_option_product` VALUES(3, 2);
INSERT INTO `test_assign_option_product` VALUES(5, 2);
INSERT INTO `test_assign_option_product` VALUES(1, 5);
INSERT INTO `test_assign_option_product` VALUES(6, 5);
INSERT INTO `test_assign_option_product` VALUES(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test_categories`
--

CREATE TABLE IF NOT EXISTS `test_categories` (
  `cat_id` bigint(20) NOT NULL auto_increment,
  `cat_name` varchar(255) NOT NULL default '',
  `cat_parent_id` bigint(20) default NULL,
  PRIMARY KEY  (`cat_id`)
);

--
-- Dumping data for table `test_categories`
--

INSERT INTO `test_categories` VALUES(1, 'All Cars', NULL);
INSERT INTO `test_categories` VALUES(2, 'Domestic Cars', 1);
INSERT INTO `test_categories` VALUES(3, 'Import Cars', 1);
INSERT INTO `test_categories` VALUES(4, 'Luxury Import Cars', 3);
INSERT INTO `test_categories` VALUES(5, 'Budget Import Cars', 3);
INSERT INTO `test_categories` VALUES(6, 'Luxury Domestic', 2);
INSERT INTO `test_categories` VALUES(7, 'Budget Domestic', 2);
INSERT INTO `test_categories` VALUES(8, 'German Luxury Cars', 4);

-- --------------------------------------------------------

--
-- Table structure for table `test_options`
--

CREATE TABLE IF NOT EXISTS `test_options` (
  `option_id` bigint(20) NOT NULL auto_increment,
  `option_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`option_id`)
);

--
-- Dumping data for table `test_options`
--

INSERT INTO `test_options` VALUES(1, 'Green');
INSERT INTO `test_options` VALUES(2, 'Blue');
INSERT INTO `test_options` VALUES(3, 'Black');
INSERT INTO `test_options` VALUES(4, 'Yellow');
INSERT INTO `test_options` VALUES(5, 'Brown');
INSERT INTO `test_options` VALUES(6, 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `test_products`
--

CREATE TABLE IF NOT EXISTS `test_products` (
  `product_id` bigint(20) NOT NULL auto_increment,
  `product_name` varchar(255) NOT NULL default '',
  `cat_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`product_id`)
);

--
-- Dumping data for table `test_products`
--

INSERT INTO `test_products` VALUES(1, 'Chevy', 7);
INSERT INTO `test_products` VALUES(2, 'BMW', 8);
INSERT INTO `test_products` VALUES(3, 'Ford', 7);
INSERT INTO `test_products` VALUES(4, 'Mercedes', 8);
INSERT INTO `test_products` VALUES(5, 'Honda', 5);
INSERT INTO `test_products` VALUES(6, 'Toyota', 5);
INSERT INTO `test_products` VALUES(7, 'Lexus', 4);
INSERT INTO `test_products` VALUES(8, 'Acura', 4);
INSERT INTO `test_products` VALUES(9, 'Chrysler', 1);
INSERT INTO `test_products` VALUES(10, 'Cadillac', 6);
