-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 04:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bkash`
--

CREATE TABLE `bkash` (
  `id` int(11) NOT NULL,
  `bkash` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `bkash_details` varchar(2000) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bkash`
--

INSERT INTO `bkash` (`id`, `bkash`, `number`, `bkash_details`, `status`) VALUES
(1, 'বিকাশ', '018145695874', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took.\r\n\r\ngalley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_img`) VALUES
(1, 'Brand', 'floral-background-png-17-removebg-preview.png'),
(3, 'Brand-2', '133981958_232679494973655_641374085222999094_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on`
--

CREATE TABLE `cash_on` (
  `id` int(11) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_on`
--

INSERT INTO `cash_on` (`id`, `details`, `status`) VALUES
(1, ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `img`, `icon`, `banner`) VALUES
(5, 'Men\'s Fashion', '130067104_729356767690455_4189773047527679126_n.jpg', 'WhatsApp_Image_2020-12-26_at_07.32.23-removebg-preview.png', 'mail.google.com_mail_u_2_.png'),
(6, 'Woman\'s Fashion', 'pexels-ylanite-koppens-934062.jpg', 'WhatsApp_Image_2020-12-26_at_07.32.22-removebg-preview.png', 'Capture.PNG'),
(8, 'Kis\'s Fashion', 'Kids_Fashion_Trends_for_2020_1000x.jpg', 'iStar_Design_Online_Shopping_LineIcons_Live-31-512.png', 'kids-fashion_759_ts.jpg'),
(13, 'Sari ', 'Kids_Fashion_Trends_for_2020_1000x.jpg', '135560129_787856005131836_8870841292019438050_n.png', '12.jpg'),
(14, 'Mobile & Accsasoris', 'add-slide2.jpg', 'add-slide2.jpg', 'banner-mob.jpg'),
(15, 'Electronics', 'banner-arrival.jpg', 'banner-women.jpg', 'banner-mob.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nogod`
--

CREATE TABLE `nogod` (
  `id` int(11) NOT NULL,
  `nogod` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `nogod_details` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nogod`
--

INSERT INTO `nogod` (`id`, `nogod`, `number`, `nogod_details`, `status`) VALUES
(1, 'নগদ ', '01814569747', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `link`) VALUES
(1, 'Storing Data Locally in a PhoneGap App with SQLite', 'Data storing is a basic requirement while creating an application.\n\nIt is possible to store data online but the app needs to be online whenever data processing is required.\n\nFor local data storage use SQLite database which is already embedded on the mobile platforms - Android, IOS, Windows, Blackberry, etc.\n\nThe Cordova plugin provides support to access SQLite database in the app.\n\nIn this tutorial, I am creating an Android app where use SQLite database to save and retrieve records. Deploy the application with PhoneGap Build.', 'http://makitweb.com/storing-data-locally-in-a-phonegap-app-with-sqlite/'),
(2, 'jQuery UI autocomplete with PHP and AJAX', 'The autocomplete functionality shows the suggestion list according to the entered value. The user can select a value from the list.\n\nWith jQuery UI you can easily add autocomplete widget on the input element. Navigate to the suggestion list either by mouse or keyboard arrow keys.\n\nIt has the various options that allow us to customize the widget.', 'http://makitweb.com/jquery-ui-autocomplete-with-php-and-ajax/'),
(3, 'Add plugin to the Android app - PhoneGap', 'You cannot directly access the system feature in your PhoneGap app to extend its functionality.\n\nPhoneGap provide various plugins that allow accessing features like - camera, geolocation, contacts, battery status etc.', 'http://makitweb.com/add-plugin-to-the-android-app-phonegap/'),
(4, 'Insert record to Database Table - Codeigniter', 'All logical operation and database handling done in the Models like insert, update or fetch records.\n\nCodeigniter has predefined Database methods to perform database request.\n\nIn the demonstration, with View show the HTML form and when the user submits the forms then call the Model method to insert record from the controller.', 'http://makitweb.com/insert-record-to-database-table-codeigniter/'),
(5, 'How to install and setup Codeigniter', 'Codeigniter is a lightweight PHP-based framework to develop the web application. It is based on MVC (Model View Controller) pattern.\n', 'http://makitweb.com/how-to-install-and-setup-codeigniter/'),
(6, 'Add tooltip to the element with Bootstrap', 'Bootstrap provides dozens of custom plugins that helps to create better UI. With this, you can easily add tooltip to the HTML elements.\n\nA tooltip will appear when the user moves the mouse pointer over the element e.g. link, buttons, etc. This gives hint or quick information to the user.', 'http://makitweb.com/add-tooltip-to-the-element-with-bootstrap/'),
(7, 'Make android app with PhoneGap Build', 'PhoneGap is a framework that use to build mobile applications for multiple platforms - Android, iOS, Windows Phone, Blackberry etc.\n\nWith HTML, CSS, and JavaScript you can build an application.\n\nYou don\'t have to require to re-write code for other platforms.', 'http://makitweb.com/make-android-app-with-phonegap-build/'),
(8, 'How to handle AJAX request on the same page - PHP', 'AJAX is use to communicate with the server to perform the action without the need to refresh the page.\n\nYou can either handle AJAX requests on the same page or on the separate page.', 'http://makitweb.com/how-to-handle-ajax-request-on-the-same-page-php/'),
(9, 'Automatic page load progress bar with Pace.js', 'The pace.js is an automatic page load progress bar. You don\'t need to write any code to initialize the script during page load.\n\nIt is easy to implement and not dependent on any other external JavaScript libraries.', 'http://makitweb.com/automatic-page-load-progress-bar-with-pace-js/'),
(10, 'Remove unwanted whitespace from the column - MySQL', 'There is always the possibility that the users may not enter the values as we expected and the data is being saved on the Database table. E.g. unwanted whitespace or characters with the value.\n\nYou will see the issue when you check for duplicate records or sort the list.', 'http://makitweb.com/remove-unwanted-white-space-from-the-column-mysql/'),
(11, 'How to capture picture from webcam with Webcam.js', 'Webcam.js is a JavaScript library that allows us to capture picture from the webcam.\n\nIt uses HTML5 getUserMedia API to capture the picture. Flash is only used if the browser doesn’t support getUserMedia.', 'http://makitweb.com/how-to-capture-picture-from-webcam-with-webcam-js/'),
(12, 'Make Price Range Slider with AngularJS and PHP', 'Most of the eCommerce sites e.g. Flipkart, Snapdeal, etc have a price range slider for searching purpose.\n\nThe user doesn\'t have to enter price range manually.', 'http://makitweb.com/make-price-range-slider-with-angularjs-and-php/'),
(13, 'Create alphabetical pagination with PHP MySQL', 'The alphabetical pagination searches the records according to the first character in a specific column.\n\nYou can either manually fix the characters from A-Z or use the database table column value to create the list.', 'http://makitweb.com/create-alphabetical-pagination-with-php-mysql/'),
(14, 'Check if username exists with AngularJS', 'It is always a better idea to check the entered username exists or not if you are allowing the users to choose username while registration and wants it to be unique.\n\nWith this, the user will instantly know that their chosen username is available or not.', 'http://makitweb.com/check-if-username-exists-with-angularjs/'),
(15, 'How to avoid jQuery conflict with other JS libraries', 'By default, jQuery uses $ as an alias for jQuery because of this reason sometimes it conflicts with other JS libraries if they are also using $ as a function or variable name.', 'http://makitweb.com/how-to-avoid-jquery-conflict-with-other-js-libraries/'),
(16, 'Check if element has certain Class - jQuery', 'jQuery has inbuilt methods that allow searching for the certain class within the element.\n\nBy using them you can easily check class on the selector and perform the action according to the response.', 'http://makitweb.com/check-if-element-has-certain-class-jquery/'),
(17, 'How to show Weather widget on the Website', 'There are many sites which offer free weather widget for the website. That are easy to embed.\n\nYou only need to specify some of the mandatory fields for generating the code.', 'http://makitweb.com/how-to-show-weather-widget-on-the-website/'),
(18, 'Convert Unix timestamp to Date time with JavaScript', 'The Unix timestamp value conversion with JavaScript mainly requires when the API request response contains the date time value in Unix format and requires to show it on the screen in user readable form.', 'http://makitweb.com/convert-unix-timestamp-to-date-time-with-javascript/'),
(19, 'Make Carousel slider with Siema plugin - JavaScript', 'The Siema is a lightweight JavaScript plugin that adds carousel slider on the page. It is not dependent on any other plugins and not require to do any styling.\n\nIt is easy to setup on the page.', 'http://makitweb.com/make-carousel-slider-with-siema-plugin-javascript/'),
(20, 'Create autocomplete search with AngularJS and PHP', 'The autocomplete functionality gives the user suggestions based on its input. From there, it can select an option.\n\nIn the demonstration, I am creating a search box and display suggestion list whenever the user input value in the search box.', 'http://makitweb.com/create-autocomplete-search-with-angularjs-and-php/');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `userid`, `postid`, `rating`, `timestamp`) VALUES
(1, 2, 1, 3, '2017-07-02 13:02:11'),
(2, 2, 3, 3, '2017-07-02 13:06:10'),
(3, 2, 4, 5, '2017-07-02 13:06:14'),
(4, 2, 5, 4, '2017-07-02 13:06:16'),
(5, 3, 2, 5, '2017-07-02 13:11:33'),
(6, 4, 2, 5, '2021-01-14 13:59:24'),
(7, 4, 1, 5, '2021-01-14 13:59:22'),
(8, 4, 10, 5, '2017-07-02 21:14:29'),
(9, 4, 11, 4, '2021-01-14 13:59:40'),
(10, 1, 1, 5, '2017-07-02 23:06:32'),
(11, 1, 4, 5, '2017-07-02 23:06:42'),
(12, 1, 3, 4, '2017-07-02 23:07:10'),
(13, 1, 10, 3, '2017-07-02 23:07:18'),
(14, 1, 9, 4, '2017-07-02 23:07:23'),
(15, 1, 11, 5, '2017-07-02 23:07:27'),
(16, 1, 19, 4, '2017-07-02 23:18:27'),
(17, 1, 18, 5, '2017-07-02 23:18:29'),
(18, 1, 20, 3, '2017-07-02 23:18:31'),
(19, 1, 17, 4, '2017-07-02 23:18:35'),
(20, 1, 16, 5, '2017-07-02 23:18:37'),
(21, 1, 15, 4, '2017-07-02 23:18:38'),
(22, 1, 14, 4, '2017-07-02 23:18:40'),
(23, 1, 13, 4, '2017-07-02 23:18:41'),
(24, 1, 12, 5, '2017-07-02 23:18:43'),
(25, 1, 8, 5, '2017-07-02 23:18:47'),
(26, 1, 7, 4, '2017-07-02 23:18:49'),
(27, 1, 6, 3, '2017-07-02 23:18:51'),
(28, 1, 5, 4, '2017-07-02 23:18:52'),
(29, 1, 2, 4, '2017-07-02 23:18:54'),
(30, 2, 2, 5, '2017-07-02 23:21:30'),
(31, 2, 6, 3, '2017-07-02 23:21:35'),
(32, 2, 7, 4, '2017-07-02 23:21:37'),
(33, 2, 8, 4, '2017-07-02 23:21:39'),
(34, 2, 9, 3, '2017-07-02 23:21:40'),
(35, 2, 10, 5, '2017-07-02 23:21:42'),
(36, 2, 11, 4, '2017-07-02 23:21:44'),
(37, 2, 12, 5, '2017-07-02 23:21:46'),
(38, 2, 13, 4, '2017-07-02 23:21:47'),
(39, 2, 14, 4, '2017-07-02 23:21:50'),
(40, 2, 15, 3, '2017-07-02 23:21:52'),
(41, 2, 16, 4, '2017-07-02 23:21:56'),
(42, 2, 17, 5, '2017-07-02 23:21:59'),
(43, 2, 18, 3, '2017-07-02 23:22:02'),
(44, 2, 19, 4, '2017-07-02 23:22:05'),
(45, 2, 20, 4, '2017-07-02 23:22:07'),
(46, 3, 1, 4, '2017-07-02 23:22:32'),
(47, 3, 3, 4, '2017-07-02 23:22:35'),
(48, 3, 4, 4, '2017-07-02 23:22:37'),
(49, 3, 5, 5, '2017-07-02 23:22:38'),
(50, 3, 6, 4, '2017-07-02 23:22:40'),
(51, 3, 7, 5, '2017-07-02 23:22:45'),
(52, 3, 8, 4, '2017-07-02 23:22:47'),
(53, 3, 9, 4, '2017-07-02 23:22:49'),
(54, 3, 10, 4, '2017-07-02 23:22:51'),
(55, 3, 11, 5, '2017-07-02 23:22:52'),
(56, 3, 12, 4, '2017-07-02 23:22:54'),
(57, 3, 13, 5, '2017-07-02 23:22:56'),
(58, 3, 14, 4, '2017-07-02 23:22:57'),
(59, 3, 15, 4, '2017-07-02 23:22:59'),
(60, 3, 16, 4, '2017-07-02 23:23:00'),
(61, 3, 17, 4, '2017-07-02 23:23:02'),
(62, 3, 18, 4, '2017-07-02 23:23:03'),
(63, 3, 19, 5, '2017-07-02 23:23:05'),
(64, 3, 20, 4, '2017-07-02 23:23:11'),
(65, 4, 3, 5, '2017-07-02 23:23:33'),
(66, 4, 4, 5, '2021-01-14 13:59:26'),
(67, 4, 20, 4, '2017-07-02 23:23:40'),
(68, 4, 19, 5, '2021-01-14 13:59:30'),
(69, 4, 18, 5, '2017-07-02 23:23:45'),
(70, 4, 17, 5, '2021-01-14 13:59:33'),
(71, 4, 16, 5, '2021-01-14 13:59:35'),
(72, 4, 15, 5, '2021-01-14 13:59:36'),
(73, 4, 13, 3, '2021-01-14 13:59:38'),
(74, 4, 14, 5, '2017-07-02 23:23:53'),
(75, 4, 12, 3, '2017-07-02 23:23:55'),
(76, 4, 8, 4, '2017-07-02 23:23:58'),
(77, 4, 9, 4, '2017-07-02 23:24:00'),
(78, 4, 7, 4, '2017-07-02 23:24:02'),
(79, 4, 6, 5, '2017-07-02 23:24:03'),
(80, 4, 5, 4, '2017-07-02 23:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sPrice` int(11) NOT NULL,
  `oPrice` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `reting` varchar(255) NOT NULL,
  `short_des` varchar(3000) NOT NULL,
  `des` varchar(10000) NOT NULL,
  `Reted_Product` varchar(255) NOT NULL,
  `Selling_Product` varchar(255) NOT NULL,
  `Stock` varchar(255) NOT NULL,
  `fetcher_img` varchar(255) NOT NULL,
  `prod1` varchar(1000) NOT NULL,
  `prod2` varchar(1000) NOT NULL,
  `prod3` varchar(1000) NOT NULL,
  `prod4` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `variarble` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`) VALUES
(38, '859349', 'First Product - 1', 1000, '1234', '15', '15', '3', '5', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', 'NO', 'Best Selling', 'In Stock', '414product-2.jpg', '291product-6.jpg', '276product-2.jpg', '43product-4.jpg', '719product-17.jpg', 'Jan-09-2021', 'ON', '', '', ''),
(39, '330323', 'First Product - 2', 123, '332', '15', '17', '3', '5', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', '88product-2.jpg88product-2.jpg88product-2.jpg', 'NO', 'NO', 'In Stock', '189product-1c.jpg', '816product-1b.jpg', '367product-1c.jpg', '365product-1d.jpg', '108product-1.jpg', 'Jan-09-2021', 'ON', '', '', ''),
(40, '943401', 'First Product - 3', 111, '222', '14', '12', '3', '4', '88product-2.jpg88product-2.jpg88product-2.jpg', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', 'Top Rated', 'Best Selling', 'In Stock', '613product-12.jpg', '10product-8.jpg', '389product-8.jpg', '484product-19.jpg', '92', 'Jan-09-2021', 'ON', '', '', ''),
(41, '521077', 'Nayondfadsfds', 444, '456', '6', '9', '1', '4', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', '88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg88product-2.jpg', 'Top Rated', 'NO', 'In Stock', '247product-10.jpg', '411product-18.jpg', '826product-22.jpg', '72product-9.jpg', '804product-16.jpg', 'Jan-09-2021', 'ON', '', '', ''),
(42, '752866', 'Head Phone -2', 1234, '4322', '15', '17', '1', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.', 'Top Rated', 'NO', 'Out Of Stock', '485product-17.jpg', '965product-16.jpg', '474product-17.jpg', '334product-14.jpg', '77', 'Jan-10-2021', 'ON', '', '', ''),
(43, '663778', 'Product -5', 100, '333', '14', '12', '1', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.', 'Top Rated', 'Best Selling', 'In Stock', '471product-4.jpg', '515product-3.jpg', '299product-11.jpg', '45product-11.jpg', '218product-12.jpg', 'Jan-09-2021', 'OFF', '', '', ''),
(44, '144828', 'NAYON TALUKDER', 650, '980', '15', '15', '1', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum.\r\n\r\n', 'Top Rated', 'NO', 'In Stock', '701568025683HenL6lSt.png', '1401568025423UQNFrvNh.png', '5771568025683HenL6lSt.png', '7251568025683HenL6lSt.png', '129', 'Jan-11-2021', 'ON', '', '', ''),
(45, '985416', 'NAYON TALUKDER', 444, '3566', '13', 'No Sub Category Fund', '3', '2', 'INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)', 'INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)', 'NO', 'Best Selling', 'Out Of Stock', '4771568025872cCRVsp2k.png', '101568025818Iu033mHq.png', '2941568025774B3MU5tJK.png', '1261568025774B3MU5tJK.png', '8351568026462TxRJ07FG.png', 'Jan-11-2021', 'ON', '', '', ''),
(46, '463437', 'Product-varable', 444, '3566', '6', '9', '1', '5', 'INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)', 'INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)INSERT INTO `product`(`id`, `invoice`, `name`, `sPrice`, `oPrice`, `category`, `sub_category`, `brand`, `reting`, `short_des`, `des`, `Reted_Product`, `Selling_Product`, `Stock`, `fetcher_img`, `prod1`, `prod2`, `prod3`, `prod4`, `date`, `status`, `variarble`, `color`, `size`)', 'NO', 'Best Selling', 'In Stock', '7101568027534O1QEBPpR.png', '1341568026881R8KnUyJv.png', '9741568027558gLSECTIh.png', '7521568027493eLqHNoZP.png', '7661568027603i5UAZiKB.png', 'Jan-11-2021', 'ON', '', '', ''),
(47, '124056', 'Valiant product -5', 352, '860', '8', '', '3', '2', 'If you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\n', 'If you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\n', 'NO', 'NO', 'In Stock', '361568027493eLqHNoZP.png', '1361568027534O1QEBPpR.png', '5751568027603i5UAZiKB.png', '5051568027603i5UAZiKB.png', '894', 'Jan-14-2021', 'ON', 'Variable product', '#FF0303-#0E0C28-#47B17E', 'lg-XL-LS'),
(48, '374469', 'Variant Product ', 444, '980', '14', '12', '3', '3', 'If you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\n', 'If you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\n', 'Top Rated', 'Best Selling', 'In Stock', '7631568025683HenL6lSt.png', '9141568025423UQNFrvNh.png', '7371568025683HenL6lSt.png', '2841568025774B3MU5tJK.png', '4941568025774B3MU5tJK.png', 'Jan-11-2021', 'ON', 'Variable product', '#FF0303-#0E0C28', 'lg,XL');

-- --------------------------------------------------------

--
-- Table structure for table `roket`
--

CREATE TABLE `roket` (
  `id` int(11) NOT NULL,
  `roket` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `roket_details` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roket`
--

INSERT INTO `roket` (`id`, `roket`, `number`, `roket_details`, `status`) VALUES
(1, 'রকেট ', '1814569747', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a ', 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category`) VALUES
(9, 6, 'T-Shart'),
(10, 6, 'Sari'),
(11, 6, 'Praju'),
(12, 14, 'iPhone'),
(13, 14, 'Vevo'),
(14, 14, 'Rel-me'),
(15, 15, 'Watch'),
(16, 15, 'Phone Back Cover'),
(17, 15, 'Head Phone'),
(18, 5, 't-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qyt` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `name`, `color`, `size`, `pid`, `price`, `qyt`, `img`, `invoice`, `userID`, `total`) VALUES
(16, 'NAYON TALUKDER', '', '', '44', '650', '1', '701568025683HenL6lSt.png', '144828', '18', '650');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `name`, `color_code`) VALUES
(1, 'red', '#FF0303'),
(5, 'Black', '#0E0C28'),
(7, '5CABFF', '#5CABFF'),
(8, '47B17E', '#47B17E');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_compay_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_cutry` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `user_shoping_note` varchar(255) NOT NULL,
  `order_total_price` float NOT NULL,
  `paymet_status` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `ship` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `user_name`, `user_compay_name`, `user_email`, `user_cutry`, `user_city`, `user_state`, `user_number`, `user_address`, `zip`, `user_shoping_note`, `order_total_price`, `paymet_status`, `payment_type`, `order_status`, `order_date`, `invoice`, `ship`) VALUES
(1, 16, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', 'Pirojpur', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', 'lorem', 2876, 'Cancel', 'Bkask', 'Pending', '13-01-2021 06:01:33', '3665', 'Out Dhaka'),
(2, 16, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', '01760058205', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', 'PHP$95. bKash Payment Gateway integration for Raw PHP website. 3 Days DeliveryUnlimited Revisions. 1 Page Mined/Scraped; 1 Source Mine ...\r\n$95.00 to $190.00', 2413, 'Complete', 'নগদ', 'Shipping', '13-01-2021 07:01:25', '7977', 'Out Dhaka'),
(3, 17, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', '01760058205', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', 'My personal order', 25832, 'Complete', 'ক্যাশ অন ডেলিভারি', 'Complete', '13-01-2021 09:01:02', '6460', 'In Dhaka'),
(4, 18, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', 'Pirpjpur', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', 'If you are really looking for design control over checkboxes though, your best bet is to do the \"hidden\" checkbox and style an adjacent element such as a div.\r\n\r\nIf you are really looking for design control over checkboxes though, your best bet is to do t', 764, 'Shipped', 'রকেট', 'Cancel', '14-01-2021 03:01:06', '1381', 'In Dhaka'),
(5, 16, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', 'Pirojpru', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', ' Type You Note\'s....', 1468, 'Pending', 'ক্যাশ অন ডেলিভারি', 'Pending', '14-01-2021 08:01:19', '1690', 'In Dhaka'),
(6, 16, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', '01760058205', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', ' Type You Note\'s....', 1984, 'Pending', 'বিকাশ', 'Pending', '14-01-2021 10:01:22', '9292', 'Out Dhaka'),
(7, 16, 'NAYON TALUKDER', 'N/A', 'freelancer4747@gmail.com', 'Bangladesh', '01760058205', 'Barisal', '01760058205', 'Nadmula, Bhandaria, Pirojpur', '8550', ' Type You Note\'s....', 710, 'Complete', 'বিকাশ', 'Complete', '14-01-2021', '9984', 'In Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_img`, `product_qty`, `product_size`, `product_color`) VALUES
(1, '1', '16', '38', 'First Product - 1', '1000', '414product-2.jpg', '1', '', ''),
(2, '1', '16', '41', 'Nayondfadsfds', '444', '247product-10.jpg', '2', '', ''),
(3, '1', '16', '48', 'Variant Product ', '444', '7631568025683HenL6lSt.png', '2', 'XL', '#FF0303'),
(4, '2', '16', '47', 'Valiant product -5', '352', '361568027493eLqHNoZP.png', '3', '', ''),
(5, '2', '16', '39', 'First Product - 2', '123', '189product-1c.jpg', '3', '', ''),
(6, '2', '16', '46', 'Product-varable', '444', '7101568027534O1QEBPpR.png', '2', '', ''),
(7, '3', '17', '48', 'Variant Product ', '444', '7631568025683HenL6lSt.png', '3', 'XL', '#FF0303,#0E0C28'),
(8, '3', '17', '45', 'NAYON TALUKDER', '444', '4771568025872cCRVsp2k.png', '10', '', ''),
(9, '3', '17', '38', 'First Product - 1', '1000', '414product-2.jpg', '20', '', ''),
(10, '4', '18', '47', 'Valiant product -5', '352', '361568027493eLqHNoZP.png', '2', '', '#FF0303,#47B17E'),
(11, '5', '16', '47', 'Valiant product -5', '352', '361568027493eLqHNoZP.png', '4', 'lg', '#FF0303'),
(12, '6', '16', '44', 'NAYON TALUKDER', '650', '701568025683HenL6lSt.png', '1', '', ''),
(13, '6', '16', '42', 'Head Phone -2', '1234', '485product-17.jpg', '1', '', ''),
(14, '7', '16', '44', 'NAYON TALUKDER', '650', '701568025683HenL6lSt.png', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_info`
--

CREATE TABLE `tbl_pay_info` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `bkash_number` varchar(255) NOT NULL,
  `bkash_tr_id` varchar(255) NOT NULL,
  `nogod_number` varchar(255) NOT NULL,
  `nogod_tr_id` varchar(255) NOT NULL,
  `roket_number` varchar(255) NOT NULL,
  `roket_tr_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pay_info`
--

INSERT INTO `tbl_pay_info` (`id`, `order_id`, `user_id`, `payment_type`, `bkash_number`, `bkash_tr_id`, `nogod_number`, `nogod_tr_id`, `roket_number`, `roket_tr_id`) VALUES
(1, '1', '16', 'বিকাশ', '01814569747', 'xjWi6#js', '', '', '', ''),
(2, '2', '16', 'নগদ', '', '', '01814569784', 'hJA76HS', '', ''),
(3, '3', '17', 'ক্যাশ অন ডেলিভারি', '', '', '', '', '', ''),
(4, '4', '18', 'রকেট', '', '', '', '', '01814569474', ''),
(5, '5', '16', 'ক্যাশ অন ডেলিভারি', '', '', '', '', '', ''),
(6, '6', '16', 'বিকাশ', '01814569747', 'xjWi6#js', '', '', '', ''),
(7, '7', '16', 'বিকাশ', '01814569747', 'xjWi6#js', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `ret` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `rev` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `pid`, `ret`, `nick`, `sum`, `rev`, `date`) VALUES
(4, '47', 5, '', '', '', '14/01/2021'),
(5, '47', 4, '', '', '', '14/01/2021'),
(6, '47', 4, 'Jhumu', 'Yes,  I think it is good', 'Yes,  I think it is good', '14/01/2021'),
(7, '47', 1, 'Jhumu', 'Yes,  I think it is good', 'Yes,  I think it is good', '14/01/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo`
--

CREATE TABLE `tbl_seo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `keyw` varchar(1000) NOT NULL,
  `des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_seo`
--

INSERT INTO `tbl_seo` (`id`, `title`, `tag`, `keyw`, `des`) VALUES
(1, 'Ecommerce product ', 'tag, tag, tag,', 'keyword', 'Description, ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_another`
--

CREATE TABLE `tbl_ship_another` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_compay_name` varchar(255) NOT NULL,
  `user_cutry` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `order_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ship_another`
--

INSERT INTO `tbl_ship_another` (`id`, `user_id`, `user_name`, `user_compay_name`, `user_cutry`, `user_city`, `user_state`, `user_number`, `user_address`, `zip`, `order_id`) VALUES
(1, '16', 'NAYON TALUKDER', 'N/A', 'Bangladesh', '', 'Barisal', '', 'Nadmula, Bhandaria, Pirojpur', '8550', '1'),
(2, '17', 'NAYON TALUKDER', 'N/A', 'Bangladesh', '', 'Barisal', '', 'Nadmula, Bhandaria, Pirojpur', '8550', '3'),
(3, '18', 'NAYON TALUKDER', 'N/A', 'Bangladesh', '', 'Dhaka', '', 'Nadmula, Bhandaria, Pirojpur', '8550', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_setting`
--

CREATE TABLE `tbl_site_setting` (
  `id` int(11) NOT NULL,
  `header_tex` varchar(255) NOT NULL,
  `header_num` varchar(255) NOT NULL,
  `footer_des` varchar(1000) NOT NULL,
  `footer_wrk` varchar(1000) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `inst` varchar(255) NOT NULL,
  `ytb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_site_setting`
--

INSERT INTO `tbl_site_setting` (`id`, `header_tex`, `header_num`, `footer_des`, `footer_wrk`, `fb`, `inst`, `ytb`) VALUES
(7, 'Comming Soon', '01814569747', 'Lorem Ipsum is simply dummy text of the print and typesetting industry. Ut pharetra augue nec augue.', 'Monday-Friday: 8.30 a.m. - 5.30 p.m.\r\nSaturday: 9.00 a.m. - 2.00 p.m.\r\nSunday: Closed', 'http://localhost/eCdfsdommerce/admin/site-setting.php', 'http://localhost/eCommerce/admin/site-setting.php', 'http://localhost/eCommerce/admin/site-setting.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `size`) VALUES
(2, 'lg'),
(3, 'XL'),
(5, 'LS'),
(6, 'MS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`) VALUES
(12, 'Nayon', 'n@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'NAYON TALUKDER', ' na@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'NAYON TALUKDER', 'c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'NAYON TALUKDER', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'Nayon', 'nayon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Taiba', 'taiba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'jhumu', 'jhumu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zoon`
--

CREATE TABLE `tbl_zoon` (
  `id` int(11) NOT NULL,
  `zoon_name` varchar(255) NOT NULL,
  `zoon_price` varchar(255) NOT NULL,
  `zoon_slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zoon`
--

INSERT INTO `tbl_zoon` (`id`, `zoon_name`, `zoon_price`, `zoon_slug`, `status`) VALUES
(3, 'ঢাকার ভিতরে', '100', 'in_dhaka', 'Publish'),
(4, 'ঢাকার বাহিরে ', '50', 'Out Of Dhaka', 'Publish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkash`
--
ALTER TABLE `bkash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_on`
--
ALTER TABLE `cash_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nogod`
--
ALTER TABLE `nogod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roket`
--
ALTER TABLE `roket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category` (`category_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pay_info`
--
ALTER TABLE `tbl_pay_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_another`
--
ALTER TABLE `tbl_ship_another`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zoon`
--
ALTER TABLE `tbl_zoon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bkash`
--
ALTER TABLE `bkash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash_on`
--
ALTER TABLE `cash_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nogod`
--
ALTER TABLE `nogod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `roket`
--
ALTER TABLE `roket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pay_info`
--
ALTER TABLE `tbl_pay_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ship_another`
--
ALTER TABLE `tbl_ship_another`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_site_setting`
--
ALTER TABLE `tbl_site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_zoon`
--
ALTER TABLE `tbl_zoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `parent_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
