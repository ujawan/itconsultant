-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 11:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_consulting`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(100) NOT NULL,
  `about_img` varchar(255) NOT NULL,
  `about_heading` varchar(255) NOT NULL,
  `about_text` text NOT NULL,
  `about_check1` varchar(255) NOT NULL,
  `about_check2` varchar(255) NOT NULL,
  `about_check3` varchar(255) NOT NULL,
  `about_check4` varchar(255) NOT NULL,
  `about_phone_text` varchar(255) NOT NULL,
  `about_phone` int(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_img`, `about_heading`, `about_text`, `about_check1`, `about_check2`, `about_check3`, `about_check4`, `about_phone_text`, `about_phone`, `timestamp`) VALUES
(1, 'about.jpg', 'The Best IT Solution With 12 Years Experiance', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet', 'Award Winning', '24/7 Support', 'Professional Staff', 'Fair Prices', 'Call to ask any question', 1234567889, '2025-04-07 15:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(100) NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `blog_auther` varchar(255) NOT NULL,
  `blog_date` date NOT NULL DEFAULT current_timestamp(),
  `card_heading` varchar(255) NOT NULL,
  `card_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand_logo`
--

CREATE TABLE `brand_logo` (
  `brand_id` int(100) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `timestemp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `brand_logo`
--

INSERT INTO `brand_logo` (`brand_id`, `brand_logo`, `timestemp`) VALUES
(1, 'vendor-1.jpg', '2025-04-08 11:50:34'),
(2, 'vendor-2.jpg', '2025-04-08 11:50:34'),
(3, 'vendor-3.jpg', '2025-04-08 11:50:34'),
(4, 'vendor-4.jpg', '2025-04-08 11:50:34'),
(5, 'vendor-5.jpg', '2025-04-08 11:50:34'),
(6, 'vendor-6.jpg', '2025-04-08 11:50:34'),
(7, 'vendor-7.jpg', '2025-04-08 11:50:34'),
(8, 'vendor-8.jpg', '2025-04-08 11:50:34'),
(9, 'vendor-9.jpg', '2025-04-08 11:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(100) NOT NULL,
  `contact_heading` varchar(255) NOT NULL,
  `call_text` varchar(255) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `email_text` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_text` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(100) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `phone_heading` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `email_heading` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_heading` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `heading`, `phone_heading`, `phone`, `email_heading`, `email`, `address_heading`, `address`) VALUES
(1, 'If You Have Any Query, Feel Free To Contact Us', 'Call and ask', 2147483647, 'Email to get free quote', 'info001@example.com', 'Visit our office near', 'XYS Street, NY, USA');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `feature_id` int(100) NOT NULL,
  `feature_heading` varchar(255) NOT NULL,
  `feature_img` varchar(255) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_detail` text NOT NULL,
  `feature_name2` varchar(255) NOT NULL,
  `feature_detail2` varchar(255) NOT NULL,
  `feature_name3` varchar(255) NOT NULL,
  `feature_detail3` varchar(255) NOT NULL,
  `feature_name4` varchar(255) NOT NULL,
  `feature_detail4` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`feature_id`, `feature_heading`, `feature_img`, `feature_name`, `feature_detail`, `feature_name2`, `feature_detail2`, `feature_name3`, `feature_detail3`, `feature_name4`, `feature_detail4`, `timestamp`) VALUES
(1, 'We Are Here to Grow Your ', '1744184671_fa6a8c8088cbb6373596.jpg', 'Best in Industry', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor', 'Awards Winning', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor', 'Professional ', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor', '24/7 Support', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor', '2025-04-07 15:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `footer_id` int(100) NOT NULL,
  `footer_logo` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`footer_id`, `footer_logo`, `footer_text`) VALUES
(1, '1744266313_8d130cbf59cb2625d91a.png', 'Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd ');

-- --------------------------------------------------------

--
-- Table structure for table `header_adress`
--

CREATE TABLE `header_adress` (
  `header_id` int(11) NOT NULL,
  `header_address` varchar(255) DEFAULT NULL,
  `header_phone` varchar(255) DEFAULT NULL,
  `header_email` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header_adress`
--

INSERT INTO `header_adress` (`header_id`, `header_address`, `header_phone`, `header_email`, `twitter_url`, `facebook_url`, `linkedin_url`, `instagram_url`, `youtube_url`) VALUES
(1, 'Kohat KDA', '03324234218', 'example@gmail.com', 'http://localhost/itconsultant/admin/headeraddress', 'http://localhost/itconsultant/admin/headeraddress', 'http://localhost/itconsultant/admin/headeraddress', 'http://localhost/itconsultant/admin/headeraddress', 'http://localhost/itconsultant/admin/headeraddress');

-- --------------------------------------------------------

--
-- Table structure for table `header_logo`
--

CREATE TABLE `header_logo` (
  `header_logo_id` int(11) NOT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header_logo`
--

INSERT INTO `header_logo` (`header_logo_id`, `logo_image`, `created_at`, `updated_at`) VALUES
(1, '1744270952_7e3d3ad78289daeecad4.png', '2025-04-10 06:37:32', '2025-04-10 07:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(100) NOT NULL,
  `bkimg_1` varchar(255) NOT NULL,
  `bkimg_2` varchar(255) NOT NULL,
  `hero_small_heading` varchar(255) NOT NULL,
  `hero_heading` varchar(255) NOT NULL,
  `happy_clients_text` varchar(255) NOT NULL,
  `happy_clients` int(100) NOT NULL,
  `projects_done_text` varchar(255) NOT NULL,
  `projects_done` int(100) NOT NULL,
  `win_awards_text` varchar(255) NOT NULL,
  `win_awards` int(100) NOT NULL,
  `services_heading` varchar(255) NOT NULL,
  `services_cardinfo_heading` varchar(255) NOT NULL,
  `services_cardinfo_text` varchar(255) NOT NULL,
  `services_cardinfo_phone` int(100) NOT NULL,
  `pricing_heading` varchar(255) NOT NULL,
  `testimonial_heading` varchar(255) NOT NULL,
  `team_heading` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `bkimg_1`, `bkimg_2`, `hero_small_heading`, `hero_heading`, `happy_clients_text`, `happy_clients`, `projects_done_text`, `projects_done`, `win_awards_text`, `win_awards`, `services_heading`, `services_cardinfo_heading`, `services_cardinfo_text`, `services_cardinfo_phone`, `pricing_heading`, `testimonial_heading`, `team_heading`, `timestamp`) VALUES
(1, '1744099585_4972fb03e9fbba70518e.jpg', '1744271006_eb099c24feaecaf3f8d7.jpg', 'Creative & Supports', 'Creative & Innovative Digital Solutions', 'Happy Clients', 122, 'Projects Done', 99, 'Win Awards', 125, 'Custom IT Solutions for Your Successful Business', '', '', 0, 'We are Offering Competitive Prices for Our Clients', 'What Our Clients Say About Our Digital Services', 'Professional Stuffs Ready to Help Your Business', '2025-03-24 08:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(100) NOT NULL,
  `pricing_plan` varchar(255) NOT NULL,
  `pricing_text` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `pricing_check1` varchar(255) NOT NULL,
  `pricing_check2` varchar(255) NOT NULL,
  `pricing_check3` varchar(255) NOT NULL,
  `pricing_check4` varchar(255) NOT NULL,
  `timestemp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `pricing_plan`, `pricing_text`, `price`, `pricing_check1`, `pricing_check2`, `pricing_check3`, `pricing_check4`, `timestemp`) VALUES
(1, 'Basic Plan', 'For Small Size Business', 47, 'HTML5 & CSS3', 'Bootstrap v5', 'Responsive Layout', 'Cross-browser Support', '2025-04-07 15:59:49'),
(2, 'Standard Plan', 'For Medium Size Business', 100, 'HTML5 & CSS3', 'Bootstrap v5', 'Responsive Layout', 'Cross-browser Support', '2025-04-07 15:59:49'),
(3, 'Advanced Plan', 'For Large Size Business', 149, 'HTML5 & CSS3', 'Bootstrap v5', 'Responsive Layout', 'Cross-browser Support', '2025-04-07 15:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_id` int(100) NOT NULL,
  `quote_heading` varchar(255) NOT NULL,
  `quote_check1` varchar(255) NOT NULL,
  `quote_check2` varchar(255) NOT NULL,
  `quote_text` text NOT NULL,
  `quote_phone_heading` varchar(255) NOT NULL,
  `quote_phone` int(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_id`, `quote_heading`, `quote_check1`, `quote_check2`, `quote_text`, `quote_phone_heading`, `quote_phone`, `timestamp`) VALUES
(1, 'Need A Free Quote? Please Feel Free to Contact Us', 'Reply within an Hour', '24 hrs telephone support', 'Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.', 'Call Us', 33251531, '2025-04-07 16:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(100) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_text` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_text`, `timestamp`) VALUES
(1, 'Cyber Security', 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed', '2025-04-07 15:52:44'),
(2, 'Data Analytics', 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed', '2025-04-07 15:55:02'),
(3, 'Web development', 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed', '2025-04-07 15:55:02'),
(4, 'Apps Development', 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed', '2025-04-07 15:55:02'),
(5, 'SEO Optimization', 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed', '2025-04-07 15:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(100) NOT NULL,
  `team_img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `team_twitter` varchar(255) NOT NULL,
  `team_facebook` varchar(255) NOT NULL,
  `team_insta` varchar(255) NOT NULL,
  `team_linkedin` varchar(255) NOT NULL,
  `timestemp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_img`, `name`, `designation`, `team_twitter`, `team_facebook`, `team_insta`, `team_linkedin`, `timestemp`) VALUES
(1, 'team-1.jpg', 'Full Name', 'Designation', 'team_twitrer', 'team_facebook', 'team_insta', 'team_linkedin', '2025-04-07 13:06:13'),
(2, 'team-2.jpg', 'name1', 'ceo', 'twitter', 'facebook', 'insta', 'linkedin', '2025-04-08 08:45:15'),
(3, 'team-3.jpg', 'name', 'developer', 'twitter', 'facebook', 'insta', 'linkedin', '2025-04-08 08:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(100) NOT NULL,
  `testimonial_img` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_position` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_img`, `client_name`, `client_position`, `detail`) VALUES
(1, 'testimonial-1.jpg', 'Client Name1', 'Profession', ' dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'),
(2, '1744183160_8c0d108ec637e3ba31ee.jpg', 'Client Name', 'Profession', 'dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore '),
(3, '1744183804_a027c766f81b268ac844.jpg', 'Client Name', 'Profession', 'dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'),
(4, 'testimonial-4.jpg', 'Client Name4', 'Profession', 'dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `brand_logo`
--
ALTER TABLE `brand_logo`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `header_adress`
--
ALTER TABLE `header_adress`
  ADD PRIMARY KEY (`header_id`);

--
-- Indexes for table `header_logo`
--
ALTER TABLE `header_logo`
  ADD PRIMARY KEY (`header_logo_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand_logo`
--
ALTER TABLE `brand_logo`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `feature_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `footer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_adress`
--
ALTER TABLE `header_adress`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_logo`
--
ALTER TABLE `header_logo`
  MODIFY `header_logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
