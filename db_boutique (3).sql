-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 08:12 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcartdetails`
--

CREATE TABLE `tblcartdetails` (
  `id` int(11) NOT NULL,
  `CMid` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcartmanagement`
--

CREATE TABLE `tblcartmanagement` (
  `id` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `name`, `status`) VALUES
(18, 'Saree', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`id`, `name`, `stateid`) VALUES
(1, 'Alipur', 1),
(2, 'Andaman Island', 1),
(3, 'Anderson Island', 1),
(4, 'Arainj-Laka-Punga', 1),
(5, 'Austinabad', 1),
(6, 'Bamboo Flat', 1),
(7, 'Barren Island', 1),
(8, 'Beadonabad', 1),
(9, 'Betapur', 1),
(10, 'Bindraban', 1),
(11, 'Bonington', 1),
(12, 'Brookesabad', 1),
(13, 'Cadell Point', 1),
(14, 'Calicut', 1),
(15, 'Chetamale', 1),
(16, 'Cinque Islands', 1),
(17, 'Defence Island', 1),
(18, 'Digilpur', 1),
(19, 'Dolyganj', 1),
(20, 'Flat Island', 1),
(21, 'Geinyale', 1),
(22, 'Great Coco Island', 1),
(23, 'Haddo', 1),
(24, 'Havelock Island', 1),
(25, 'Henry Lawrence Island', 1),
(26, 'Herbertabad', 1),
(27, 'Hobdaypur', 1),
(28, 'Ilichar', 1),
(29, 'Ingoie', 1),
(30, 'Inteview Island', 1),
(31, 'Jangli Ghat', 1),
(32, 'Jhon Lawrence Island', 1),
(33, 'Karen', 1),
(34, 'Kartara', 1),
(35, 'KYD Islannd', 1),
(36, 'Landfall Island', 1),
(37, 'Little Andmand', 1),
(38, 'Little Coco Island', 1),
(39, 'Long Island', 1),
(40, 'Maimyo', 1),
(41, 'Malappuram', 1),
(42, 'Manglutan', 1),
(43, 'Manpur', 1),
(44, 'Mitha Khari', 1),
(45, 'Neill Island', 1),
(46, 'Nicobar Island', 1),
(47, 'North Brother Island', 1),
(48, 'North Passage Island', 1),
(49, 'North Sentinel Island', 1),
(50, 'Nothen Reef Island', 1),
(51, 'Outram Island', 1),
(52, 'Pahlagaon', 1),
(53, 'Palalankwe', 1),
(54, 'Passage Island', 1),
(55, 'Phaiapong', 1),
(56, 'Phoenix Island', 1),
(57, 'Port Blair', 1),
(58, 'Preparis Island', 1),
(59, 'Protheroepur', 1),
(60, 'Rangachang', 1),
(61, 'Rongat', 1),
(62, 'Rutland Island', 1),
(63, 'Sabari', 1),
(64, 'Saddle Peak', 1),
(65, 'Shadipur', 1),
(66, 'Smith Island', 1),
(67, 'Sound Island', 1),
(68, 'South Sentinel Island', 1),
(69, 'Spike Island', 1),
(70, 'Tarmugli Island', 1),
(71, 'Taylerabad', 1),
(72, 'Titaije', 1),
(73, 'Toibalawe', 1),
(74, 'Tusonabad', 1),
(75, 'West Island', 1),
(76, 'Wimberleyganj', 1),
(77, 'Yadita', 1),
(78, 'Adilabad', 2),
(79, 'Anantapur', 2),
(80, 'Chittoor', 2),
(81, 'Cuddapah', 2),
(82, 'East Godavari', 2),
(83, 'Guntur', 2),
(84, 'Hyderabad', 2),
(85, 'Karimnagar', 2),
(86, 'Khammam', 2),
(87, 'Krishna', 2),
(88, 'Kurnool', 2),
(89, 'Mahabubnagar', 2),
(90, 'Medak', 2),
(91, 'Nalgonda', 2),
(92, 'Nellore', 2),
(93, 'Nizamabad', 2),
(94, 'Prakasam', 2),
(95, 'Rangareddy', 2),
(96, 'Srikakulam', 2),
(97, 'Visakhapatnam', 2),
(98, 'Vizianagaram', 2),
(99, 'Warangal', 2),
(100, 'West Godavari', 2),
(101, 'Anjaw', 3),
(102, 'Changlang', 3),
(103, 'Dibang Valley', 3),
(104, 'East Kameng', 3),
(105, 'East Siang', 3),
(106, 'Itanagar', 3),
(107, 'Kurung Kumey', 3),
(108, 'Lohit', 3),
(109, 'Lower Dibang Valley', 3),
(110, 'Lower Subansiri', 3),
(111, 'Papum Pare', 3),
(112, 'Tawang', 3),
(113, 'Tirap', 3),
(114, 'Upper Siang', 3),
(115, 'Upper Subansiri', 3),
(116, 'West Kameng', 3),
(117, 'West Siang', 3),
(118, 'Barpeta', 4),
(119, 'Bongaigaon', 4),
(120, 'Cachar', 4),
(121, 'Darrang', 4),
(122, 'Dhemaji', 4),
(123, 'Dhubri', 4),
(124, 'Dibrugarh', 4),
(125, 'Goalpara', 4),
(126, 'Golaghat', 4),
(127, 'Guwahati', 4),
(128, 'Hailakandi', 4),
(129, 'Jorhat', 4),
(130, 'Kamrup', 4),
(131, 'Karbi Anglong', 4),
(132, 'Karimganj', 4),
(133, 'Kokrajhar', 4),
(134, 'Lakhimpur', 4),
(135, 'Marigaon', 4),
(136, 'Nagaon', 4),
(137, 'Nalbari', 4),
(138, 'North Cachar Hills', 4),
(139, 'Silchar', 4),
(140, 'Sivasagar', 4),
(141, 'Sonitpur', 4),
(142, 'Tinsukia', 4),
(143, 'Udalguri', 4),
(144, 'Araria', 5),
(145, 'Aurangabad', 5),
(146, 'Banka', 5),
(147, 'Begusarai', 5),
(148, 'Bhagalpur', 5),
(149, 'Bhojpur', 5),
(150, 'Buxar', 5),
(151, 'Darbhanga', 5),
(152, 'East Champaran', 5),
(153, 'Gaya', 5),
(154, 'Gopalganj', 5),
(155, 'Jamshedpur', 5),
(156, 'Jamui', 5),
(157, 'Jehanabad', 5),
(158, 'Kaimur (Bhabua)', 5),
(159, 'Katihar', 5),
(160, 'Khagaria', 5),
(161, 'Kishanganj', 5),
(162, 'Lakhisarai', 5),
(163, 'Madhepura', 5),
(164, 'Madhubani', 5),
(165, 'Munger', 5),
(166, 'Muzaffarpur', 5),
(167, 'Nalanda', 5),
(168, 'Nawada', 5),
(169, 'Patna', 5),
(170, 'Purnia', 5),
(171, 'Rohtas', 5),
(172, 'Saharsa', 5),
(173, 'Samastipur', 5),
(174, 'Saran', 5),
(175, 'Sheikhpura', 5),
(176, 'Sheohar', 5),
(177, 'Sitamarhi', 5),
(178, 'Siwan', 5),
(179, 'Supaul', 5),
(180, 'Vaishali', 5),
(181, 'West Champaran', 5),
(182, 'Chandigarh', 6),
(183, 'Mani Marja', 6),
(184, 'Bastar', 7),
(185, 'Bhilai', 7),
(186, 'Bijapur', 7),
(187, 'Bilaspur', 7),
(188, 'Dhamtari', 7),
(189, 'Durg', 7),
(190, 'Janjgir-Champa', 7),
(191, 'Jashpur', 7),
(192, 'Kabirdham-Kawardha', 7),
(193, 'Korba', 7),
(194, 'Korea', 7),
(195, 'Mahasamund', 7),
(196, 'Narayanpur', 7),
(197, 'Norh Bastar-Kanker', 7),
(198, 'Raigarh', 7),
(199, 'Raipur', 7),
(200, 'Rajnandgaon', 7),
(201, 'South Bastar-Dantewada', 7),
(202, 'Surguja', 7),
(203, 'Brancavare', 8),
(204, 'Dagasi', 8),
(205, 'Daman', 8),
(206, 'Diu', 8),
(207, 'Magarvara', 8),
(208, 'Nagwa', 8),
(209, 'Pariali', 8),
(210, 'Passo Covo', 8),
(211, 'Central Delhi', 9),
(212, 'East Delhi', 9),
(213, 'New Delhi', 9),
(214, 'North Delhi', 9),
(215, 'North East Delhi', 9),
(216, 'North West Delhi', 9),
(217, 'Old Delhi', 9),
(218, 'South Delhi', 9),
(219, 'South West Delhi', 9),
(220, 'West Delhi', 9),
(221, 'Amal', 10),
(222, 'Amli', 10),
(223, 'Bedpa', 10),
(224, 'Chikhli', 10),
(225, 'Dadra & Nagar Haveli', 10),
(226, 'Dahikhed', 10),
(227, 'Dolara', 10),
(228, 'Galonda', 10),
(229, 'Kanadi', 10),
(230, 'Karchond', 10),
(231, 'Khadoli', 10),
(232, 'Kharadpada', 10),
(233, 'Kherabari', 10),
(234, 'Kherdi', 10),
(235, 'Kothar', 10),
(236, 'Luari', 10),
(237, 'Mashat', 10),
(238, 'Rakholi', 10),
(239, 'Rudana', 10),
(240, 'Saili', 10),
(241, 'Sili', 10),
(242, 'Silvassa', 10),
(243, 'Sindavni', 10),
(244, 'Udva', 10),
(245, 'Umbarkoi', 10),
(246, 'Vansda', 10),
(247, 'Vasona', 10),
(248, 'Velugam', 10),
(249, 'Canacona', 11),
(250, 'Candolim', 11),
(251, 'Chinchinim', 11),
(252, 'Cortalim', 11),
(253, 'Goa', 11),
(254, 'Jua', 11),
(255, 'Madgaon', 11),
(256, 'Mahem', 11),
(257, 'Mapuca', 11),
(258, 'Marmagao', 11),
(259, 'Panji', 11),
(260, 'Ponda', 11),
(261, 'Sanvordem', 11),
(262, 'Terekhol', 11),
(263, 'Ahmedabad', 12),
(264, 'Amreli', 12),
(265, 'Anand', 12),
(266, 'Banaskantha', 12),
(267, 'Baroda', 12),
(268, 'Bharuch', 12),
(269, 'Bhavnagar', 12),
(270, 'Dahod', 12),
(271, 'Dang', 12),
(272, 'Dwarka', 12),
(273, 'Gandhinagar', 12),
(274, 'Jamnagar', 12),
(275, 'Junagadh', 12),
(276, 'Kheda', 12),
(277, 'Kutch', 12),
(278, 'Mehsana', 12),
(279, 'Nadiad', 12),
(280, 'Narmada', 12),
(281, 'Navsari', 12),
(282, 'Panchmahals', 12),
(283, 'Patan', 12),
(284, 'Porbandar', 12),
(285, 'Rajkot', 12),
(286, 'Sabarkantha', 12),
(287, 'Surat', 12),
(288, 'Surendranagar', 12),
(289, 'Vadodara', 12),
(290, 'Valsad', 12),
(291, 'Vapi', 12),
(292, 'Bilaspur', 13),
(293, 'Chamba', 13),
(294, 'Dalhousie', 13),
(295, 'Hamirpur', 13),
(296, 'Kangra', 13),
(297, 'Kinnaur', 13),
(298, 'Kullu', 13),
(299, 'Lahaul & Spiti', 13),
(300, 'Mandi', 13),
(301, 'Shimla', 13),
(302, 'Sirmaur', 13),
(303, 'Solan', 13),
(304, 'Una', 13),
(305, 'Ambala', 14),
(306, 'Bhiwani', 14),
(307, 'Faridabad', 14),
(308, 'Fatehabad', 14),
(309, 'Gurgaon', 14),
(310, 'Hisar', 14),
(311, 'Jhajjar', 14),
(312, 'Jind', 14),
(313, 'Kaithal', 14),
(314, 'Karnal', 14),
(315, 'Kurukshetra', 14),
(316, 'Mahendragarh', 14),
(317, 'Mewat', 14),
(318, 'Panchkula', 14),
(319, 'Panipat', 14),
(320, 'Rewari', 14),
(321, 'Rohtak', 14),
(322, 'Sirsa', 14),
(323, 'Sonipat', 14),
(324, 'Yamunanagar', 14),
(325, 'Anantnag', 15),
(326, 'Baramulla', 15),
(327, 'Budgam', 15),
(328, 'Doda', 15),
(329, 'Jammu', 15),
(330, 'Kargil', 15),
(331, 'Kathua', 15),
(332, 'Kupwara', 15),
(333, 'Leh', 15),
(334, 'Poonch', 15),
(335, 'Pulwama', 15),
(336, 'Rajauri', 15),
(337, 'Srinagar', 15),
(338, 'Udhampur', 15),
(339, 'Bokaro', 16),
(340, 'Chatra', 16),
(341, 'Deoghar', 16),
(342, 'Dhanbad', 16),
(343, 'Dumka', 16),
(344, 'East Singhbhum', 16),
(345, 'Garhwa', 16),
(346, 'Giridih', 16),
(347, 'Godda', 16),
(348, 'Gumla', 16),
(349, 'Hazaribag', 16),
(350, 'Jamtara', 16),
(351, 'Koderma', 16),
(352, 'Latehar', 16),
(353, 'Lohardaga', 16),
(354, 'Pakur', 16),
(355, 'Palamu', 16),
(356, 'Ranchi', 16),
(357, 'Sahibganj', 16),
(358, 'Seraikela', 16),
(359, 'Simdega', 16),
(360, 'West Singhbhum', 16),
(361, 'Alappuzha', 17),
(362, 'Alleppey', 17),
(363, 'Alwaye', 17),
(364, 'Ernakulam', 17),
(365, 'Idukki', 17),
(366, 'Kannur', 17),
(367, 'Kasargod', 17),
(368, 'Kochi', 17),
(369, 'Kollam', 17),
(370, 'Kottayam', 17),
(371, 'Kovalam', 17),
(372, 'Kozhikode', 17),
(373, 'Malappuram', 17),
(374, 'Palakkad', 17),
(375, 'Pathanamthitta', 17),
(376, 'Perumbavoor', 17),
(377, 'Thiruvananthapuram', 17),
(378, 'Thrissur', 17),
(379, 'Trichur', 17),
(380, 'Trivandrum', 17),
(381, 'Wayanad', 17),
(382, 'Bagalkot', 18),
(383, 'Bangalore', 18),
(384, 'Bangalore Rural', 18),
(385, 'Belgaum', 18),
(386, 'Bellary', 18),
(387, 'Bhatkal', 18),
(388, 'Bidar', 18),
(389, 'Bijapur', 18),
(390, 'Chamrajnagar', 18),
(391, 'Chickmagalur', 18),
(392, 'Chikballapur', 18),
(393, 'Chitradurga', 18),
(394, 'Dakshina Kannada', 18),
(395, 'Davanagere', 18),
(396, 'Dharwad', 18),
(397, 'Gadag', 18),
(398, 'Gulbarga', 18),
(399, 'Hampi', 18),
(400, 'Hassan', 18),
(401, 'Haveri', 18),
(402, 'Hospet', 18),
(403, 'Karwar', 18),
(404, 'Kodagu', 18),
(405, 'Kolar', 18),
(406, 'Koppal', 18),
(407, 'Madikeri', 18),
(408, 'Mandya', 18),
(409, 'Mangalore', 18),
(410, 'Manipal', 18),
(411, 'Mysore', 18),
(412, 'Raichur', 18),
(413, 'Shimoga', 18),
(414, 'Sirsi', 18),
(415, 'Sringeri', 18),
(416, 'Srirangapatna', 18),
(417, 'Tumkur', 18),
(418, 'Udupi', 18),
(419, 'Uttara Kannada', 18),
(420, 'Agatti Island', 19),
(421, 'Bingaram Island', 19),
(422, 'Bitra Island', 19),
(423, 'Chetlat Island', 19),
(424, 'Kadmat Island', 19),
(425, 'Kalpeni Island', 19),
(426, 'Kavaratti Island', 19),
(427, 'Kiltan Island', 19),
(428, 'Lakshadweep Sea', 19),
(429, 'Minicoy Island', 19),
(430, 'North Island', 19),
(431, 'South Island', 19),
(432, 'East Garo Hills', 20),
(433, 'East Khasi Hills', 20),
(434, 'Jaintia Hills', 20),
(435, 'Ri Bhoi', 20),
(436, 'Shillong', 20),
(437, 'South Garo Hills', 20),
(438, 'West Garo Hills', 20),
(439, 'West Khasi Hills', 20),
(440, 'Ahmednagar', 21),
(441, 'Akola', 21),
(442, 'Amravati', 21),
(443, 'Aurangabad', 21),
(444, 'Beed', 21),
(445, 'Bhandara', 21),
(446, 'Buldhana', 21),
(447, 'Chandrapur', 21),
(448, 'Dhule', 21),
(449, 'Gadchiroli', 21),
(450, 'Gondia', 21),
(451, 'Hingoli', 21),
(452, 'Jalgaon', 21),
(453, 'Jalna', 21),
(454, 'Kolhapur', 21),
(455, 'Latur', 21),
(456, 'Mahabaleshwar', 21),
(457, 'Mumbai', 21),
(458, 'Mumbai City', 21),
(459, 'Mumbai Suburban', 21),
(460, 'Nagpur', 21),
(461, 'Nanded', 21),
(462, 'Nandurbar', 21),
(463, 'Nashik', 21),
(464, 'Osmanabad', 21),
(465, 'Parbhani', 21),
(466, 'Pune', 21),
(467, 'Raigad', 21),
(468, 'Ratnagiri', 21),
(469, 'Sangli', 21),
(470, 'Satara', 21),
(471, 'Sholapur', 21),
(472, 'Sindhudurg', 21),
(473, 'Thane', 21),
(474, 'Wardha', 21),
(475, 'Washim', 21),
(476, 'Yavatmal', 21),
(477, 'Bishnupur', 22),
(478, 'Chandel', 22),
(479, 'Churachandpur', 22),
(480, 'Imphal East', 22),
(481, 'Imphal West', 22),
(482, 'Senapati', 22),
(483, 'Tamenglong', 22),
(484, 'Thoubal', 22),
(485, 'Ukhrul', 22),
(486, 'Anuppur', 23),
(487, 'Ashoknagar', 23),
(488, 'Balaghat', 23),
(489, 'Barwani', 23),
(490, 'Betul', 23),
(491, 'Bhind', 23),
(492, 'Bhopal', 23),
(493, 'Burhanpur', 23),
(494, 'Chhatarpur', 23),
(495, 'Chhindwara', 23),
(496, 'Damoh', 23),
(497, 'Datia', 23),
(498, 'Dewas', 23),
(499, 'Dhar', 23),
(500, 'Dindori', 23),
(501, 'Guna', 23),
(502, 'Gwalior', 23),
(503, 'Harda', 23),
(504, 'Hoshangabad', 23),
(505, 'Indore', 23),
(506, 'Jabalpur', 23),
(507, 'Jagdalpur', 23),
(508, 'Jhabua', 23),
(509, 'Katni', 23),
(510, 'Khandwa', 23),
(511, 'Khargone', 23),
(512, 'Mandla', 23),
(513, 'Mandsaur', 23),
(514, 'Morena', 23),
(515, 'Narsinghpur', 23),
(516, 'Neemuch', 23),
(517, 'Panna', 23),
(518, 'Raisen', 23),
(519, 'Rajgarh', 23),
(520, 'Ratlam', 23),
(521, 'Rewa', 23),
(522, 'Sagar', 23),
(523, 'Satna', 23),
(524, 'Sehore', 23),
(525, 'Seoni', 23),
(526, 'Shahdol', 23),
(527, 'Shajapur', 23),
(528, 'Sheopur', 23),
(529, 'Shivpuri', 23),
(530, 'Sidhi', 23),
(531, 'Tikamgarh', 23),
(532, 'Ujjain', 23),
(533, 'Umaria', 23),
(534, 'Vidisha', 23),
(535, 'Aizawl', 24),
(536, 'Champhai', 24),
(537, 'Kolasib', 24),
(538, 'Lawngtlai', 24),
(539, 'Lunglei', 24),
(540, 'Mamit', 24),
(541, 'Saiha', 24),
(542, 'Serchhip', 24),
(543, 'Dimapur', 25),
(544, 'Kohima', 25),
(545, 'Mokokchung', 25),
(546, 'Mon', 25),
(547, 'Phek', 25),
(548, 'Tuensang', 25),
(549, 'Wokha', 25),
(550, 'Zunheboto', 25),
(551, 'Angul', 26),
(552, 'Balangir', 26),
(553, 'Balasore', 26),
(554, 'Baleswar', 26),
(555, 'Bargarh', 26),
(556, 'Berhampur', 26),
(557, 'Bhadrak', 26),
(558, 'Bhubaneswar', 26),
(559, 'Boudh', 26),
(560, 'Cuttack', 26),
(561, 'Deogarh', 26),
(562, 'Dhenkanal', 26),
(563, 'Gajapati', 26),
(564, 'Ganjam', 26),
(565, 'Jagatsinghapur', 26),
(566, 'Jajpur', 26),
(567, 'Jharsuguda', 26),
(568, 'Kalahandi', 26),
(569, 'Kandhamal', 26),
(570, 'Kendrapara', 26),
(571, 'Kendujhar', 26),
(572, 'Khordha', 26),
(573, 'Koraput', 26),
(574, 'Malkangiri', 26),
(575, 'Mayurbhanj', 26),
(576, 'Nabarangapur', 26),
(577, 'Nayagarh', 26),
(578, 'Nuapada', 26),
(579, 'Puri', 26),
(580, 'Rayagada', 26),
(581, 'Rourkela', 26),
(582, 'Sambalpur', 26),
(583, 'Subarnapur', 26),
(584, 'Sundergarh', 26),
(585, 'Amritsar', 27),
(586, 'Barnala', 27),
(587, 'Bathinda', 27),
(588, 'Faridkot', 27),
(589, 'Fatehgarh Sahib', 27),
(590, 'Ferozepur', 27),
(591, 'Gurdaspur', 27),
(592, 'Hoshiarpur', 27),
(593, 'Jalandhar', 27),
(594, 'Kapurthala', 27),
(595, 'Ludhiana', 27),
(596, 'Mansa', 27),
(597, 'Moga', 27),
(598, 'Muktsar', 27),
(599, 'Nawanshahr', 27),
(600, 'Pathankot', 27),
(601, 'Patiala', 27),
(602, 'Rupnagar', 27),
(603, 'Sangrur', 27),
(604, 'SAS Nagar', 27),
(605, 'Tarn Taran', 27),
(606, 'Bahur', 28),
(607, 'Karaikal', 28),
(608, 'Mahe', 28),
(609, 'Pondicherry', 28),
(610, 'Purnankuppam', 28),
(611, 'Valudavur', 28),
(612, 'Villianur', 28),
(613, 'Yanam', 28),
(614, 'Ajmer', 29),
(615, 'Alwar', 29),
(616, 'Banswara', 29),
(617, 'Baran', 29),
(618, 'Barmer', 29),
(619, 'Bharatpur', 29),
(620, 'Bhilwara', 29),
(621, 'Bikaner', 29),
(622, 'Bundi', 29),
(623, 'Chittorgarh', 29),
(624, 'Churu', 29),
(625, 'Dausa', 29),
(626, 'Dholpur', 29),
(627, 'Dungarpur', 29),
(628, 'Hanumangarh', 29),
(629, 'Jaipur', 29),
(630, 'Jaisalmer', 29),
(631, 'Jalore', 29),
(632, 'Jhalawar', 29),
(633, 'Jhunjhunu', 29),
(634, 'Jodhpur', 29),
(635, 'Karauli', 29),
(636, 'Kota', 29),
(637, 'Nagaur', 29),
(638, 'Pali', 29),
(639, 'Pilani', 29),
(640, 'Rajsamand', 29),
(641, 'Sawai Madhopur', 29),
(642, 'Sikar', 29),
(643, 'Sirohi', 29),
(644, 'Sri Ganganagar', 29),
(645, 'Tonk', 29),
(646, 'Udaipur', 29),
(647, 'Barmiak', 30),
(648, 'Be', 30),
(649, 'Bhurtuk', 30),
(650, 'Chhubakha', 30),
(651, 'Chidam', 30),
(652, 'Chubha', 30),
(653, 'Chumikteng', 30),
(654, 'Dentam', 30),
(655, 'Dikchu', 30),
(656, 'Dzongri', 30),
(657, 'Gangtok', 30),
(658, 'Gauzing', 30),
(659, 'Gyalshing', 30),
(660, 'Hema', 30),
(661, 'Kerung', 30),
(662, 'Lachen', 30),
(663, 'Lachung', 30),
(664, 'Lema', 30),
(665, 'Lingtam', 30),
(666, 'Lungthu', 30),
(667, 'Mangan', 30),
(668, 'Namchi', 30),
(669, 'Namthang', 30),
(670, 'Nanga', 30),
(671, 'Nantang', 30),
(672, 'Naya Bazar', 30),
(673, 'Padamachen', 30),
(674, 'Pakhyong', 30),
(675, 'Pemayangtse', 30),
(676, 'Phensang', 30),
(677, 'Rangli', 30),
(678, 'Rinchingpong', 30),
(679, 'Sakyong', 30),
(680, 'Samdong', 30),
(681, 'Singtam', 30),
(682, 'Siniolchu', 30),
(683, 'Sombari', 30),
(684, 'Soreng', 30),
(685, 'Sosing', 30),
(686, 'Tekhug', 30),
(687, 'Temi', 30),
(688, 'Tsetang', 30),
(689, 'Tsomgo', 30),
(690, 'Tumlong', 30),
(691, 'Yangang', 30),
(692, 'Yumtang', 30),
(693, 'Chennai', 31),
(694, 'Chidambaram', 31),
(695, 'Chingleput', 31),
(696, 'Coimbatore', 31),
(697, 'Courtallam', 31),
(698, 'Cuddalore', 31),
(699, 'Dharmapuri', 31),
(700, 'Dindigul', 31),
(701, 'Erode', 31),
(702, 'Hosur', 31),
(703, 'Kanchipuram', 31),
(704, 'Kanyakumari', 31),
(705, 'Karaikudi', 31),
(706, 'Karur', 31),
(707, 'Kodaikanal', 31),
(708, 'Kovilpatti', 31),
(709, 'Krishnagiri', 31),
(710, 'Kumbakonam', 31),
(711, 'Madurai', 31),
(712, 'Mayiladuthurai', 31),
(713, 'Nagapattinam', 31),
(714, 'Nagarcoil', 31),
(715, 'Namakkal', 31),
(716, 'Neyveli', 31),
(717, 'Nilgiris', 31),
(718, 'Ooty', 31),
(719, 'Palani', 31),
(720, 'Perambalur', 31),
(721, 'Pollachi', 31),
(722, 'Pudukkottai', 31),
(723, 'Rajapalayam', 31),
(724, 'Ramanathapuram', 31),
(725, 'Salem', 31),
(726, 'Sivaganga', 31),
(727, 'Sivakasi', 31),
(728, 'Thanjavur', 31),
(729, 'Theni', 31),
(730, 'Thoothukudi', 31),
(731, 'Tiruchirappalli', 31),
(732, 'Tirunelveli', 31),
(733, 'Tirupur', 31),
(734, 'Tiruvallur', 31),
(735, 'Tiruvannamalai', 31),
(736, 'Tiruvarur', 31),
(737, 'Trichy', 31),
(738, 'Tuticorin', 31),
(739, 'Vellore', 31),
(740, 'Villupuram', 31),
(741, 'Virudhunagar', 31),
(742, 'Yercaud', 31),
(743, 'Agartala', 32),
(744, 'Ambasa', 32),
(745, 'Bampurbari', 32),
(746, 'Belonia', 32),
(747, 'Dhalai', 32),
(748, 'Dharam Nagar', 32),
(749, 'Kailashahar', 32),
(750, 'Kamal Krishnabari', 32),
(751, 'Khopaiyapara', 32),
(752, 'Khowai', 32),
(753, 'Phuldungsei', 32),
(754, 'Radha Kishore Pur', 32),
(755, 'Tripura', 32),
(756, 'Dehradun', 33),
(757, 'Haridwar', 33),
(758, 'Roorkee', 33),
(759, 'Haldwani', 33),
(760, 'Rudrapur', 33),
(761, 'Kashipur', 33),
(762, 'Rishikesh', 33),
(763, 'Pithoragarh', 33),
(764, 'Ramnagar', 33),
(765, 'Kichha', 33),
(766, 'Manglaur', 33),
(767, 'Jaspur', 33),
(768, 'Kotdwara', 33),
(769, 'Nainital', 33),
(770, 'Almora', 33),
(771, 'Mussoorie	', 33),
(772, 'Sitarganj', 33),
(773, 'Bazpur', 33),
(774, 'Pauri', 33),
(775, 'Tehri', 33),
(776, 'Nagla', 33),
(777, 'Laksar', 33),
(778, 'Chamoli Gopeshwar', 33),
(779, 'Umru Khurd', 33),
(780, 'Srinagar', 33),
(781, 'Kanpur', 34),
(782, 'Lucknow', 34),
(783, 'Ghaziabad', 34),
(784, 'Agra', 34),
(785, 'Meerut', 34),
(786, 'Varanasi', 34),
(787, 'Prayagraj	', 34),
(788, 'Bareilly', 34),
(789, 'Aligarh', 34),
(790, 'Moradabad', 34),
(791, 'Saharanpur', 34),
(792, 'Gorakhpur', 34),
(793, 'Noida', 34),
(794, 'Firozabad', 34),
(795, 'Jhansi', 34),
(796, 'Muzaffarnagar', 34),
(797, 'Mathura', 34),
(798, 'Ayodhya', 34),
(799, 'Rampur', 34),
(800, 'Shahjahanpur', 34),
(801, 'Farrukhabad-cum-Fategarh', 34),
(802, 'Budaun', 34),
(803, 'Maunath Bhanjan', 34),
(804, 'Hapur', 34),
(805, 'Etawah', 34),
(806, 'Mirzapur-cum-Vindhyachal', 34),
(807, 'Bulandshahr', 34),
(808, 'Sambhal', 34),
(809, 'Amroha', 34),
(810, 'Hardoi', 34),
(811, 'Fatehpur', 34),
(812, 'Raebareli', 34),
(813, 'Orai', 34),
(814, 'Sitapur', 34),
(815, 'Bahraich', 34),
(816, 'Modinagar	', 34),
(817, 'Unnao', 34),
(818, 'Jaunpur', 34),
(819, 'Lakhimpur	', 34),
(820, 'Hathras', 34),
(821, 'Banda', 34),
(822, 'Pilibhit', 34),
(823, 'Barabanki', 34),
(824, 'Khurja', 34),
(825, 'Gonda', 34),
(826, 'Mainpuri', 34),
(827, 'Lalitpur', 34),
(828, 'Etah', 34),
(829, 'Deoria', 34),
(830, 'Badaun', 34),
(831, 'Ghazipur', 34),
(832, 'Sultanpur', 34),
(833, 'Azamgarh', 34),
(834, 'Bijnor', 34),
(835, 'Sahaswan', 34),
(836, 'Basti', 34),
(837, 'Chandausi	', 34),
(838, 'Akbarpur', 34),
(839, 'Ballia', 34),
(840, 'Tanda', 34),
(841, 'Greater Noida', 34),
(842, 'Shikohabad', 34),
(843, 'Shamli', 34),
(844, 'Awagarh', 34),
(845, 'Kasganj', 34),
(846, 'Kolkata', 35),
(847, 'Asansol', 35),
(848, 'Siliguri', 35),
(849, 'Durgapur', 35),
(850, 'Bardhaman', 35),
(851, 'Malda', 35),
(852, 'Baharampur', 35),
(853, 'Habra', 35),
(854, 'Kharagpur', 35),
(855, 'Santipur', 35),
(856, 'Dankuni', 35),
(857, 'Dhulian', 35),
(858, 'Ranaghat', 35),
(859, 'Haldia', 35),
(860, 'Raiganj', 35),
(861, 'Krishnanagar', 35),
(862, 'Nabadwip', 35),
(863, 'Medinipur', 35),
(864, 'Jalpaiguri', 35),
(865, 'Balurghat', 35),
(866, 'Basirhat', 35),
(867, 'Bankura', 35),
(868, 'Chakdaha', 35),
(869, 'Darjeeling', 35),
(870, 'Alipurduar', 35),
(871, 'Purulia', 35),
(872, 'Jangipur', 35),
(873, 'Bolpur', 35),
(874, 'Bangaon', 35),
(875, 'Cooch Behar', 35),
(876, 'Hyderabad', 36),
(877, 'Warangal', 36),
(878, 'Nizamabad', 36),
(879, 'Khammam', 36),
(880, 'Karimnagar', 36),
(881, 'Ramagundam', 36),
(882, 'Mahabubnagar', 36),
(883, 'Nalgonda', 36),
(884, 'Adilabad', 36),
(885, 'Suryapet', 36),
(886, 'Miryalaguda', 36),
(887, 'Siddipet', 36),
(888, 'Jagtial', 36),
(889, 'Nirmal', 36);

-- --------------------------------------------------------

--
-- Table structure for table `tblcolor`
--

CREATE TABLE `tblcolor` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcolor`
--

INSERT INTO `tblcolor` (`id`, `name`, `status`) VALUES
(1, 'Black', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

CREATE TABLE `tblcountry` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`id`, `name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerorder`
--

CREATE TABLE `tblcustomerorder` (
  `id` int(11) NOT NULL,
  `COMid` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerordermaster`
--

CREATE TABLE `tblcustomerordermaster` (
  `id` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL,
  `delivery_datetime` datetime NOT NULL,
  `shipping_address` varchar(60) NOT NULL,
  `cityid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `total_amt` double NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `deliveryPer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric`
--

CREATE TABLE `tblfabric` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfabric`
--

INSERT INTO `tblfabric` (`id`, `type`, `status`) VALUES
(1, 'Silk', 1),
(2, 'cotton', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `Categoryid` int(11) NOT NULL,
  `Colorid` int(11) NOT NULL,
  `Sizeid` int(11) NOT NULL,
  `Fabricid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ImgPath1` varchar(100) NOT NULL,
  `ImgPath2` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `Categoryid`, `Colorid`, `Sizeid`, `Fabricid`, `price`, `ImgPath1`, `ImgPath2`, `status`) VALUES
(9, 'Kacchi Saree', 18, 1, 1, 1, 34, 'IMG/cat-3.jpg', 'IMG/c2.jpg', 1),
(10, 'Kacchi Saree', 18, 1, 1, 1, 33, 'IMG/cat-3.jpg', 'IMG/cat-5.jpg', 1),
(11, 'Kacchi Saree', 18, 1, 1, 1, 22, 'IMG/i2.jpeg', 'IMG/cat-5.jpg', 0),
(12, 'Kacchi Saree', 18, 1, 1, 1, 88, 'IMG/i2.jpeg', 'IMG/cat-6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchaseorderdetail`
--

CREATE TABLE `tblpurchaseorderdetail` (
  `id` int(11) NOT NULL,
  `POMid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchaseordermanagement`
--

CREATE TABLE `tblpurchaseordermanagement` (
  `id` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `order_datetime` datetime NOT NULL,
  `delivery_datetime` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `id` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `Customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsize`
--

CREATE TABLE `tblsize` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsize`
--

INSERT INTO `tblsize` (`id`, `name`, `status`) VALUES
(1, 'XL', 1),
(4, 'L', 0),
(5, 'XXL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `countryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`id`, `name`, `countryid`) VALUES
(1, 'Andaman and nicobar islands', 1),
(2, 'Andhra pradesh', 1),
(3, 'Arunachal pradesh', 1),
(4, 'Assam', 1),
(5, 'Bihar', 1),
(6, 'Chattisgarh', 1),
(7, 'Chandigarh', 1),
(8, 'Daman and diu', 1),
(9, 'Delhi', 1),
(10, 'Dadra and nagar haveli', 1),
(11, 'Goa', 1),
(12, 'Gujarat', 1),
(13, 'Himachal pradesh', 1),
(14, 'Haryana', 1),
(15, 'Jammu and kashmir', 1),
(16, 'Jharkhand', 1),
(17, 'Kerala', 1),
(18, 'Karnataka', 1),
(19, 'Lakshadweep', 1),
(20, 'Meghalaya', 1),
(21, 'Maharashtra', 1),
(22, 'Manipur', 1),
(23, 'Madhya pradesh', 1),
(24, 'Mizoram', 1),
(25, 'nagaland', 1),
(26, 'Orissa', 1),
(27, 'Punjab', 1),
(28, 'Pondicherry', 1),
(29, 'Rajasthan', 1),
(30, 'Sikkim', 1),
(31, 'Tamil nadu', 1),
(32, 'Tripura', 1),
(33, 'Uttarakhand', 1),
(34, 'Uttar pradesh', 1),
(35, 'West bengal', 1),
(36, 'Telangana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `id` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pincode` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `fname`, `lname`, `password`, `role`, `address`, `cityid`, `contactno`, `email`, `pincode`) VALUES
(1, 'Patoliya', 'Drashti', 'Drashti@111', 'Admin', '165 om row house part -1, pasodara', 317, 1234567890, 'patoliyadrashti111@gmail.com', 395006),
(2, 'Priya', 'Sorathiya', 'Era@1111', 'Customer', 'alishann', 381, 9313625496, '21bmiitbscit003@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvendor`
--

CREATE TABLE `tblvendor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contactno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcartdetails`
--
ALTER TABLE `tblcartdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CMid` (`CMid`),
  ADD KEY `Productid` (`Productid`);

--
-- Indexes for table `tblcartmanagement`
--
ALTER TABLE `tblcartmanagement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customerid` (`Customerid`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stateid` (`stateid`);

--
-- Indexes for table `tblcolor`
--
ALTER TABLE `tblcolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcountry`
--
ALTER TABLE `tblcountry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `COMid` (`COMid`),
  ADD KEY `Productid` (`Productid`);

--
-- Indexes for table `tblcustomerordermaster`
--
ALTER TABLE `tblcustomerordermaster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customerid` (`Customerid`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `deliveryPer_id` (`deliveryPer_id`);

--
-- Indexes for table `tblfabric`
--
ALTER TABLE `tblfabric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Categoryid` (`Categoryid`),
  ADD KEY `Colorid` (`Colorid`),
  ADD KEY `Fabricid` (`Fabricid`),
  ADD KEY `Sizeid` (`Sizeid`);

--
-- Indexes for table `tblpurchaseorderdetail`
--
ALTER TABLE `tblpurchaseorderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `POMid` (`POMid`);

--
-- Indexes for table `tblpurchaseordermanagement`
--
ALTER TABLE `tblpurchaseordermanagement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Productid` (`Productid`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Productid` (`Productid`),
  ADD KEY `Customerid` (`Customerid`);

--
-- Indexes for table `tblsize`
--
ALTER TABLE `tblsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Productid` (`Productid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `tblvendor`
--
ALTER TABLE `tblvendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcartdetails`
--
ALTER TABLE `tblcartdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcartmanagement`
--
ALTER TABLE `tblcartmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=890;

--
-- AUTO_INCREMENT for table `tblcolor`
--
ALTER TABLE `tblcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcountry`
--
ALTER TABLE `tblcountry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcustomerordermaster`
--
ALTER TABLE `tblcustomerordermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfabric`
--
ALTER TABLE `tblfabric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpurchaseorderdetail`
--
ALTER TABLE `tblpurchaseorderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpurchaseordermanagement`
--
ALTER TABLE `tblpurchaseordermanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsize`
--
ALTER TABLE `tblsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblvendor`
--
ALTER TABLE `tblvendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcartdetails`
--
ALTER TABLE `tblcartdetails`
  ADD CONSTRAINT `tblcartdetails_ibfk_1` FOREIGN KEY (`CMid`) REFERENCES `tblcartmanagement` (`id`),
  ADD CONSTRAINT `tblcartdetails_ibfk_2` FOREIGN KEY (`Productid`) REFERENCES `tblproduct` (`id`);

--
-- Constraints for table `tblcartmanagement`
--
ALTER TABLE `tblcartmanagement`
  ADD CONSTRAINT `tblcartmanagement_ibfk_1` FOREIGN KEY (`Customerid`) REFERENCES `tbluser` (`id`);

--
-- Constraints for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD CONSTRAINT `tblcity_ibfk_1` FOREIGN KEY (`stateid`) REFERENCES `tblstate` (`id`);

--
-- Constraints for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  ADD CONSTRAINT `tblcustomerorder_ibfk_1` FOREIGN KEY (`COMid`) REFERENCES `tblcustomerordermaster` (`id`),
  ADD CONSTRAINT `tblcustomerorder_ibfk_2` FOREIGN KEY (`Productid`) REFERENCES `tblproduct` (`id`);

--
-- Constraints for table `tblcustomerordermaster`
--
ALTER TABLE `tblcustomerordermaster`
  ADD CONSTRAINT `tblcustomerordermaster_ibfk_1` FOREIGN KEY (`Customerid`) REFERENCES `tbluser` (`id`),
  ADD CONSTRAINT `tblcustomerordermaster_ibfk_2` FOREIGN KEY (`cityid`) REFERENCES `tblcity` (`id`),
  ADD CONSTRAINT `tblcustomerordermaster_ibfk_3` FOREIGN KEY (`deliveryPer_id`) REFERENCES `tbluser` (`id`);

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`Categoryid`) REFERENCES `tblcategory` (`id`),
  ADD CONSTRAINT `tblproduct_ibfk_2` FOREIGN KEY (`Colorid`) REFERENCES `tblcolor` (`id`),
  ADD CONSTRAINT `tblproduct_ibfk_3` FOREIGN KEY (`Fabricid`) REFERENCES `tblfabric` (`id`),
  ADD CONSTRAINT `tblproduct_ibfk_4` FOREIGN KEY (`Sizeid`) REFERENCES `tblsize` (`id`);

--
-- Constraints for table `tblpurchaseorderdetail`
--
ALTER TABLE `tblpurchaseorderdetail`
  ADD CONSTRAINT `tblpurchaseorderdetail_ibfk_1` FOREIGN KEY (`POMid`) REFERENCES `tblpurchaseordermanagement` (`id`);

--
-- Constraints for table `tblpurchaseordermanagement`
--
ALTER TABLE `tblpurchaseordermanagement`
  ADD CONSTRAINT `tblpurchaseordermanagement_ibfk_1` FOREIGN KEY (`Productid`) REFERENCES `tblproduct` (`id`),
  ADD CONSTRAINT `tblpurchaseordermanagement_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `tblvendor` (`id`);

--
-- Constraints for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD CONSTRAINT `tblreview_ibfk_1` FOREIGN KEY (`Productid`) REFERENCES `tblproduct` (`id`),
  ADD CONSTRAINT `tblreview_ibfk_2` FOREIGN KEY (`Customerid`) REFERENCES `tbluser` (`id`);

--
-- Constraints for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD CONSTRAINT `tblstate_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `tblcountry` (`id`);

--
-- Constraints for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD CONSTRAINT `tblstock_ibfk_1` FOREIGN KEY (`Productid`) REFERENCES `tblproduct` (`id`);

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `tblcity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
