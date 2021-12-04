-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2021 at 04:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_club_fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_username` varchar(20) NOT NULL,
  `consultant_username` varchar(50) NOT NULL,
  `appointment_date` varchar(10) NOT NULL,
  `appointment_time` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `client_username`, `consultant_username`, `appointment_date`, `appointment_time`, `status`, `date_created`, `deletion_indicator`) VALUES
(25, 'ruwani.wijesiri', 'sumith', '2021-09-22', '5.00pm - 6.00pm', 'finished', '2021-09-19 09:47:33', NULL),
(24, 'chamidu.udana', 'lahiru', '2021-09-17', '1.00pm - 2.00pm', 'finished', '2021-09-03 16:53:09', NULL),
(23, 'kasun.ghimhan', 'mahanama', '2021-09-06', '10.00am - 11.00am', 'finished', '2021-09-03 16:43:06', NULL),
(20, 'amila.ereshika', 'lahiru', '2021-07-21', '1.00pm - 2.00pm', 'finished', '2021-07-18 18:16:53', NULL),
(22, 'chamidu.udana', 'lahiru', '2021-08-19', '2.00pm - 3.00pm', 'finished', '2021-07-18 20:55:23', NULL),
(29, 'hasitha.lakmal', 'lahiru', '2021-10-20', '12.00pm - 1.00pm', 'accepted', '2021-09-24 16:24:20', NULL),
(26, 'yasiru.kusal', 'sumith', '2021-09-23', '1.00pm - 2.00pm', 'pending', '2021-09-19 14:33:49', NULL),
(27, 'yasiru.kusal', 'sumith', '2021-09-23', '2.00pm - 3.00pm', 'pending', '2021-09-19 19:03:26', NULL),
(28, 'gayan.kavinda', 'lahiru', '2021-09-25', '2.00pm - 3.00pm', 'finished', '2021-09-23 14:57:57', NULL),
(30, 'hasitha.lakmal', 'lahiru', '2021-09-20', '1.00pm - 2.00pm', 'finished', '2021-09-24 16:26:54', NULL),
(31, 'chamidu.udana', 'mihiranga', '2021-11-17', '6.00pm - 7.00pm', 'pending', '2021-09-24 19:29:11', NULL),
(32, 'chathura.alvis', 'mihiranga', '2021-10-28', '1.00pm - 2.00pm', 'accepted', '2021-09-25 08:14:54', NULL),
(33, 'avishka.sandamal', 'lahiru', '2021-10-22', '2.00pm - 3.00pm', 'accepted', '2021-09-25 10:25:36', NULL),
(34, 'chathura.alvis', 'lahiru', '2021-09-14', '6.00pm - 7.00pm', 'pending', '2021-09-25 11:23:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `post_type`, `image`, `date_upload`) VALUES
(76, 'muscle building', 'Article', 'image/muscle_building.jpg', '2021-06-06 15:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nic` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `weight` varchar(3) NOT NULL,
  `height` varchar(3) NOT NULL,
  `injuries` varchar(200) NOT NULL,
  `non_spread_diseases` varchar(200) NOT NULL,
  `attendance` varchar(1) NOT NULL,
  `food_consumption` varchar(200) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`nic`, `name`, `gender`, `dob`, `email`, `address`, `mobile_no`, `weight`, `height`, `injuries`, `non_spread_diseases`, `attendance`, `food_consumption`, `client_username`, `password`, `date_joined`, `deletion_indicator`) VALUES
('930254788v', 'Yasiru kusal', 'male', '1993-10-20', 'yasiru987@gmail.com', '9, Pahalagoda, Yakkala', '0718956214', '98', '185', 'Neck pain', 'cholesterol', '5', 'rice and curry, 3 eggs, 200g vegetables', 'yasiru.kusal', '456123', '2021-06-06 09:39:16', NULL),
('891456789v', 'Jayalath kasun', 'male', '1989-05-10', 'jayalathkasun@ymail.com', '78,Nittambuwa', '0717845123', '94', '189', 'Knee pain', 'cholesterol', '7', 'Meats, Fish bun, carrot', 'jayalath.kasun', 'Jayalath1995', '2021-06-12 06:09:18', NULL),
('789452123v', 'Chamidu udana', 'male', '1978-11-07', 'chamiduudana@ymail.com', '67, Udugampola', '0717845129', '100', '180', 'Broken leg from car accident', 'diabetes', '6', 'Avocados, Cheese, Eggs, Fatty Fish', 'chamidu.udana', '789456147', '2021-06-12 07:35:31', NULL),
('963258452v', 'Pasindu Eranga', 'male', '1996-07-13', 'pasindueranga@gmail.com', '19, Orugodawatta.', '0717845256', '60', '160', 'NO', 'No', '4', 'Rice and curry', 'pasindueranga', '12547852', '2021-06-15 10:43:30', 'x'),
('901456789v', 'Pathum dilanjaya', 'male', '1990-02-05', 'pathumdilanjaya@hotmail.com', '87, Gampaha', '0774512869', '89', '161', 'Back pain', 'No', '7', 'Rice and curry', 'pathum.dilanjaya', '7852369', '2021-06-20 14:42:12', NULL),
('900852741v', 'Chathushi geethadewa', 'female', '1990-03-08', 'chathushigeethadewa@hotmail.com', '784, Colombo 2.', '0784512369', '44', '149', 'Broken middle in hand', 'No', '3', 'Rice and curry, Vegetables, fruits', 'chathushi.geethadewa', '7788994455', '2021-06-22 15:30:51', NULL),
('960123456v', 'Chamal savinda', 'male', '1993-06-05', 'chamalsavinda@gmail.com', '85 Rathmalana', '0774512785', '92', '184', 'Quadriceps Muscle Contusion', 'Cardiovascular diseases', '6', 'Rice and curry', 'chamalsavinda', '7894561258', '2021-07-01 15:43:16', NULL),
('912567891v', 'Amila Ereshika', 'male', '1993-06-02', 'amilaereshika@hotmail.com', '91, Pitigama', '0778945125', '86', '162', 'Knee pain', 'No', '5', 'Normal diet', 'amila.ereshika', 'Amila7845', '2021-07-05 06:23:10', NULL),
('963258147v', 'Ruwani Wijesiri', 'female', '1993-06-18', 'ruwaniwijesiri@gmail.com', '43,Chandanagama', '0711611008', '42', '167', 'No injuries', 'No', '3', 'Pork allergic ', 'Ruwani.wijesiri', 'Ruwani1993', '2021-09-19 09:45:33', 'x'),
('960120410v', 'Yasas Adhikari', 'male', '1998-08-06', 'yasasadhikari@ymail.com', '688, Gampaha', '0774578952', '71', '161', 'No', '\r\nNo', '4', 'Rice curry', 'yasas.adhikari', 'Yasas1995', '2021-09-19 14:08:50', NULL),
('874526123v', 'Nisha Athukorala', 'female', '1987-09-09', 'nishaathukorala65@gmail.com', '54, Kasagahawatta', '0714578111', '60', '159', 'Knee pain', 'cholesterol ', '4', 'Vegetables only', 'nisha.athukorala', 'Nisha1987', '2021-09-23 09:36:32', NULL),
('955789423v', 'Amali Mandhakini', 'female', '1995-09-06', 'amalimandhakini@gmail.com', '45, Gampola', '0117845236', '53', '162', '', '', '4', '', 'amali.mandhakini', 'Amali1995', '2021-09-23 13:44:36', NULL),
('889456123v', 'Gayan Kavinda', 'male', '1982-08-11', 'gayan78@gmail.com', '56, Gampaha', '0717845951', '69', '159', '', '', '6', '', 'gayan.kavinda', 'Gayan1998', '2021-09-23 14:47:15', NULL),
('778159753v', 'Hasitha Lakmal', 'male', '1977-09-06', 'hasitha@yahoo.com', '43/2, Gampola', '0117845258', '60', '161', 'right leg knee pain ', 'Blood Pressure', '3', 'Junk foods', 'hasitha.lakmal', 'Hasitha.1978', '2021-09-24 16:12:22', NULL),
('753869412v', 'Chathura alvis', 'male', '1983-08-23', 'alvis@gmail.com', '45, Colombo 12', '0771245785', '49', '163', 'Stress fracture', 'heart diseases', '4', 'breads, oats, beans', 'chathura.alvis', 'Chathura.alvis1', '2021-09-25 08:07:18', NULL),
('784951623v', 'Avishka sandamal', 'male', '1978-08-08', 'avishka@gmail.com', '55, Kaluthara', '0771234569', '64', '155', 'Knee pain', 'autoimmune diseases', '5', 'potatoes/yams, brown rice', 'avishka.sandamal', 'Avishka1999', '2021-09-25 10:16:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

DROP TABLE IF EXISTS `consultant`;
CREATE TABLE IF NOT EXISTS `consultant` (
  `nic` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `qualification` varchar(300) NOT NULL,
  `experience` varchar(300) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`nic`, `name`, `username`, `email`, `address`, `mobile_no`, `dob`, `qualification`, `experience`, `password`, `date_joined`, `deletion_indicator`) VALUES
('952654833v', 'Lahiru Serasinghe', 'lahiru', 'lahiruserasinghe@gmail.com', '15/3, Pahalagama2', '0714578367', '1995-06-06', 'NVQ level 6 in sport science.', 'cricket coach in chandrajothi college.(1 year), fitness consultant in global gym yakkala. (2 years)', 'Lahiru1992', '2021-06-06 08:33:36', NULL),
('962654833v', 'Kavindu Rasanjaya', 'kavindu', 'kavindurasanjaya@gmail.com', '452/5, Gampaha', '0771245886', '1996-09-08', 'Diploma in Instructing Exercise and Fitness.(Kelaniya University)', 'Thai boxing player(up to now), Thai fiting instructor in Thai fighter association. (6 years)', '7852hf', '2021-06-06 09:04:44', NULL),
('938654833v', 'Mihiranga Ruwanmal', 'mihiranga', 'mihirangaruwanmal@gmail.com', '254, Kirindiwela', '0754578125', '1993-08-09', 'Diploma in Fitness Instructing and Personal Training (University of Rajarata)', 'personal trainer at planet fitness(6 years)', '78963', '2021-06-06 14:36:45', NULL),
('912654833v', 'Gihan Kalpa Pathirathna', 'gihan', 'gihankalpapathirathna@gmail.com', '22, Colombo', '0114578453', '1991-08-04', 'Diploma in Health, Fitness, and Exercise Instruction (University of colombo)', 'Instructor at KS fitness. (4 years)', 'Gihan1992', '2021-06-06 14:37:58', NULL),
('932654789v', 'Sumith Dilshan', 'sumith', 'sumithdilshan@gmail.com', '8/3, Minuwangoda.', '0774512852', '1993-07-08', 'NVQ level 6 in sport science and personal training, Certificate course in personal training.', 'Athletic instructor at gym world fitness. (8 years)', '456321', '2021-06-06 14:39:07', 'x'),
('930125455v', 'Sameera mahanama', 'mahanama', 'sameeramahanama@gmail.com', '76D, Gampaha', '0717856236', '1993-11-05', 'Degree in Fitness Instructing and Personal Training (University of Japura)', 'Instructor at KS fitness (8 years). Cricketer at D2 club. (2 years)', 'Sameera3333', '2021-07-05 15:18:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan`
--

DROP TABLE IF EXISTS `diet_plan`;
CREATE TABLE IF NOT EXISTS `diet_plan` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_nic` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `food1` varchar(50) NOT NULL,
  `quantity1` varchar(20) NOT NULL,
  `food2` varchar(50) NOT NULL,
  `quantity2` varchar(20) NOT NULL,
  `food3` varchar(50) NOT NULL,
  `quantity3` varchar(20) NOT NULL,
  `food4` varchar(50) NOT NULL,
  `quantity4` varchar(20) NOT NULL,
  `food5` varchar(50) NOT NULL,
  `quantity5` varchar(20) NOT NULL,
  `food6` varchar(50) NOT NULL,
  `quantity6` varchar(20) NOT NULL,
  `food7` varchar(50) NOT NULL,
  `quantity7` varchar(20) NOT NULL,
  `food8` varchar(50) NOT NULL,
  `quantity8` varchar(20) NOT NULL,
  `instruction` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan`
--

INSERT INTO `diet_plan` (`id`, `client_nic`, `duration`, `food1`, `quantity1`, `food2`, `quantity2`, `food3`, `quantity3`, `food4`, `quantity4`, `food5`, `quantity5`, `food6`, `quantity6`, `food7`, `quantity7`, `food8`, `quantity8`, `instruction`, `date_created`, `deletion_indicator`) VALUES
(1, '789452123v', 'Two month plan', 'Lean Beef', '100 grams', 'Chicken Breast', '100 grams', 'Sweet Potato', '100 grams', 'Oatmeal', '100 grams', 'Avocado', 'One', 'Peanuts', '100 grams', 'Salmon', '50 grams', 'Protein Supplement', '50 grams', 'Choose and prepare foods with less salt and added sugars. Use the nutrition information on food labels to help you make healthy choices.', '2021-06-12 20:03:35', NULL),
(2, '891456789v', 'Two month plan', 'Protein Supplement', '50 grams', 'Salmon', '50 grams', 'Peanuts', '100 grams', 'Avocado', 'One', 'Oatmeal', '50 grams', 'Sweet Potato', '20 grams', 'Chicken Breast', '50 grams', 'Lean Beef', '100 grams', 'A commonly recommended dosage is 1,2 scoops (around 25,50 grams) per day, usually after workouts.', '2021-06-13 13:03:21', NULL),
(4, '963258147v', 'Two month plan', 'Avocado', 'One', 'Oatmeal', 'One', 'Sweet Potato', '20 grams', '', '', '', '', '', '', '', '', '', '', '', '2021-09-19 09:54:04', NULL),
(5, '889456123v', 'Two month plan', 'Peanuts', '10 grams', 'Avocado', '50 grams', 'Chicken Breast', '100 grams', 'Protein Supplement', '10 grams', 'Sweet Potato', '20 grams', 'Oatmeal', 'One', 'Lean Beef', '100 grams', '', '', '', '2021-09-23 14:57:09', NULL),
(6, '778159753v', 'Two month plan', 'Lean Beef', '10 grams', 'Chicken Breast', '50 grams', 'Sweet Potato', '100 grams', 'Peanuts', '20 grams', '', '', '', '', '', '', '', '', '', '2021-09-24 16:22:22', NULL),
(7, '753869412v', 'Two month plan', 'Chicken Breast', '20 grams', 'Sweet Potato', '50 grams', 'Peanuts', '100 grams', 'Oatmeal', '20 grams', '', '', '', '', '', '', '', '', 'Consume at least half your bodyweight in water. Avoid sugary drinks and diet sodas.\r\n', '2021-09-25 08:13:14', NULL),
(8, '784951623v', 'Two month plan', 'Chicken Breast', '20 grams', 'Oatmeal', '50 grams', 'Salmon', '20 grams', '', '', '', '', '', '', '', '', '', '', 'Keep your carbohydrate intake around 150 to 250 grams daily.', '2021-09-25 10:24:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(10) NOT NULL,
  `erercise_name` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `erercise_name`) VALUES
(1, 'Bench press'),
(2, 'Cross over'),
(3, 'Barbell curl'),
(4, 'Hammer curl');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_program`
--

DROP TABLE IF EXISTS `exercise_program`;
CREATE TABLE IF NOT EXISTS `exercise_program` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_nic` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `exercise1` varchar(50) NOT NULL,
  `rep1` varchar(20) NOT NULL,
  `exercise2` varchar(50) NOT NULL,
  `rep2` varchar(20) NOT NULL,
  `exercise3` varchar(50) NOT NULL,
  `rep3` varchar(20) NOT NULL,
  `exercise4` varchar(50) NOT NULL,
  `rep4` varchar(20) NOT NULL,
  `exercise5` varchar(50) NOT NULL,
  `rep5` varchar(20) NOT NULL,
  `exercise6` varchar(50) NOT NULL,
  `rep6` varchar(20) NOT NULL,
  `exercise7` varchar(50) NOT NULL,
  `rep7` varchar(20) NOT NULL,
  `exercise8` varchar(50) NOT NULL,
  `rep8` varchar(20) NOT NULL,
  `instruction` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_program`
--

INSERT INTO `exercise_program` (`id`, `client_nic`, `duration`, `exercise1`, `rep1`, `exercise2`, `rep2`, `exercise3`, `rep3`, `exercise4`, `rep4`, `exercise5`, `rep5`, `exercise6`, `rep6`, `exercise7`, `rep7`, `exercise8`, `rep8`, `instruction`, `date_created`, `deletion_indicator`) VALUES
(1, '789452123v', 'One month program', 'Bench press', '12*2', 'Cross over', '12*3', 'Barbell curl', '10*3', 'Hammer curl', '10*3', 'Machine rowing', '10*2', 'One arm rowing', '12*2', 'Cable press down', '10*3', 'Dumbbell extension', '10*2', 'Start standing with a dumbbell in each hand.', '2021-06-12 17:36:09', NULL),
(2, '891456789v', 'Two month program', 'Barbell curl', '12*3', 'Hammer curl', '12*2', 'Machine rowing', '8*2', 'One arm rowing', '10*2', 'Cable press down', '12*2', 'Dumbbell extension', '10*3', 'Bench press', '10*2', 'Cross over', '12*2', 'Stand up straight with a dumbbell in each hand, holding them alongside you.', '2021-06-13 13:00:55', NULL),
(5, '891456789v', 'Two month program', 'Bench press', '10*2', 'Hammer curl', '10*2', 'Barbell curl', '10*3', 'Hammer curl', '10*2', 'Cable press down', '10*2', 'Dumbbell extension', '10*3', 'Barbell curl', '8*3', 'Cable press down', '12*3', 'rgrgbdrhthb', '2021-09-07 14:36:58', NULL),
(6, '963258147v', 'One month program', 'Bench press', '8*2', 'Cross over', '8*3', 'Hammer curl', '10*3', '', '', '', '', '', '', '', '', '', '', 'Start with low reps.', '2021-09-19 09:51:48', NULL),
(7, '960120410v', 'One month program', 'Cross over', '12*3', 'Hammer curl', '8*3', 'One arm rowing', '10*3', 'Cable press down', '8*3', 'Cross over', '12*3', 'Dumbbell extension', '10*3', 'Cross over', '12*2', 'Cable press down', '12*2', 'Cross over - Start from 21kg', '2021-09-19 14:25:05', NULL),
(8, '889456123v', 'One month program', 'Cross over', '12*3', 'Barbell curl', '12*2', 'One arm rowing', '10*2', 'Hammer curl', '8*3', 'Machine rowing', '10*2', 'One arm rowing', '8*3', 'Dumbbell extension', '10*3', 'Cable press down', '12*3', '', '2021-09-23 14:53:18', NULL),
(9, '901456789v', 'Two month program', 'Dumbbell extension', '12*2', 'Cable press down', '12*3', 'Bench press', '12*2', 'Barbell curl', '10*3', 'Cable press down', '10*2', 'Machine rowing', '8*3', 'One arm rowing', '10*3', '', '', 'Hammer Curl tip - Stand with your feet shoulder-width apart and a slight bend in your knees.', '2021-09-24 06:36:56', NULL),
(10, '778159753v', 'Two month program', 'Bench press', '12*3', 'Cross over', '10*2', 'Hammer curl', '10*2', 'Barbell curl', '12*2', 'Machine rowing', '12*3', 'Dumbbell extension', '8*2', 'Cross over', '10*2', 'One arm rowing', '8*3', 'Exercise Instructions\r\nBarbell Curl tip - Stand tall with your chest up and core braced, holding the barbell with your hands just outside of your hips, using an underhand grip. Lift 68kg in first rep', '2021-09-24 16:19:58', NULL),
(11, '753869412v', 'Two month program', 'Barbell curl', '12*3', 'Cross over', '12*2', 'Bench press', '12*3', 'Cross over', '8*3', '', '', '', '', '', '', '', '', 'Barbell Curl tip - Stand tall with your chest up and core braced, holding the barbell with your hands just outside of your hips, using an underhand grip.', '2021-09-25 08:11:36', NULL),
(12, '784951623v', 'One month program', 'Bench press', '12*3', 'Cross over', '12*2', 'Barbell curl', '10*3', 'Hammer curl', '10*2', 'Machine rowing', '10*3', 'One arm rowing', '10*2', 'Cable press down', '10*2', 'Dumbbell extension', '8*2', 'Stand tall with your chest up and core braced, holding the barbell with your hands just outside of your hips', '2021-09-25 10:23:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nic` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `deletion_indicator` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nic`, `username`, `password`, `role`, `deletion_indicator`) VALUES
(1, '930254788v', 'yasiru.kusal', '456123', 'client', NULL),
(2, '952654833v', 'lahiru', 'Lahiru1992', 'consultant', NULL),
(3, '920123456v', 'hasala.widanage', 'Hasala1992', 'admin', NULL),
(4, '789452123v', 'chamidu.udana', '789456147', 'client', NULL),
(10, '912567891v', 'amila.ereshika', 'Amila7845', 'client', NULL),
(11, '930125455v', 'mahanama', 'Sameera3333', 'consultant', NULL),
(27, '891456789v', 'jayalath.kasun', 'Jayalath1995', 'client', NULL),
(14, '963258452v', 'pasindueranga', '12547852', 'client', 'x'),
(15, '901456789v', 'pathum.dilanjaya', '7852369', 'client', NULL),
(16, '900852741v', 'chathushi.geethadewa', '7788994455', 'client', NULL),
(17, '960123456v', 'chamalsavinda', '7894561258', 'client', NULL),
(18, '962654833v', 'kavindu', '7852hf', 'consultant', NULL),
(19, '938654833v', 'mihiranga', '78963', 'consultant', NULL),
(20, '912654833v', 'gihan', 'Gihan1992', 'consultant', NULL),
(21, '932654789v', 'sumith', '456321', 'consultant', 'x'),
(22, '963258147v', 'ruwani.wijesiri', 'Ruwani1993', 'client', 'x'),
(23, '960120410v', 'yasas.adhikari', 'Yasas1995', 'client', NULL),
(24, '874526123v', 'nisha.athukorala', 'Nisha1987', 'client', NULL),
(25, '955789423v', 'amali.mandhakini', 'Amali1995', 'client', NULL),
(26, '889456123v', 'gayan.kavinda', 'Gayan1998', 'client', NULL),
(28, '778159753v', 'hasitha.lakmal', 'Hasitha.1978', 'client', NULL),
(29, '753869412v', 'chathura.alvis', 'Chathura.alvis1', 'client', NULL),
(30, '784951623v', 'avishka.sandamal', 'Avishka1999', 'client', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_fee`
--

DROP TABLE IF EXISTS `membership_fee`;
CREATE TABLE IF NOT EXISTS `membership_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_nic` varchar(15) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `date_payment` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_fee`
--

INSERT INTO `membership_fee` (`id`, `client_nic`, `client_name`, `payment_status`, `date_payment`) VALUES
(3, '891456789v', 'Jayalath kasun', 'Paid', '2021-09-19 13:06:45'),
(4, '789452123v', 'Chamidu udana', 'Paid', '2021-09-19 13:06:59'),
(5, '963258452v', 'Pasindu Eranga', 'Paid', '2021-09-19 13:07:19'),
(6, '901456789v', 'Pathum dilanjaya', 'Paid', '2021-09-19 13:07:33'),
(7, '900852741v', 'Chathushi geethadewa', 'Paid', '2021-09-19 13:07:58'),
(8, '960123456v', 'Chamal savinda', 'Free', '2021-09-19 13:08:12'),
(9, '912567891v', 'Amila Ereshika', 'Free', '2021-09-19 13:08:29'),
(10, '963258147v', 'Ruwani Wijesiri', 'Paid', '2021-09-19 13:08:42'),
(19, '874526123v', 'Nisha athukorala', 'Paid', '2021-09-23 09:29:39'),
(20, '889456123v', 'Gayan Kavinda', 'Paid', '2021-09-23 14:43:47'),
(23, '753869412v', 'Chathura alvis', 'Paid', '2021-09-25 08:02:58'),
(22, '778159753v', 'Hasitha Lakmal', 'Paid', '2021-09-24 16:06:53'),
(24, '784951623v', 'Avishka sandamal', 'Free', '2021-09-25 10:13:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
