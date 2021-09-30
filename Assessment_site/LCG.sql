-- Creating the table structure for table `LCG_category`
--

DROP TABLE IF EXISTS `LCG_category`;
CREATE TABLE IF NOT EXISTS `LCG_category` (
  `catID` varchar(6) NOT NULL default '',
  `catDesc` varchar(30) default NULL,
  PRIMARY KEY  (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table LCG_category`
--

INSERT INTO `LCG_category` (`catID`, `catDesc`) VALUES
('c1', 'Luxury'),
('c2', 'Tour'),
('c3', 'Safari'),
('c4', 'Golf'),
('c5', 'Weddings'),
('c6', 'Walking'),
('c7', 'Opera');

--
-- Creating the table structure for table `LCG_holidays`
--

DROP TABLE IF EXISTS `LCG_holidays`;
CREATE TABLE IF NOT EXISTS `LCG_holidays` (
  `holidayID` int(10) NOT NULL auto_increment,
  `holidayTitle` varchar(256) NOT NULL,
  `holidayDescription` varchar(256) default NULL,
  `holidayDuration` decimal(2) default NULL,
  `locationID` varchar(6) default NULL,
  `catID` varchar(6) default NULL,
  `holidayPrice` decimal(6,2) default NULL,
  PRIMARY KEY  (`holidayID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13;

--
-- Insert data for table `LCG_holidays`
--

INSERT INTO `LCG_holidays` (`holidayID`, `holidayTitle`, `holidayDescription`, `holidayDuration`, `locationID`, `catID`, `holidayPrice`) VALUES
(1, 'Milaidhoo Island Maldives', 'This stunning small island sits in the remote Baa Atoll - the Maldive\'s only UNESCO World Biosphere Reserve that\'s inhabited by dolphins, manta rays and whale sharks, and known for its seriously swish but sensitively-designed resorts.', '7', 'l1', 'c1', '4356'),
(2, 'Conrad Maldives Rangali Island', 'With luxurious villas and the chance to dine beneath the waves, this is a spectacular twin-island retreat. Conrad Maldives boasts the Maldives\' most iconic restaurant. Venture 16 feet below the ocean to dine at one of the world\'s most extraordinary venues.', '7', 'l2', 'c1', '2737'),
(3, 'Baraza Resort & Spa', 'One of Zanzibar\'s premier boutique resorts, in an award-winning beach setting. Part of The Zanzibar Collection, Baraza is family-owned, and the authentic touches and personalised service add an extra something special.', '7', 'l3', 'c1', '2582'),
(4, 'Colours of New England', 'Your adventures start and end in Boston, \'cradle of American liberty\', where sightseeing is made easy by the 2.5 mile long Freedom Trail, which leads you to 16 significant landmarks.', '11', 'l4', 'c2', '1999'),
(5, 'Western Highlights', 'The highlights of San Francisco, LA, Las Vegas and San Diego (optional) take you on a delightfully well-trodden path; with their iconic sights and nearby national parks drawing in the West\'s best dining, shopping, and nightlife.', '12', 'l5', 'c2', '1765'),
(6, 'Masai Explorer', 'This fantastic safari takes you to Kenya\'s premier wildlife reserves, from the stunning Rift Valley to the vast plains of the famous Masai Mara. Our only safari that travels north to Samburu and the famous Aberdares.', '10', 'l6', 'c3', '1929'),
(7, 'A Taste of Kenya', 'An exciting lodge-based safari taking you from the foothills of Kilimanjaro to the dramatic Rift Valley lakes and the rolling plains of the world-famous Masai Mara Game Reserve.', '10', 'l6', 'c3', '1979'),
(8, 'Dom Pedro Golf Offers', 'Dom Pedro Vilamoura Resort. playing at Vilamoura Pinhal,Vilamoura Millennium, Vilamoura Laguna and Vilamoura Old.', '5','l7', 'c4', '473'),
(9, 'Top of the Rock Wedding - Deluxe', 'Wedding Welcome Pack. Pre wedding meeting and wedding assistance with wedding specialist. Outdoor scenic setting for up to 25 guests.', '5', 'l8', 'c5' ,'3491'),
(10, 'Sorrento', 'Beautiful Sorrento is a magical place to marry, hugging the shores of the Neapolitan Riviera and staring at the imposing shape of Mount Vesuvius in the distance.', '7', 'l9', 'c5', '2268'),
(11, 'A Coast of Many Colours', 'Walking holiday in the Algarve. This holiday takes you from the Algarve\'s honeyed, southern coast through its agricultural heartland and onwards to the wilder, western shores.', '7', 'l7', 'c6', '785'),
(12, 'Verona Opera Festival', 'The atmospheric Roman amphitheatre in Verona provides a magnificent backdrop against which you can enjoy two wonderful operas. You will be sitting in numbered seats in the tiered section of the arena with good views of the stage.', '7', 'l10', 'c7', '1548');

--
-- Creating the table structure for table `LCG_location`
--

DROP TABLE IF EXISTS `LCG_location`;
CREATE TABLE IF NOT EXISTS `LCG_location` (
  `locationID` varchar(6) NOT NULL default '',
  `locationName` varchar(40) default NULL,
  `country` varchar(40) default NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table `LCG_location`
--

INSERT INTO `LCG_location` (`locationID`, `locationName`, `country`) VALUES
('l1', 'Milaidhoo Island', 'Maldives'),
('l2', 'Rangali Island', 'Maldives'),
('l3', 'Zanzibar', 'Tanzania'),
('l4', 'Boston', 'USA'),
('l5', 'San Francisco', 'USA'),
('l6', 'Nairobi', 'Kenya'),
('l7', 'Algarve', 'Portugal'),
('l8', 'New York', 'USA'),
('l9', 'Sorrento', 'Italy'),
('l10', 'Verona', 'Italy');









