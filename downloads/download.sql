-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 04:30 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `download`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`, `position`) VALUES
(1, 'IDE', 1),
(2, 'Code Editor', 2),
(5, 'Source Code', 2),
(6, 'Software', 3),
(7, 'Tool & Support', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE IF NOT EXISTS `Items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_url` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `download_url` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `modified_date` int(11) NOT NULL,
  `modified_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`id`, `category_id`, `title`, `content`, `image_url`, `download_url`, `created_date`, `created_id`, `modified_date`, `modified_id`) VALUES
(1, 1, 'JetBrains WebStorm', '<h3>The smartest editor</h3>\r\n\r\n<p>Use the full power of the modern JavaScript ecosystem &ndash; WebStorm&rsquo;s got you covered! Enjoy the intelligent code completion, on-the-fly error detection, powerful navigation and refactoring for JavaScript, TypeScript, stylesheet languages, and the most popular frameworks.</p>\r\n\r\n<p>Web</p>\r\n\r\n<ul>\r\n	<li>Angular</li>\r\n	<li>React</li>\r\n	<li>Vue.js</li>\r\n</ul>\r\n\r\n<p>Mobile</p>\r\n\r\n<ul>\r\n	<li>Ionic</li>\r\n	<li>Cordova</li>\r\n	<li>React Native</li>\r\n</ul>\r\n\r\n<p>Server</p>\r\n\r\n<ul>\r\n	<li>Node.js</li>\r\n	<li>Meteor</li>\r\n</ul>\r\n\r\n<p>Desktop</p>\r\n\r\n<ul>\r\n	<li>Electron</li>\r\n</ul>\r\n\r\n<h3>Debugger</h3>\r\n\r\n<p>Debug your client-side and Node.js apps with ease in the IDE &ndash; put breakpoints right in the source code, explore the call stack and variables, set watches, and use the interactive console.</p>\r\n\r\n<h3>Seamless tool integration</h3>\r\n\r\n<p>Take advantage of linters, build tools, test runners, REST client, and more tools, all deeply integrated with the IDE. But any time you need Terminal, it&#39;s also available as an IDE tool window.</p>\r\n\r\n<h3>Unit testing</h3>\r\n\r\n<p>Run and debug tests with Karma, Mocha, Protractor, and Jest in WebStorm. Immediately see test statuses right in the editor, or in a handy treeview from which you can quickly jump to the test.</p>\r\n\r\n<h3>Integration with VCS</h3>\r\n\r\n<p>Use a simple unified UI to work with Git, GitHub, Mercurial, and other VCS. Commit files, review changes and resolve conflicts with a visual diff/merge tool right in the IDE.</p>\r\n', '/uploads/items/1516540040_f2b46121659c2dbe57b29540df117ba9.png', 'https://www.jetbrains.com/webstorm/download/', 1516358781, 1, 1516540056, 1),
(2, 1, 'PHPStorm', '<h3>PhpStorm deeply&nbsp;<br />\r\nunderstands your code.</h3>\r\n\r\n<p>Major frameworks supported</p>\r\n\r\n<p>PhpStorm is perfect for working with Symfony, Drupal, WordPress, Zend Framework, Laravel, Magento, Joomla!, CakePHP, Yii, and other frameworks.</p>\r\n\r\n<h3>All PHP tools</h3>\r\n\r\n<p>The editor actually &#39;gets&#39; your code and deeply understands its structure, supporting all PHP language features for modern and legacy projects. It provides the best code completion, refactorings, on-the-fly error prevention, and more.</p>\r\n\r\n<h3>Front-end technologies included</h3>\r\n\r\n<p>Make the most of the cutting edge front-end technologies, such as HTML5, CSS, Sass, Less, Stylus, CoffeeScript, TypeScript, Emmet, and JavaScript, with refactorings, debugging and unit testing available. See changes instantly in the browser thanks to Live Edit.</p>\r\n\r\n<h3>Built-in developer tools</h3>\r\n\r\n<p>Perform many routine tasks right from the IDE, thanks to Version Control Systems integration, support for remote deployment, databases/SQL, command-line tools, Vagrant, Composer, REST Client, and many other tools.</p>\r\n\r\n<h3>PhpStorm = WebStorm + PHP + DB/SQL</h3>\r\n\r\n<p>All the features of WebStorm are included into PhpStorm, and full-fledged support for PHP and Databases/SQL support are added on top.</p>\r\n', '/uploads/items/1516540312_4c1f4f708c673cf2decebd91fb6bb8ec.png', 'https://www.jetbrains.com/phpstorm/download/', 1516358781, 1, 1516540312, 1),
(3, 2, 'ATOM', '<p>Atom is a text editor that&#39;s modern, approachable, yet hackable to the core&mdash;a tool you can customize to do anything but also use productively without ever touching a config file.</p>\r\n', '/uploads/items/1516540264_79357086e233c3e549b3a4fa965bbffb.png', 'https://atom.io/', 1516358781, 1, 1516540264, 1),
(4, 1, 'Microsoft Visual Studio 2017 Community (Free)', '<p>A free, fully featured, and extensible solution for individual developers to create applications for Android, iOS, Windows, and the web. Please see the&nbsp;<a href="https://www.visualstudio.com/news/releasenotes/vs2017-relnotes">Release Notes</a>&nbsp;for more information.</p>\r\n\r\n<p>Navigate, write, and fix your code fast</p>\r\n\r\n<p>Visual Studio for Mac enables you to write code accurately and efficiently without losing the current file context. You can easily zoom into details such as call structure, related functions, check-ins, and test status. You can also leverage our functionality to refactor, identify, and fix code issues.</p>\r\n', '/uploads/items/1516540194_68d60250ee9335d91247d2659d7e6cfa.png', 'https://www.jetbrains.com/webstorm/download/', 1516538874, 1, 1516540240, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Administrator', 'e10adc3949ba59abbe56e057f20f883e', 'prosandaru@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
