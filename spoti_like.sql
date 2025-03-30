-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 30, 2025 at 01:58 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spoti_like`
--

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `year`, `image`, `embed`, `artist_id`, `created`, `modified`) VALUES
(1, 'True', '2013-09-13', 'https://imgs.search.brave.com/8ifIRdPvnrGx1RSppSOdMa7LdH1FuGdfVpF2fTpHsyA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly92aWN0/cm9sYS5jb20vY2Ru/L3Nob3AvcHJvZHVj/dHMvMjMwNzQ1NV8y/N2M0NmQzOC1mZGQ3/LTQ4MDctOWM5Ni0y/MWFjOTFhN2YzZTZf/NzAweDcwMC5qcGc_/dj0xNjk1Njg4NDI5', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/album/2H6i2CrWgXE1HookLu8Au0?utm_source=generator&theme=0\" width=\"100%\" height=\"322\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 1, '2025-03-24 14:16:14', '2025-03-25 15:13:34'),
(2, 'Good Girl Gone bad', '2007-05-31', '', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/album/3JSWZWeTHF4HDGt5Eozdy7?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 2, '2025-03-26 11:16:00', '2025-03-26 11:22:35'),
(3, 'Cowboy Carter', '2024-03-29', '', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/album/6BzxX6zkDsYKFJ04ziU5xQ?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 4, '2025-03-26 11:24:05', '2025-03-26 11:24:05'),
(4, 'The Beatles', '1968-11-22', '', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/album/1klALx0u4AavZNEvC4LrTL?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 5, '2025-03-26 13:21:08', '2025-03-26 13:21:08');

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `bio`, `image`, `created`, `modified`) VALUES
(1, 'Avici ', 'Tim Bergling (8 September 1989 – 20 April 2018), known professionally as Avicii, was a Swedish DJ, remixer, and record producer.', 'https://imgs.search.brave.com/wCRv9IPSmdq8nEsIKoQm-Mf07HIQDyFLV-dqZOZVS8E/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy84/LzgzL0F2aWNpaV8y/MDE0XzAwM2NyLmpw/Zw', '2025-03-24 14:01:34', '2025-03-25 15:10:11'),
(2, 'Rihanna', 'Rihanna (Robyn Rihanna Fenty), née le 20 février 1988 à la Barbade, est une chanteuse, actrice et femme d’affaires. Révélée en 2005 avec Pon de Replay, elle enchaîne les succès mondiaux comme Umbrella, Diamonds et We Found Love. Lauréate de plusieurs Grammy Awards, elle est aussi une icône de la mode et une entrepreneure à succès avec sa marque Fenty. Son influence s\'étend bien au-delà de la musique, faisant d\'elle l\'une des artistes les plus puissantes de sa génération.', 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Rihanna_During_Interview_with_Access_Hollywood_November_8%2C_2024.png', '2025-03-26 09:11:50', '2025-03-26 09:11:50'),
(3, 'Skrillex', 'Skrillex (Sonny John Moore), né le 15 janvier 1988 à Los Angeles, est un DJ, producteur et compositeur américain. D\'abord chanteur du groupe From First to Last, il se lance en solo et révolutionne la musique électronique avec son style dubstep percutant. Ses titres comme Scary Monsters and Nice Sprites et Bangarang lui valent plusieurs Grammy Awards. Figure majeure de l’électro, il collabore avec de nombreux artistes et influence profondément la scène musicale moderne.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/From_First_To_Last_-_Emo_Nite_2_-_PH_Carl_Pocket_%28cropped%29.jpg/500px-From_First_To_Last_-_Emo_Nite_2_-_PH_Carl_Pocket_%28cropped%29.jpg', '2025-03-26 09:12:41', '2025-03-26 09:12:41'),
(4, 'Beyonce', 'Beyoncé (Beyoncé Giselle Knowles-Carter), née le 4 septembre 1981 à Houston, est une chanteuse, danseuse et femme d’affaires américaine. Révélée avec Destiny’s Child, elle entame une carrière solo à succès avec des hits comme Crazy in Love, Single Ladies et Halo. Lauréate de multiples Grammy Awards, elle est une icône de la musique, de la mode et du féminisme. Avec son mari Jay-Z, elle forme l’un des couples les plus influents de l’industrie musicale.', 'https://assets.vogue.com/photos/6633a836ac2e55bf3acfc1f3/master/pass/GettyImages-2123633765.jpg', '2025-03-26 09:13:40', '2025-03-26 09:19:05'),
(5, 'The beatles', 'ChatGPT said:\r\nThe Beatles est un groupe de rock britannique formé en 1960 à Liverpool, composé de John Lennon, Paul McCartney, George Harrison et Ringo Starr. Révolutionnant la musique avec des albums légendaires comme Sgt. Pepper’s Lonely Hearts Club Band et Abbey Road, ils marquent l’histoire avec des hits comme Hey Jude, Let It Be et Yesterday. Véritables icônes culturelles, ils restent l’un des groupes les plus influents de tous les temps.', 'https://www.excelsior.com.mx/media/inside-the-note/pictures/2025/01/16/the_beatles_2.jpeg', '2025-03-26 09:21:09', '2025-03-26 09:21:09'),
(6, 'SDM', 'SDM, de son vrai nom Beni Mosabu, est un rappeur français originaire de Clamart. Révélé par son style percutant et mélodique, il signe chez 92i, le label de Booba. Son premier album Ocho (2021) connaît un grand succès avec des titres comme Daddy et Bolide Allemand. Avec son flow puissant et ses collaborations prestigieuses, SDM s’impose comme une figure montante du rap français.', 'https://artistes-productions.com/wp-content/uploads/2024/03/sdm.png', '2025-03-26 09:22:25', '2025-03-26 09:22:25');

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `album_id`, `artist_id`, `created`, `modified`) VALUES
(2, 2, 1, NULL, '2025-03-25 18:33:11', '2025-03-25 18:33:11'),
(3, 2, NULL, 1, '2025-03-25 19:04:29', '2025-03-25 19:04:29'),
(4, 4, NULL, 1, '2025-03-25 19:29:04', '2025-03-25 19:29:04'),
(5, 2, 3, NULL, '2025-03-26 11:24:19', '2025-03-26 11:24:19'),
(6, 2, NULL, 4, '2025-03-26 13:17:03', '2025-03-26 13:17:03'),
(7, 5, NULL, 5, '2025-03-26 13:17:48', '2025-03-26 13:17:48'),
(8, 5, NULL, 3, '2025-03-26 13:18:17', '2025-03-26 13:18:17'),
(9, 5, NULL, 2, '2025-03-26 13:18:28', '2025-03-26 13:18:28'),
(10, 5, 4, NULL, '2025-03-26 13:21:41', '2025-03-26 13:21:41');

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `album_id`, `artist_id`, `created`, `modified`) VALUES
(1, 4, 1, NULL, '2025-03-25 21:14:59', '2025-03-25 21:14:59'),
(2, 4, NULL, 1, '2025-03-25 21:19:48', '2025-03-25 21:19:48'),
(3, 2, NULL, 2, '2025-03-26 11:24:31', '2025-03-26 11:24:31'),
(4, 2, NULL, 4, '2025-03-26 13:17:02', '2025-03-26 13:17:02'),
(5, 5, NULL, 5, '2025-03-26 13:17:46', '2025-03-26 13:17:46'),
(6, 5, NULL, 3, '2025-03-26 13:18:15', '2025-03-26 13:18:15'),
(7, 5, NULL, 2, '2025-03-26 13:18:27', '2025-03-26 13:18:27'),
(8, 5, 4, NULL, '2025-03-26 13:21:40', '2025-03-26 13:21:40');

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `type`, `status`, `content`, `user_id`, `created`, `modified`) VALUES
(1, 'artists', 'rejected', 'Rihanna', 4, '2025-03-25 08:38:33', '2025-03-25 08:59:52'),
(2, 'artist', 'rejected', 'Rihanna', 2, '2025-03-25 08:53:31', '2025-03-25 08:59:54'),
(3, 'artist', 'rejected', 'Rihanna', 2, '2025-03-25 08:54:30', '2025-03-25 08:59:56'),
(4, 'artists', 'rejected', 'moi', 2, '2025-03-26 08:09:18', '2025-03-26 08:09:26'),
(5, 'albums', 'accepted', 'The beatles des beatles', 5, '2025-03-26 13:19:35', '2025-03-26 13:19:50');

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `duration`, `album_id`, `artist_id`, `created`, `modified`) VALUES
(1, 'Wake me up', 249, 1, 1, '2025-03-24 14:17:29', '2025-03-24 14:17:29');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created`, `modified`) VALUES
(2, 'Admin', 'admin@spotify.com', '$2y$10$wJl6d6VquUxOq9zwPz6gVebslehsCswMvlS.0IDIWNVicyZMrzqZq', 'Admin', '2025-03-24 15:38:22', '2025-03-24 15:38:22'),
(4, 'Victor Hugo', 'victor@hugo.com', '$2y$10$CekfPqyzvON3pyYemq.tteovD2Th0/FcbZUFqBLWi6hy.O6QojIgm', 'user', '2025-03-24 21:49:37', '2025-03-24 21:49:37'),
(5, 'Babar', 'babar@gmail.com', '$2y$10$dafvYfssnpdpTxmqnT742OqhfqXJobyVF8g47pb4TecuKA3XV6FEa', 'user', '2025-03-26 13:16:30', '2025-03-26 13:16:30'),
(6, 'mew', 'mew@gmail.com', '$2y$10$xc2PIgNdkJ7JO9yYlWqoh.S25L4111JeavTa/ZNsHnujZvDDObyw2', 'user', '2025-03-26 13:16:51', '2025-03-26 13:16:51'),
(7, 'Test', 'test@gmail.com', '$2y$10$/4WOcpsAvWV3M0iLFVgCbOKjRHOVOSvwa1u5fGd5ZEFZyxwLdPbI6', 'user', '2025-03-27 13:30:03', '2025-03-27 13:30:03'),
(8, 'bastien', 'bastien@gmail.com', '$2y$10$5S9zrX2hq/F6NWQlQSUCq.Bp6NpJyw5cTP0B04UBSr88f7FzvuLmu', 'user', '2025-03-27 13:37:21', '2025-03-27 13:37:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
