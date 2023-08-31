-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2023 a las 17:07:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aa2forum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `userID` int(11) NOT NULL,
  `threadID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`postId`, `message`, `userID`, `threadID`) VALUES
(1, 'Have you tried inserting the hardrive again?', 2, 1),
(2, 'OMG you saved me, i hava my school learning activity php project there!!!', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threads`
--

CREATE TABLE `threads` (
  `threadID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `messagge` varchar(500) NOT NULL,
  `userID` int(11) NOT NULL,
  `topicID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `threads`
--

INSERT INTO `threads` (`threadID`, `name`, `messagge`, `userID`, `topicID`) VALUES
(1, 'My laptop dont booot', 'I remove the hard drive and now my laptop dont boot into windows, what can i do?', 1, 1),
(2, 'Windows crash', 'Lorem ipsum dolor', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `topicID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`topicID`, `name`) VALUES
(1, 'Laptops'),
(2, 'Desktops');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `name`, `email`, `role`) VALUES
(1, 'pepe123', 'f80812a241d2f679702f36081555694e', 'Pepe pepe', 'pepe@pepe.com', 'user'),
(2, 'admin', 'f80812a241d2f679702f36081555694e', 'Admin admin', 'admin@admin.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `FK_userID_post` (`userID`),
  ADD KEY `FK_threadID_post` (`threadID`);

--
-- Indices de la tabla `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threadID`),
  ADD KEY `FK_userID_thread` (`userID`),
  ADD KEY `FK_topicID_thread` (`topicID`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `threads`
--
ALTER TABLE `threads`
  MODIFY `threadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_threadID_post` FOREIGN KEY (`threadID`) REFERENCES `threads` (`threadID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_userID_post` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `FK_topicID_thread` FOREIGN KEY (`topicID`) REFERENCES `topics` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_userID_thread` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
