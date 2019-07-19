-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2015 at 08:06 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linked_open_data`
--
CREATE DATABASE IF NOT EXISTS `linked_open_data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `linked_open_data`;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `Serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`Serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Serial`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Vinay', 'vinay@gmail.com', 9591415016, 'Amazing Work!!'),
(2, 'vinay', 'vi@gmai.com', 9591456321, 'Keep up the good work.'),
(3, 'Vinay', 'v@g.com', 8050896963, 'Truly nice work!!'),
(4, 'vinay', 'vin@gmail.com', 8050896362, 'Go on!!nice one'),
(5, 'Vinay_Patil', 'vppv@gmail.com', 9591415016, 'Nice submittion');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `nodeOne` bigint(20) NOT NULL,
  `nodeTwo` bigint(20) NOT NULL,
  PRIMARY KEY (`nodeOne`,`nodeTwo`),
  KEY `nodeOne` (`nodeOne`),
  KEY `nodeTwo` (`nodeTwo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`nodeOne`, `nodeTwo`) VALUES
(12360, 12376),
(12360, 12384),
(12360, 12390),
(12360, 12391),
(12360, 12396),
(12360, 12397),
(12361, 12360),
(12361, 12369),
(12369, 12370),
(12369, 12375),
(12370, 12371),
(12370, 12372),
(12370, 12373),
(12370, 12374),
(12370, 12389),
(12376, 12377),
(12376, 12399),
(12376, 12401),
(12377, 12378),
(12377, 12379),
(12377, 12381),
(12384, 12385),
(12384, 12386),
(12384, 12387),
(12384, 12388),
(12391, 12392),
(12391, 12393),
(12391, 12394),
(12391, 12395),
(12396, 12398),
(12396, 12402),
(12397, 12403),
(12397, 12404),
(12397, 12405),
(12397, 12406),
(12397, 12407),
(12397, 12408),
(12397, 12409),
(12397, 12410),
(12397, 12411),
(12397, 12412);

-- --------------------------------------------------------

--
-- Table structure for table `node_data`
--

CREATE TABLE IF NOT EXISTS `node_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `node_id` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `vote` double NOT NULL,
  `property` varchar(20) DEFAULT NULL,
  `data` longtext NOT NULL,
  `TimeOfComment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_comment_id` bigint(20) NOT NULL DEFAULT '-1',
  `notified` varchar(5) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `owner` (`owner`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=228 ;

--
-- Dumping data for table `node_data`
--

INSERT INTO `node_data` (`id`, `node_id`, `owner`, `vote`, `property`, `data`, `TimeOfComment`, `parent_comment_id`, `notified`) VALUES
(40, 12360, 24, 1, 'null', 'A gadget is a small tool such as a machine that has a particular function but is often thought of as a novelty. Gadgets are sometimes referred to as gizmos.', '2015-04-14 15:38:45', -1, 'no'),
(41, 12360, 24, 1, 'Trivia', 'The first atomic bomb was nicknamed the gadget by the scientists of the Manhattan Project  tested at the Trinity site.', '2015-04-14 15:44:17', -1, 'no'),
(42, 12360, 24, 0, 'Application gadget', 'In the software industry "Gadget" refers to computer programs that provide services without needing an independent application to be launched for each one but instead run in an environment that manages multiple gadgets.', '2015-04-14 15:45:40', -1, 'no'),
(43, 12361, 32, 12, 'Definition', 'Technology is the collection of techniques methods or processes used in the production of goods or services or in the accomplishment of objectives such as scientific investigation. Technology can be the knowledge of techniques processes etc. or it can be embedded in machines computers devices and factories which can be operated by individuals without detailed knowledge of the workings of such things.', '2015-04-14 15:57:52', -1, 'no'),
(44, 12361, 24, 0, 'null', 'The term "technology" rose to prominence in the 20th century in connection with the Second Industrial Revolution.', '2015-04-14 16:02:28', -1, 'no'),
(45, 12361, 24, 0, 'null', 'Technology is the practical application of knowledge especially in a particular area and a capability given by the practical application of knowledge', '2015-04-14 16:03:45', -1, 'no'),
(54, 12369, 24, 3, 'Classification', 'It can be classified into home appliances computer appliances software appliances etc.', '2015-04-14 16:34:12', -1, 'no'),
(56, 12370, 24, 1, 'null', 'Home appliances are electrical/mechanical machines which accomplish some household functions such as cooking or cleaning. ', '2015-04-14 16:37:49', -1, 'no'),
(57, 12370, 24, 1, 'Classification', 'Can be classified into Major appliances small appliances and consumer electronics', '2015-04-14 16:38:38', -1, 'no'),
(58, 12370, 24, 1, 'History', 'While many appliances have existed for centuries the self-contained electric or gas powered appliances are a uniquely American innovation that emerged in the twentieth century. The development of these appliances is tied the disappearance of full-time domestic servants and to reduce the time consuming activities in pursuit of more recreational time.', '2015-04-14 16:39:44', -1, 'no'),
(59, 12370, 24, -1, 'null', 'This division is also noticeable in the maintenance and repair of these kinds of products. Brown goods usually require high technical knowledge and skills (which get more complex with time such as going from a soldering iron to a hot-air soldering station) while white goods may need more practical skills and "brute force" to manipulate the devices and heavy tools required to repair them.', '2015-04-14 16:40:59', -1, 'no'),
(61, 12371, 24, 1, 'null', 'In common use, an air conditioner is a device that lowers the air temperature. The cooling is typically achieved through a refrigeration cycle, but sometimes evaporation or free cooling is used', '2015-04-14 16:43:43', -1, 'no'),
(62, 12371, 24, 1, 'purpose', 'Air conditioning (often referred to as A/C, AC or aircon) is the process of altering the properties of air (primarily temperature and humidity) to more comfortable conditions, typically with the aim of distributing the conditioned air to an occupied space to improve thermal comfort and indoor air quality.', '2015-04-14 16:44:12', -1, 'no'),
(63, 12371, 24, -1, 'History', 'The basic concept behind air conditioning is said to have been applied in ancient Egypt, where reeds were hung in windows and were moistened with trickling water. The evaporation of water cooled the air blowing through the window. This process also made the air more humid, which can be beneficial in a dry desert climate. In Ancient Rome, water from aqueducts was circulated through the walls of certain houses to cool them. Other techniques in medieval Persia involved the use of cisterns and wind towers to cool buildings during the hot season.', '2015-04-14 16:44:43', -1, 'no'),
(65, 12372, 24, 0, 'null', 'A refrigerator (colloquially fridge) is a common household appliance that consists of a thermally insulated compartment and a heat pump (mechanical, electronic, or chemical) that transfers heat from the inside of the fridge to its external environment so that the inside of the fridge is cooled to a temperature below the ambient temperature of the room. Refrigeration is an essential food storage technique in developed countries. The lower temperature lowers the reproduction rate of bacteria, so the refrigerator reduces the rate of spoilage. A refrigerator maintains a temperature a few degrees above the freezing point of water. Optimum temperature range for perishable food storage is 3 to 5 Â°C (37 to 41 Â°F).[1] A similar device that maintains a temperature below the freezing point of water is called a freezer. The refrigerator replaced the icebox, which was a common household appliance for almost a century and a half prior. For this reason, a refrigerator is sometimes referred to as an icebox in American usage.', '2015-04-14 16:46:29', -1, 'no'),
(66, 12372, 24, 0, 'History', 'Before the invention of the refrigerator, icehouses were used to provide cool storage for most of the year. Placed near freshwater lakes or packed with snow and ice during the winter, they were once very common. Natural means are still used to cool foods today. On mountainsides, runoff from melting snow is a convenient way to cool drinks, and during the winter one can keep milk fresh much longer just by keeping it outdoors. The word "refrigeratory" was used as early at least as the 17th century', '2015-04-14 16:53:54', -1, 'no'),
(67, 12372, 24, 0, 'inventor', 'In 1913, refrigerators for home and domestic use were invented by Fred W. Wolf of Fort Wayne, Indiana with models consisting of a unit that was mounted on top of an ice box', '2015-04-14 16:54:25', -1, 'no'),
(68, 12372, 24, 0, 'null', 'Freezer units are used in households and in industry and commerce. Food stored at or below âˆ’18 Â°C (0 Â°F) is safe indefinitely.[8] Most household freezers maintain temperatures from âˆ’23 to âˆ’18 Â°C (âˆ’9 to 0 Â°F), although some freezer-only units can achieve âˆ’34 Â°C (âˆ’29 Â°F) and lower. Refrigerators generally do not achieve lower than âˆ’23 Â°C (âˆ’9 Â°F), since the same coolant loop serves both compartments: Lowering the freezer compartment temperature excessively causes difficulties in maintaining above-freezing temperature in the refrigerator compartment. Domestic freezers can be included as a separate compartment in a refrigerator, or can be a separate appliance. Domestic freezers are generally upright units resembling refrigerators or chests (upright units laid on their backs). Many modern upright freezers come with an ice dispenser built into their door. Some upscale models include thermostat displays and controls, and flat-screen televisions have even been incorporated.', '2015-04-14 16:54:51', -1, 'no'),
(70, 12373, 24, 3, 'null', 'A washing machine (laundry machine, clothes washer, or washer) is a machine used to wash laundry, such as clothing and sheets. The term is mostly applied to machines that use water as opposed to dry cleaning (which uses alternative cleaning fluids, and is performed by specialist businesses) or ultrasonic cleaners.', '2015-04-14 16:57:25', -1, 'no'),
(71, 12373, 24, -1, 'Trivia', 'China is the largest producer of washing machine with 30,355,000 units in the year 2005', '2015-04-14 16:58:40', -1, 'no'),
(72, 12373, 24, 1, 'null', 'Washing machines can be top loaded or front loaded', '2015-04-14 16:59:56', -1, 'no'),
(74, 12374, 24, 0, 'definition', 'A microwave oven, commonly referred to as a microwave, is a kitchen appliance that heats and cooks food by exposing it to electromagnetic radiation in the microwave spectrum. This induces polarized molecules in the food to rotate and produce thermal energy in a process known as dielectric heating. Microwave ovens heat foods quickly and efficiently because excitation is fairly uniform in the outer 25â€“38 mm (1â€“1.5 inches) of a homogenous (high water content) food item; food is more evenly heated throughout (except in heterogenous, dense objects) than generally occurs in other cooking techniques.', '2015-04-14 17:04:49', -1, 'no'),
(75, 12374, 24, 0, 'null', 'Microwave ovens are popular for reheating previously cooked foods and cooking a variety of foods.', '2015-04-14 17:05:08', -1, 'no'),
(76, 12374, 24, 0, 'null', 'The exploitation of high frequency radio waves for heating substances was made possible by the development of vacuum tube radio transmitters around 1920.', '2015-04-14 17:08:31', -1, 'no'),
(81, 12375, 24, 1, 'Definition', 'A small appliance or small domestic appliance is a portable or semi-portable machines, generally used on table-tops, counter-tops, or other platforms, to accomplish a household task. Examples include microwave ovens, toasters, humidifiers, and coffee makers. They contrast with major appliances (British "white goods"), such as the refrigerator and washing machine, which cannot be easily moved and are generally placed on the floor. Small appliances also contrast with consumer electronics (British "brown goods") which are for leisure and entertainment rather than purely practical tasks', '2015-04-14 17:16:55', -1, 'no'),
(82, 12375, 24, 1, 'Uses', 'Some small appliances perform the same or similar function as their larger counterparts. For example, a toaster oven is a small appliance that performs a similar function as an oven. Small appliances often have a home version and a commercial version, for example waffle irons, food processors, and blenders. The commercial, or industrial, version is designed to be used nearly continuously in a restaurant or other similar setting. Commercial appliances are typically connected to a more powerful electrical outlet, are larger and stronger, have more user-serviceable parts, and cost significantly more.', '2015-04-14 17:17:14', -1, 'no'),
(83, 12375, 24, 1, 'Types', 'Cooking, such as on a hot plate or with a slow cooker, microwave oven, rice cooker, bread machine, a tortilla/roti maker, or a sandwich toaster\r\nHeating, such as an electric heater\r\nCooling, such as air conditioning\r\nLighting using light fixtures\r\nBeverage-making, such as electric kettles, coffeemakers or iced tea-makers', '2015-04-14 17:17:47', -1, 'no'),
(84, 12375, 24, -1, 'null', 'Small appliances which are defective or improperly used or maintained may cause house fires and other property damage, or may harbor bacteria if not properly cleaned. It is important that users read the instructions carefully and that appliances that use a grounded cord be attached to a grounded outlet. Because of the risk of fire, some appliances have a short detachable cord that is connected to the appliance magnetically. If the appliance is moved further than the cord length from the wall, the cord will detach from the appliance.', '2015-04-14 17:18:09', -1, 'no'),
(86, 12376, 24, 16, 'Definition', 'A mobile phone (also known as a cellular phone, cell phone, hand phone, or simply a phone) is a phone that can make and receive telephone calls over a radio link while moving around a wide geographic area. It does so by connecting to a cellular network provided by a mobile phone operator, allowing access to the public telephone network. By contrast, a cordless telephone is used only within the short range of a single, private base station.', '2015-04-14 17:40:28', -1, 'no'),
(87, 12376, 24, 26, 'null', 'All mobile phones have a number of features in common, but manufacturers also try to differentiate their own products by implementing additional functions to make them more attractive to consumers. This has led to great innovation in mobile phone development over the past 20 years.', '2015-04-14 17:44:05', -1, 'no'),
(88, 12376, 24, 3, 'null', 'Low-end mobile phones are often referred to as feature phones, and offer basic telephony. Handsets with more advanced computing ability through the use of native software applications became known as smartphones.', '2015-04-14 17:44:25', -1, 'no'),
(89, 12376, 24, 4, 'manufacturers', 'In 2012, samsung was the biggest producers of mobile phones in world with 22% of total productions.', '2015-04-14 17:45:29', -1, 'no'),
(90, 12376, 24, 1, 'Health Effects', 'The effect mobile phone radiation has on human health is the subject of recent interest and study, as a result of the enormous increase in mobile phone usage throughout the world. Mobile phones use electromagnetic radiation in the microwave range, which some believe may be harmful to human health. A large body of research exists, both epidemiological and experimental, in non-human animals and in humans, of which the majority shows no definite causative relationship between exposure to mobile phones and harmful biological effects in humans. This is often paraphrased simply as the balance of evidence showing no harm to humans from mobile phones, although a significant number of individual studies do suggest such a relationship, or are inconclusive. Other digital wireless systems, such as data communication networks, produce similar radiation.', '2015-04-14 17:46:08', -1, 'no'),
(92, 12377, 24, 1, 'Definition', 'A smartphone (or smart phone) is a mobile phone with an advanced mobile operating system. They typically combine the features of a cell phone with those of other popular mobile devices, such as personal digital assistant (PDA), media player and GPS navigation unit. Most smartphones have a touchscreen user interface and can run third-party apps, and are camera phones. Smartphones from 2012 onwards also have high-speed mobile broadband 4G LTE internet web browsing, motion sensors, and mobile payment mechanisms.', '2015-04-14 17:48:25', -1, 'no'),
(93, 12377, 24, 0, 'null', 'In 2014, sales of smartphones worldwide topped 1.2 billion, which is up 28% from 2013.', '2015-04-14 17:48:42', -1, 'no'),
(94, 12377, 24, 0, 'The First', 'The first mobile phone to incorporate PDA features was an IBM prototype developed in 1992 and demonstrated that year at the COMDEX computer industry trade show. A refined version of the product was marketed to consumers in 1994 by BellSouth under the name Simon Personal Communicator', '2015-04-14 17:49:54', -1, 'no'),
(96, 12378, 24, 4, 'Operating System', 'Android is a mobile operating system (OS) based on the Linux kernel and currently developed by Google. With a user interface based on direct manipulation, Android is designed primarily for touchscreen mobile devices such as smartphones and tablet computers, with specialized user interfaces for televisions (Android TV), cars (Android Auto), and wrist watches (Android Wear). The OS uses touch inputs that loosely correspond to real-world actions, like swiping, tapping, pinching, and reverse pinching to manipulate on-screen objects, and a virtual keyboard. Despite being primarily designed for touchscreen input, it also has been used in game consoles, digital cameras, regular PCs (e.g. the HP Slate 21) and other electronics.', '2015-04-14 17:51:42', -1, 'no'),
(97, 12378, 24, 8, 'null', 'Before selling out to Google, Android co-founder Andy Rubin tried to sell the operating system to LG', '2015-04-14 17:55:10', -1, 'no'),
(98, 12378, 24, 11, 'null', 'The first mass-market Android smartphone was T-mobile.', '2015-04-14 17:57:52', -1, 'no'),
(99, 12378, 24, 3, 'null', 'The first Android tablet was the Samsung Galaxy Tab', '2015-04-14 17:58:11', -1, 'no'),
(100, 12378, 24, 2, 'null', 'Android is an open-source platform founded in October 2003 by Andy Rubin and backed by Google, along with major hardware and software developers (such as Intel, HTC, ARM, Motorola and Samsung) that form the Open Handset Alliance.', '2015-04-14 17:59:24', -1, 'no'),
(101, 12378, 24, 0, 'null', 'Android apps can be officially downloaded from Google play store', '2015-04-14 17:59:49', -1, 'no'),
(103, 12379, 24, 0, 'null', 'Windows Phone (WP) is a family of mobile operating systems developed by Microsoft for smartphones as the replacement successor to Windows Mobile[6][7] and Zune.[8] Windows Phone features a new user interface derived from Metro design language. Unlike Windows Mobile, it is primarily aimed at the consumer market rather than the enterprise market.[9] It was first launched in October 2010 with Windows Phone 7.', '2015-04-14 18:01:38', -1, 'no'),
(104, 12379, 24, 0, 'null', 'Windows Phone 7 was announced at Mobile World Congress in Barcelona, Catalonia, Spain, on February 15, 2010, and released publicly on November 8, 2010 in the United States.', '2015-04-14 18:03:29', -1, 'no'),
(105, 12379, 24, 0, '', 'On October 29, 2012, Microsoft released Windows Phone 8, a new generation of the operating system. Windows Phone 8 replaces its previously Windows CE-based architecture with one based on the Windows NT kernel with many components shared with Windows 8, allowing applications to be ported between the two platforms.', '2015-04-14 18:03:47', -1, 'no'),
(106, 12379, 24, 0, '', 'Windows Phone 8.1 also adds "Cortana", a voice assistant much like Siri and Google Now. Cortana replaces the previous Bing search feature, and was released as a beta in the United States in the first half of 2014, before expanding to other countries in late 2014 and early 2015.', '2015-04-14 18:04:17', -1, 'no'),
(107, 12379, 24, 0, 'null', 'Windows 10 (mobile) was announced on January 21, 2015, as a mobile operating system for smartphones and tablets with screens smaller than 8 inches running on ARM architecture. Its primary focus is unification with its PC counterpart in software and services; in accordance with this unification strategy, Microsoft began to phase out the Windows Phone brand from public usage in favor of using the "Windows 10" brand across all device classes (for instance, the Microsoft Store refers to smartphones that can be upgraded to the OS as being "Windows 10 ready") rather than using the name "Windows Phone 10".', '2015-04-14 18:04:39', -1, 'no'),
(115, 12381, 24, 0, 'null', 'Development of what was to become the iPhone began in 2004, when Apple started to gather a team of 1000 employees to work on the highly confidential "Project Purple",', '2015-04-14 18:18:03', -1, 'no'),
(116, 12381, 24, 0, 'null', 'In 2011, Tim Cook became CEO of the company.', '2015-04-14 18:23:23', -1, 'no'),
(117, 12381, 24, 0, 'null', 'The display responds to three sensors (four since the iPhone 4). Moving the iPhone around triggers two other sensors (three since the iPhone 4), which are used to enable motion-controlled gaming applications and location-based services.', '2015-04-14 18:24:15', -1, 'no'),
(119, 12384, 24, 1, 'Definition', 'A laptop or a notebook is a portable personal computer with a clamshell form factor, suitable for mobile use.[1] There was a difference between laptops and notebooks in the past, but nowadays it has gradually died away.[2] Laptops are commonly used in a variety of settings, including at work, in education, and for personal multimedia.', '2015-04-14 18:38:53', -1, 'no'),
(120, 12384, 24, -1, 'null', 'A laptop combines the components and inputs of a desktop computer, including display, speakers, keyboard and pointing device (such as a touchpad or a trackpad) into a single device. Most modern-day laptops also have an integrated webcam and a microphone. A laptop can be powered either from a rechargeable battery, or by mains electricity via an AC adapter. Laptop is a diverse category of devices and other more specific terms, such as rugged notebook or convertible, refer to specialist types of laptops, which have been optimized for specific uses. Hardware specifications change significantly between different types, makes and models of laptops.', '2015-04-14 18:39:10', -1, 'no'),
(121, 12384, 24, -1, 'null', 'As the personal computer (PC) became feasible in 1971, the idea of a portable personal computer followed. A "personal, portable information manipulator" was imagined by Alan Kay at Xerox PARC in 1968,[6] and described in his 1972 paper as the "Dynabook"', '2015-04-14 18:39:43', -1, 'no'),
(123, 12385, 24, 1, '', 'The form of a traditional laptop computer is a clamshell, with a screen on one of its inner sides and a keyboard on the opposite. It can be easily folded to conserve space while traveling. The screen and keyboard are inaccessible while closed. Devices of this form are commonly called a traditional laptop or notebook, particularly if they have a screen size of 13 to 17 inches measured diagonally and run a full-featured operating system like Windows 8.1, OS X or Linux..', '2015-04-14 18:41:06', -1, 'no'),
(125, 12386, 24, 1, 'null', 'A subnotebook or an ultraportable is a laptop designed and marketed with an emphasis on portability (small size, low weight and often longer battery life). Subnotebooks are usually smaller and lighter than standard laptops, weighing between 0.8 and 2 kg (2 to 5 pounds), with a battery life, exceeding 10 hours.Since the introduction of netbooks and ultrabooks, the line between subnotebooks and either category has been blurry. Netbooks are, in essence, a more basic-featured and a cheap subcategory of subnotebooks, and while some ultrabooks have a screen size too large to qualify as subnotebooks, certain ultrabooks fit in a subnotebook category. One notable example of a subnotebook is Apple Macbook Air.', '2015-04-14 18:42:30', -1, 'no'),
(127, 12387, 24, 0, 'null', 'Netbook was a form of a laptop as inexpensive, light-weight, energy-efficient device, especially suited for wireless communication and Internet access.Netbooks first became commercially available in around 2008 on the market, featuring a weight, a display size and a price combination of < 1 kg, < 9" and < U.S. $400 respectively. The name netbook (with net short for Internet) is used as "the device excels in web-based computing performance". To begin with, netbooks were mostly sold with light-weight variants of the Linux operating system, although later versions often have Windows XP or Windows 7 operating systems. All major netbook producing companies stopped producing them by the end of 2012', '2015-04-14 18:43:30', -1, 'no'),
(129, 12388, 24, -1, 'null', 'Typical modern convertibles have a complex joint between the keyboard housing and the display permitting the display panel to swivel and then lie flat on the keyboard housing. Most convertibles feature a touchscreen display alongside the traditional touchpad, to work in a tablet mode. The convertibles fit both in laptop and tablet device categories, but usually considered laptops, due to increased size and weight over the mainstream tablets.\r\nThe single joint used to enable the rotate and swivel motion of the screen creates a physical point of weakness on the laptop. Some manufacturers have attempted to overcome these weak points by adopting innovative methods such as a sliding design in which the screen slides up from the slate-like position and locks into place to provide the laptop mode. Due to the design of convertibles, they have few other weaknesses over traditional laptops, although a smaller form is often desired to increase portability.', '2015-04-14 18:44:23', -1, 'no'),
(131, 12389, 24, 1, 'Definition', 'Television,sometimes known as TV or Tele is a telecommunication medium used for transmitting moving images and sound. Television can transmit images that are monochrome (black-and-white), in color, or in three dimensions. The name television can refer specifically to a television set, a television program, or the medium of television transmission. ', '2015-04-15 16:07:15', -1, 'no'),
(132, 12389, 24, -1, 'null', 'German inventor Paul Nipkow managed to achieve static black and white television transmission with his famous â€œElectric Telescopeâ€ in 1884.', '2015-04-15 16:09:30', -1, 'no'),
(133, 12389, 24, 0, 'null', 'The biggest pioneers of early television were Paul Nipkow, Boris Rosing, Vladimir Zworkin, John Baird, Philo Farnsworth, Charles Francis Jenkins and William Bell.', '2015-04-15 16:09:43', -1, 'no'),
(134, 12389, 24, -1, 'null', 'The word â€œTelevisionâ€ was coined in 1900 by Russian scientist Constantin Perskyi', '2015-04-15 16:09:55', -1, 'no'),
(135, 12389, 24, 1, 'null', 'First American television station started working in 1928, and BBC transmission began in 1930.', '2015-04-15 16:10:09', -1, 'no'),
(136, 12389, 24, 0, 'null', 'Television became widely popular after the end of World War II. Over 1 million American homes had television in 1948.', '2015-04-15 16:10:21', -1, 'no'),
(137, 12389, 24, 0, 'null', 'First television sets had only modest picture capabilities 200-400 lines of resolution.', '2015-04-15 16:10:33', -1, 'no'),
(138, 12389, 24, 0, 'null', 'HD television standards were officially ratified in 1996, but even before that inventors all over the world created their own HD sets. Japanese used 1125 lines of resolution from 1981, and in 1943 John Logie Baird offered his own 1000 scanlines standard to British government, but they chose to ignore him.', '2015-04-15 16:10:52', -1, 'no'),
(139, 12389, 24, 0, 'null', 'Americans annually watch around 250 billion hours of television.', '2015-04-15 16:11:09', -1, 'no'),
(140, 12389, 24, 0, 'null', 'Average 65 year old person sees over 2 million TV commercials during his life', '2015-04-15 16:11:20', -1, 'no'),
(142, 12390, 24, 0, 'null', 'A tablet computer is a mobile computer with a touchscreen display, circuitry and battery in a single unit. Tablets come equipped with sensors, including cameras, a microphone and an accelerometer, and the touchscreen display uses finger or stylus gestures substituting for the use of computer mouse and keyboard. They usually feature on-screen, pop-up virtual keyboards for typing. Tablets may include physical buttons for basic features such as speaker volume and power, and ports for network communications and battery charging. Tablets are typically larger than smartphones or personal digital assistants at 7 inches (18 cm) or larger, measured diagonally. Tablets can be classified into several categories according to the presence and physical appearance of keyboards. Slates and booklets do not have a physical keyboard and typically feature text input performed through the use of a virtual keyboard projected on a touchscreen-enabled display. Hybrids and convertibles do have physical keyboards, although these devices typically also make virtual keyboards available.', '2015-04-15 16:14:38', -1, 'no'),
(143, 12390, 24, 0, 'null', 'There are 126 million tablet users in the world which is expected to reach 150 million by the end of 2013.', '2015-04-15 16:16:11', -1, 'no'),
(144, 12390, 24, 0, 'null', 'Tablet acquisition rises with age with the 25-54-year age group accounting for the maximum number of users.', '2015-04-15 16:16:27', -1, 'no'),
(145, 12390, 24, 0, 'null', 'Android tablets are on fire! They have already surpassed Apple with a market share of 57%.', '2015-04-15 16:16:42', -1, 'no'),
(146, 12390, 24, 1, 'null', '49% of adult tablet users have a college degree and 55% earn more than $75,000 a year.', '2015-04-15 16:17:00', -1, 'no'),
(147, 12390, 24, 1, 'null', 'Average tablet usage is 14 hours a week, ahead of smartphone and PC usage.', '2015-04-15 16:17:10', -1, 'no'),
(148, 12390, 24, 0, 'null', 'Smartphone owners who use tablets spend nearly three times more time on apps than those who dont own a tablet.', '2015-04-15 16:17:22', -1, 'no'),
(149, 12390, 24, -1, 'null', '69% of users use their tablets more frequently on weekdays than weekends', '2015-04-15 16:17:33', -1, 'no'),
(150, 12390, 24, 1, 'null', 'In 2012, an average tablet user spent $359 on buying products online.', '2015-04-15 16:18:28', -1, 'no'),
(151, 12390, 24, 1, 'null', 'With tablet usage gaining popularity, desktop usage is likely to go down by 75%. By the end of 2013, tablet sales will surpass laptop sales globally.', '2015-04-15 16:19:01', -1, 'no'),
(153, 12391, 24, 2, 'Definition', 'A camera is an optical instrument that records images that can be stored directly, transmitted to another location, or both. These images may be still photographs or moving images such as videos or movies.', '2015-04-15 16:21:36', -1, 'no'),
(154, 12391, 24, 1, 'null', 'The term camera comes from the word camera obscura (Latin for "dark chamber"), an early mechanism for projecting images. The modern camera evolved from the camera obscura. The functioning of the camera is very similar to the functioning of the human eye.', '2015-04-15 16:21:55', -1, 'no'),
(155, 12391, 24, 0, 'null', 'Traditional cameras capture light onto photographic plate or photographic film. Video and digital cameras use an electronic image sensor, usually a charge coupled device (CCD) or a CMOS sensor to capture images which can be transferred or stored in a memory card or other storage inside the camera for later playback or processing.', '2015-04-15 16:23:00', -1, 'no'),
(156, 12391, 24, 0, 'null', ' The first digital camera was created in December 1975, by Steve Sasson, who was an Engineer at Eastman Kodak. The camera weighed 8 pound and recorded 0.01 megapixel black and white photos. It took 23 seconds to create the first photograph.', '2015-04-15 16:24:02', -1, 'no'),
(157, 12391, 24, 0, 'null', 'In 1827, Joseph Nicephore Niepce made the first photographic image with a camera obscura. Prior to that, people used camera obscura for viewing or drawing purposes only', '2015-04-15 16:24:18', -1, 'no'),
(158, 12391, 24, 0, 'null', 'The known aerial photograph was taken by French photographer Gaspar Felix Tournachon in 1858. He was also a balloonist and took the photograph from hot air balloon.', '2015-04-15 16:24:30', -1, 'no'),
(159, 12391, 24, 0, 'null', 'The most expensive camera on the planet was a 1923 Leica O-Series camera after it was sold for approximately $2.79 million at a WestLicht auction.', '2015-04-15 16:24:41', -1, 'no'),
(160, 12391, 24, 0, 'null', ' The LumiÃ¨re Brothers introduce the first viable color process in photography. They developed the Autochrome plate in 1907', '2015-04-15 16:24:54', -1, 'no'),
(161, 12391, 24, 0, 'null', 'In 1861, a Scottish physicist, James Clerk Maxwell, created the first color photograph. He photographed a tartan ribbon three times: using a red, blue and yellow filter, and later on combined the three images into the final composite', '2015-04-15 16:25:05', -1, 'no'),
(162, 12391, 24, 0, 'null', ' On Sept. 4 1888, George Eastman brought photography to the masses when he received patent for his roll film. He committed suicide in 1932 (at the age of 77). His suicide letter read â€œMy work is done. Why wait?â€', '2015-04-15 16:25:22', -1, 'no'),
(163, 12391, 24, 0, 'null', 'The most famous use of the Hasselblad camera perhaps was during the Apollo program missions when man first landed on the Moon. Almost all of the still photographs taken during these missions used modified Hasselblad cameras. The team had to leave around 12 cameras on the moon so that they could carry back the extra weight of lunar rock samples.', '2015-04-15 16:26:01', -1, 'no'),
(165, 12392, 24, 0, 'Abbrevation', 'digital single-lens reflex camera', '2015-04-15 16:41:10', -1, 'no'),
(166, 12392, 24, 0, 'null', 'DSLRs largely replaced film-based SLRs during the 2000s, and despite the rising popularity of mirrorless system cameras in the early 2010s, DSLRs remained the most common type of interchangeable lens camera in use as of 2014.', '2015-04-15 16:41:58', -1, 'no'),
(168, 12393, 24, 1, 'null', 'The mirrorless interchangeable-lens camera (MILC) is a class of digital system cameras. This type of camera provides an interchangeable lens mount. They do not have a mirror reflex optical viewfinder. MILC cameras comprise 5% of total camera shipments', '2015-04-15 16:42:57', -1, 'no'),
(170, 12394, 24, 0, 'null', 'A point-and-shoot camera, also called a compact camera, is a still camera designed primarily for simple operation.Most use focus free lenses or autofocus for focusing, automatic systems for setting the exposure options, and have flash units built in', '2015-04-15 16:47:57', -1, 'no'),
(172, 12395, 24, 0, 'null', 'A camcorder is an electronic device combining a video camera and a video recorder. Although marketing materials may use the colloquial term "camcorder", the name on the package and manual is often "video camera recorder". Most devices capable of recording video are camera phones and digital cameras primarily intended for still pictures; the term "camcorder" is used to describe a portable, self-contained device, with video capture and recording its primary function', '2015-04-15 16:50:07', -1, 'no'),
(173, 12360, 35, -1, 'null', 'Test', '2015-04-18 17:15:38', -1, 'no'),
(174, 12396, 35, 1, '', '5', '2015-04-20 05:25:39', -1, 'no'),
(175, 12397, 35, 1, '', '9', '2015-04-20 05:28:27', -1, 'no'),
(176, 12398, 35, -1, '', 'This is just a demo\r\nhello screen1', '2015-04-22 08:57:15', -1, 'no'),
(177, 12398, 35, 0, 'test1', 'this is demo2', '2015-04-22 08:58:08', -1, 'no'),
(178, 12398, 35, 0, 'null', 'this is demo3', '2015-04-22 08:58:26', -1, 'no'),
(179, 12376, 35, 1, 'null', 'mobile is most useful device', '2015-04-22 09:57:00', -1, 'no'),
(180, 12399, 35, 1, '', 'Where the sim is of Particular company', '2015-04-22 09:58:14', -1, 'no'),
(182, 12401, 35, -1, '', 'GSM stands for Global System for Mobile Communications', '2015-05-15 18:23:45', -1, 'no'),
(183, 12402, 35, 0, '', 'This was created for Redundant Suggestions!!', '2015-05-15 18:25:44', -1, 'no'),
(184, 12403, 35, -1, '', 'This was created for Redundant Suggestions!!', '2015-05-15 18:26:05', -1, 'no'),
(186, 12403, 35, 1, 'test1', 'this is dummy data for test1', '2015-05-15 20:28:12', -1, 'no'),
(187, 12403, 35, 1, 'null', 'this is one more dummy for test1', '2015-05-15 20:28:28', -1, 'no'),
(189, 12395, 35, 0, 'Definition', 'It is a machine to record a video.', '2015-06-05 18:51:28', -1, 'no'),
(190, 12390, 35, 0, 'null', 'Yes, Tablets are very helpful', '2015-06-07 04:13:47', -1, 'no'),
(191, 12360, 35, 1, 'Test1', 'Hello', '2015-06-07 04:41:13', -1, 'no'),
(192, 12360, 35, 0, 'null', 'Test2', '2015-06-07 04:41:30', -1, 'no'),
(193, 12376, 35, 0, NULL, 'Hello Reply Test', '2015-06-10 09:50:02', 87, 'no'),
(194, 12376, 35, 0, NULL, 'Hello Reply2 Test', '2015-06-10 11:35:16', 87, 'no'),
(195, 12376, 35, 0, NULL, 'Hello Reply3 Test', '2015-06-10 11:52:18', 86, 'no'),
(196, 12376, 35, 0, NULL, 'Hello Reply4 try', '2015-06-10 11:53:54', 89, 'no'),
(197, 12376, 35, 0, NULL, 'Hello Reply5 Test', '2015-06-10 12:22:25', 87, 'no'),
(198, 12376, 35, 0, NULL, 'New Reply', '2015-06-10 14:52:09', 87, 'no'),
(199, 12376, 35, 0, NULL, 'Inner Reply', '2015-06-10 14:54:24', 193, 'yes'),
(200, 12376, 35, 1, 'null', 'Just a test for linking', '2015-06-14 02:38:27', -1, 'no'),
(201, 12376, 35, -1, 'null', 'Is there a link for Laptop', '2015-06-14 02:38:53', -1, 'no'),
(202, 12376, 35, 0, 'null', 'Smartphone ?', '2015-06-14 02:39:18', -1, 'no'),
(203, 12404, 35, 0, '', ' Atleast for <a href=# id=Screen onclick= sessionsetfunc()>Screen</a>', '2015-06-14 02:40:17', -1, 'no'),
(204, 12396, 35, 0, 'null', 'Hello', '2015-06-14 02:40:38', -1, 'no'),
(205, 12405, 35, 0, '', ' Hello <a href=# id=Laptop onclick= sessionsetfunc()>Laptop</a> is under <a href=# id=Gadget onclick= sessionsetfunc()>Gadget</a> and smartphone mobile again all are', '2015-06-14 02:44:26', -1, 'no'),
(206, 12406, 35, 0, '', ' Hello Screen1 Gadget <a href=# id=Tablets onclick= sessionsetfunc()>Tablets</a> Cameras', '2015-06-15 04:48:16', -1, 'no'),
(207, 12407, 35, 0, '', 'hello Gadget Laptop ', '2015-06-15 05:23:49', -1, 'no'),
(208, 12408, 35, 0, '', 'Gadget L', '2015-06-15 05:26:19', -1, 'no'),
(209, 12409, 35, 0, '', ' <a href=# id=Gadget onclick= sessionsetfunc()>Gadget</a> <a href=# id=Laptop onclick= sessionsetfunc()>Laptop</a> Screen1', '2015-06-15 05:28:19', -1, 'no'),
(210, 12410, 35, 0, '', ' <a href=# id=Gadget onclick= sessionsetfunc()>Gadget</a> <a href=# id=Laptop onclick= sessionsetfunc()>Laptop</a>', '2015-06-15 05:42:21', -1, 'no'),
(211, 12411, 35, 0, '', ' Hello <a href=# id=Gadget onclick= sessionsetfunc()>Gadget</a> <a href=# id=Laptop onclick= sessionsetfunc()>Laptop</a>', '2015-06-15 05:53:07', -1, 'no'),
(212, 12360, 35, 0, 'null', 'Test3', '2015-06-15 06:07:01', -1, 'no'),
(213, 12360, 35, -1, 'Test_base', 'base_test', '2015-06-15 06:07:20', -1, 'no'),
(214, 12397, 35, 1, 'File upload Test', 'hello this is a demo<br><img src=''uploads/Screenshot (3).png''/>', '2015-06-15 07:01:13', -1, 'no'),
(215, 12397, 35, 0, NULL, 'Nicely done!!', '2015-06-15 07:01:54', 214, 'yes'),
(216, 12397, 35, 0, 'zip', 'zip<br><a style="background-color:#9eba9d" href=''uploads/back.to.the.future.(1985).eng.1cd.(3950623).zip''> Download Here:''back.to.the.future.(1985).eng.1cd.(3950623).zip''</a>', '2015-06-15 10:00:37', -1, 'no'),
(217, 12397, 35, 0, 'video', 'video<br><a style="background-color:#9eba9d" href=''uploads/vlc-record-2015-05-24-11h48m47s-â–¶ Everything Is AWESOME!!! -- The LEGOÂ® Movie -- Tegan and Sara feat. The Lonely Island - YouTube [360p].mp4-.mp4''> Download Here:''vlc-record-2015-05-24-11h48m47s-â–¶ Everything Is AWESOME!!! -- The LEGOÂ® Movie -- Tegan and Sara feat. The Lonely Island - YouTube [360p].mp4-.mp4''</a>', '2015-06-15 10:01:49', -1, 'no'),
(218, 12397, 35, 0, 'upload', 'upload<br><a style="background-color:#9eba9d" href=''uploads/upload.mp4''> Download Here:''upload.mp4''</a>', '2015-06-15 10:05:34', -1, 'no'),
(219, 12397, 35, 0, 'new img', 'new img<br><img height=400 width=400 src=''uploads/Screenshot (4).png''/>', '2015-06-15 10:08:36', -1, 'no'),
(220, 12397, 35, 0, 'Percentage', 'percentage<br><img height=50% width=50% src=''uploads/Screenshot (11).png''/>', '2015-06-15 10:11:17', -1, 'no'),
(221, 12412, 35, 0, '', ' <a href=# id=Gadget onclick= sessionsetfunc()>Gadget</a> <a href=# id=Laptop onclick= sessionsetfunc()>Laptop</a>', '2015-06-15 10:12:35', -1, 'no'),
(222, 12376, 35, 0, NULL, 'Inner  Ineer im in', '2015-06-18 04:46:26', 198, 'no'),
(223, 12376, 35, -1, 'Test New', 'new test', '2015-06-19 19:27:35', -1, 'no'),
(224, 12376, 35, 0, NULL, 'That is nice one!!', '2015-06-19 19:28:01', 223, 'yes'),
(225, 12397, 24, 0, NULL, 'Reply test!!', '2015-06-21 16:45:53', 175, 'yes'),
(226, 12394, 24, 0, NULL, 'One more Reply!!', '2015-06-21 17:11:29', 170, 'yes'),
(227, 12394, 35, 0, NULL, 'Ya one more!!', '2015-06-21 17:19:56', 170, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `node_info`
--

CREATE TABLE IF NOT EXISTS `node_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12413 ;

--
-- Dumping data for table `node_info`
--

INSERT INTO `node_info` (`id`, `title`, `timestamp`, `category`) VALUES
(12360, 'Gadget', '2015-04-14 15:36:24', 'technology'),
(12361, 'Technology', '2015-04-14 15:54:20', 'technology'),
(12369, 'Appliances', '2015-04-14 16:32:58', 'technology'),
(12370, 'Home Appliances', '2015-04-14 16:34:34', 'technology'),
(12371, 'Air conditioning', '2015-04-14 16:43:12', 'technology'),
(12372, 'Refrigerator', '2015-04-14 16:45:50', 'technology'),
(12373, 'Washing Machine', '2015-04-14 16:56:39', 'technology'),
(12374, 'microwave oven', '2015-04-14 17:01:10', 'technology'),
(12375, 'Small appliances', '2015-04-14 17:16:28', 'technology'),
(12376, 'Mobile', '2015-04-14 17:39:41', 'technology'),
(12377, 'Smartphone', '2015-04-14 17:47:42', 'technology'),
(12378, 'Android Phones', '2015-04-14 17:50:26', 'technology'),
(12379, 'Windows Phone', '2015-04-14 18:01:19', 'technology'),
(12381, 'iphone', '2015-04-14 18:10:06', 'technology'),
(12384, 'Laptop', '2015-04-14 18:38:12', 'technology'),
(12385, 'Traditional Laptop', '2015-04-14 18:40:17', 'technology'),
(12386, 'Subnotebook', '2015-04-14 18:42:01', 'technology'),
(12387, 'Netbook', '2015-04-14 18:43:01', 'technology'),
(12388, 'Convertible', '2015-04-14 18:44:07', 'technology'),
(12389, 'Television', '2015-04-15 16:06:46', 'technology'),
(12390, 'Tablets', '2015-04-15 16:13:39', 'technology'),
(12391, 'Cameras', '2015-04-15 16:20:41', 'technology'),
(12392, 'DSLR', '2015-04-15 16:40:28', 'technology'),
(12393, 'Mirrorless Camera', '2015-04-15 16:42:18', 'technology'),
(12394, 'Point-and-shoot camera', '2015-04-15 16:46:08', 'technology'),
(12395, 'Camcorder', '2015-04-15 16:49:46', 'technology'),
(12396, 'Screen', '2015-04-20 05:25:39', 'Technology'),
(12397, 'Screen1', '2015-04-20 05:28:27', 'Technology'),
(12398, 'Test Screen1', '2015-04-22 08:57:15', 'Technology'),
(12399, 'CDMA Phoned', '2015-04-22 09:58:14', 'Technology'),
(12401, 'GSM Phoned', '2015-05-15 18:23:45', 'Technology'),
(12402, 'Redundant Test', '2015-05-15 18:25:44', 'Technology'),
(12403, 'Redundant Test', '2015-05-15 18:26:05', 'Technology'),
(12404, 'Linking Test', '2015-06-14 02:40:16', 'Technology'),
(12405, 'Linking Test1', '2015-06-14 02:44:26', 'Technology'),
(12406, 'Linking Test2', '2015-06-15 04:48:15', 'Technology'),
(12407, 'Linking Test3', '2015-06-15 05:23:49', 'Technology'),
(12408, 'Linking Test4', '2015-06-15 05:26:19', 'Technology'),
(12409, 'Linking Test5', '2015-06-15 05:28:19', 'Technology'),
(12410, 'Linking Test6', '2015-06-15 05:42:21', 'Technology'),
(12411, 'Linking Test7', '2015-06-15 05:53:07', 'Technology'),
(12412, 'hutch hegde', '2015-06-15 10:12:35', 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_id` varchar(15) NOT NULL DEFAULT '0',
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `phone`, `email`, `user_id`, `password`) VALUES
(24, 'Aakash Ratkal', 2147483647, 'vinaypatilloyola@gmail.com', 'Pespedia007', '1'),
(25, 'abcd', 987456321, 'vinaynpatil@outlook.com', 'Pespedia008', '14523'),
(26, 'Vinayy', 456321, 'vinaynpatil@outlook.com', 'Pespedia009', '987456'),
(27, 'hreh', 852369741, 'v@gmail.com', 'Pespedia010', '96325'),
(28, 'asdf', 852369, 'v@gmail', 'Pespedia011', '12345'),
(29, 'naksd', 87451365, 'hh@gmail.com', 'Pespedia012', '1234'),
(30, 'hehe', 2147483647, 'vv@gmail.com', 'Pespedia013', '12345'),
(31, 'hekhkeh', 852369741, 'vvv@gmail.com', 'Pespedia014', '12345'),
(32, 'VinayNP', 959141501, 'vinaypatilloyola@gmail.com', 'Pespedia015', '12345'),
(33, 'VNP', 985637412, 'vnp@gmail.com', 'Pespedia016', 'vnpvnp'),
(34, 'Vinay', 874596321, 'acdse@yahoo.com', 'Pespedia017', 'vinay'),
(35, 'Vinay N Patil', 9591415016, 'vinaynp@yahoo.com', 'Pespedia018', 'vinaynp'),
(36, 'Achyut Hegde', 9586523145, 'ac@gmail.com', 'Pespedia019', 'achyut');

--
-- Triggers `signup`
--
DROP TRIGGER IF EXISTS `tg_table1_insert`;
DELIMITER //
CREATE TRIGGER `tg_table1_insert` BEFORE INSERT ON `signup`
 FOR EACH ROW BEGIN
  INSERT INTO table1_seq VALUES (NULL);
  SET NEW.user_id = CONCAT('Pespedia', LPAD(LAST_INSERT_ID(), 3, '0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table1_seq`
--

CREATE TABLE IF NOT EXISTS `table1_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `table1_seq`
--

INSERT INTO `table1_seq` (`id`) VALUES
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19);

-- --------------------------------------------------------

--
-- Table structure for table `vote_info`
--

CREATE TABLE IF NOT EXISTS `vote_info` (
  `user_id` varchar(15) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `down_up` varchar(5) NOT NULL,
  `notified` varchar(5) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`,`comment_id`),
  KEY `node_id` (`comment_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_info`
--

INSERT INTO `vote_info` (`user_id`, `comment_id`, `down_up`, `notified`) VALUES
('Pespedia007', 54, 'up', 'no'),
('Pespedia007', 153, 'up', 'no'),
('Pespedia015', 54, 'up', 'no'),
('Pespedia016', 42, 'up', 'yes'),
('Pespedia018', 40, 'up', 'no'),
('Pespedia018', 41, 'up', 'no'),
('Pespedia018', 42, 'down', 'no'),
('Pespedia018', 54, 'up', 'no'),
('Pespedia018', 56, 'up', 'no'),
('Pespedia018', 57, 'up', 'no'),
('Pespedia018', 58, 'up', 'no'),
('Pespedia018', 59, 'down', 'no'),
('Pespedia018', 61, 'up', 'no'),
('Pespedia018', 62, 'up', 'no'),
('Pespedia018', 63, 'down', 'no'),
('Pespedia018', 70, 'up', 'no'),
('Pespedia018', 71, 'down', 'no'),
('Pespedia018', 72, 'up', 'no'),
('Pespedia018', 81, 'up', 'no'),
('Pespedia018', 82, 'up', 'no'),
('Pespedia018', 83, 'up', 'no'),
('Pespedia018', 84, 'down', 'no'),
('Pespedia018', 86, 'up', 'no'),
('Pespedia018', 87, 'up', 'no'),
('Pespedia018', 88, 'up', 'no'),
('Pespedia018', 89, 'down', 'no'),
('Pespedia018', 90, 'up', 'no'),
('Pespedia018', 92, 'up', 'no'),
('Pespedia018', 98, 'up', 'no'),
('Pespedia018', 119, 'up', 'no'),
('Pespedia018', 120, 'down', 'no'),
('Pespedia018', 121, 'down', 'no'),
('Pespedia018', 123, 'up', 'no'),
('Pespedia018', 125, 'up', 'no'),
('Pespedia018', 129, 'down', 'no'),
('Pespedia018', 131, 'up', 'no'),
('Pespedia018', 132, 'down', 'no'),
('Pespedia018', 134, 'down', 'no'),
('Pespedia018', 135, 'up', 'no'),
('Pespedia018', 146, 'up', 'no'),
('Pespedia018', 147, 'up', 'no'),
('Pespedia018', 149, 'down', 'no'),
('Pespedia018', 150, 'up', 'no'),
('Pespedia018', 151, 'up', 'no'),
('Pespedia018', 153, 'up', 'no'),
('Pespedia018', 154, 'up', 'no'),
('Pespedia018', 168, 'up', 'no'),
('Pespedia018', 173, 'down', 'yes'),
('Pespedia018', 174, 'up', 'no'),
('Pespedia018', 175, 'up', 'yes'),
('Pespedia018', 176, 'down', 'yes'),
('Pespedia018', 179, 'up', 'yes'),
('Pespedia018', 180, 'up', 'yes'),
('Pespedia018', 182, 'down', 'yes'),
('Pespedia018', 184, 'down', 'no'),
('Pespedia018', 186, 'up', 'no'),
('Pespedia018', 187, 'up', 'no'),
('Pespedia018', 191, 'up', 'yes'),
('Pespedia018', 200, 'up', 'yes'),
('Pespedia018', 201, 'down', 'yes'),
('Pespedia018', 213, 'down', 'yes'),
('Pespedia018', 214, 'up', 'yes'),
('Pespedia018', 223, 'down', 'yes');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`nodeOne`) REFERENCES `node_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_ibfk_2` FOREIGN KEY (`nodeTwo`) REFERENCES `node_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `node_data`
--
ALTER TABLE `node_data`
  ADD CONSTRAINT `node_data_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `signup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `node_data_ibfk_2` FOREIGN KEY (`node_id`) REFERENCES `node_info` (`id`),
  ADD CONSTRAINT `node_data_ibfk_3` FOREIGN KEY (`node_id`) REFERENCES `node_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote_info`
--
ALTER TABLE `vote_info`
  ADD CONSTRAINT `vote_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_info_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `node_data` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
