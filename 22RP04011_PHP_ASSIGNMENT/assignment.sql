-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 août 2024 à 22:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `assignment`
--

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `reg_number` varchar(150) NOT NULL,
  `district` varchar(40) NOT NULL,
  `level` int(13) NOT NULL,
  `department` varchar(60) NOT NULL,
  `age` int(70) NOT NULL,
  `gender` enum('female','male') DEFAULT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `reg_number`, `district`, `level`, `department`, `age`, `gender`, `email`) VALUES
(1, 'IGIHOZO ', 'Patience ', '22RP04011', 'BUGESERA', 5, 'MECHTRONICS', 40, 'male', 'igihozopatience20@gmail.com'),
(2, 'mukarukundo', 'sophie', '22RP04011', 'NGORORERO', 5, 'ICT', 40, 'female', 'mukaro2022@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`) VALUES
(1, 'IGIHOZO', 'Patience', 'igihozo', 'igihozopatience20@gmail.com', '0732542541', '25d55ad283aa400af464c76d713c07ad'),
(2, 'igihozo', 'Patience', 'igihozo', 'muziranengediane@gmail.com', '0732542541', '25f9e794323b453885f5181f1b624d0b'),
(3, 'IGIHOZO', 'Patience', 'igihozo', 'mukaro2022@gmail.com', '0732542541', '25f9e794323b453885f5181f1b624d0b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
