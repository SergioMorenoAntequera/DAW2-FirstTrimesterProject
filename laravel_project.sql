-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-12-2019 a las 08:22:21
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `description`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Terror', 'Se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación. Sus argumentos frecuentemente desarrollan la súbita intrusión en un ámbito de anormalidad de alguna fuerza, evento o personaje de naturaleza maligna o celestial, a menudo de origen criminal o sobrenatural. En los cines de terror es donde se produce una sensación de miedo o temor sobre las distintas causas que genera un determinado personaje o actor profesional.', NULL, NULL),
(2, 'Intriga', 'La intriga es el conjunto de sucesos, circunstancias y enredos que constituyen el argumento de una narración u obra cinematográfica y que provocan curiosidad e interés en el público hasta que se resuelven en el desenlace.', NULL, NULL),
(3, 'Amorosa', 'Se caracteriza por retratar argumentos construidos de eventos y personajes relacionados con la expresión del amor y las relaciones románticas. El cine romántico se centra en la representación de una historia amorosa de dos participantes, la cual atraviesa las principales etapas de la concepción del amor como el cortejo y el matrimonio.', NULL, NULL),
(4, 'Detectives', 'Ficción detectivesca o ficción con detectives o detectives en la literatura (en inglés detective fiction) es un subgénero de la novela negra y de la ficción de misterio y de suspense, en el que un investigador (muy a menudo un detective, ya sea profesional o amateur, ya sea o no integrante de las fuerzas oficiales) investiga un determinado crimen, a menudo un asesinato.', NULL, NULL),
(5, 'Robots', 'Una interpretación acertada de la robótica es que busca la creación de esclavos artificiales que nos sustituyan en el trabajo. Mano de obra que realice los trabajos tediosos, peligrosos o pesados que los humanos no queramos realizar. De este modo, el robot en el cine suele tener esta connotación, seres de aspecto mecánico, capaces de procesar y retener gran cantidad de datos y que actúan como nuestros servidores.', NULL, NULL),
(6, 'Zombies', 'Subgénero del cine de terror a menudo encuadrado dentro de la Clase B, pero que cuenta con una amplia representación de películas a lo largo de la historia. Como género independiente cuenta con sus propias convenciones, de las cuales la única fundamental es la presencia de los “muertos vivientes” (no confundir con el término mal traducido \"no-muertos\" del inglés \"undead\").', NULL, NULL),
(7, 'Tiburones', 'Algunos de los mejores generos que existen, se caracteriza unicamente por la centralización de la película en la aparición de tiburones. Generalmente como parte de catástrofes naturales.', NULL, NULL),
(8, 'Animación', 'El cine de animación es una categoría de cine (o de una manera general, una categoría de arte visual o audiovisual) que se caracteriza por no recurrir a la técnica del rodaje de imágenes reales sino a una o más técnicas de animación. Las técnicas tradicionales de animación han sido durante mucho tiempo el dibujo animado (dibujos planos en dos dimensiones fotografiados imagen por imagen) o la animación en volumen (modelos reducidos o marionetas, también fotografiados imagen por imagen), aunque en tiempos más recientes también se recurre a la animación por computadora.', NULL, NULL),
(9, 'Comedia', 'Obras que presentan una mayoría de escenas y situaciones humorísticas o festivas. Las comedias buscan entretener al público y generar risas, con finales que suelen ser felices. Comedia es también el género que agrupa a todas las obras de dichas características.', NULL, NULL),
(10, 'Tragedia', 'El drama es un género cinematográfico que trata situaciones generalmente no épicas en un contexto serio, con un tono y una orientación más susceptible de inspirar tristeza y compasión que risa o gracia.1​ Sin embargo, desde el punto de vista etimológico, el drama evoca acción y diálogo.2​3​', NULL, NULL),
(11, 'Tragicomedia', 'Es una obra dramática en la que se mezclan los elementos trágicos y cómicos, aunque también hay lugar para el sarcasmo y parodia. También se le conoce como pieza, porque se parece a dicho concepto; generalmente en estos están sintetizadas las características de una clase social, por lo que también se le denomina género psicológico.', NULL, NULL),
(12, 'Policias', 'Se entiende inició con Histoire d un crime, de Ferdinand Zecca en 1901. El argumento tiene generalmente una estructura sencilla, con introducción, desarrollo y desenlace. Usualmente al comienzo se ofrece al espectador los antecedentes de un grave crimen, acabando esta parte cuando efectivamente se comete dicho acto criminal y se arma el suspenso.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre_movie`
--

CREATE TABLE `genre_movie` (
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genre_movie`
--

INSERT INTO `genre_movie` (`genre_id`, `movie_id`) VALUES
(5, 1),
(1, 1),
(12, 1),
(5, 2),
(8, 2),
(12, 2),
(12, 3),
(7, 3),
(8, 3),
(6, 4),
(7, 4),
(10, 4),
(11, 5),
(4, 5),
(8, 5),
(11, 6),
(1, 6),
(7, 6),
(6, 7),
(10, 7),
(11, 7),
(9, 8),
(1, 8),
(4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(196, '2019_11_07_111017_create_users_table', 1),
(197, '2019_11_08_114233_create_genres_table', 1),
(198, '2019_11_09_121315_create_movies_table', 1),
(199, '2019_11_12_115916_create_genre_movie_table', 1),
(200, '2019_11_13_101225_create_people_table', 1),
(201, '2019_11_14_090423_create_people_act_movies_table', 1),
(202, '2019_11_14_090434_create_people_direct_movies_tablea', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `rating` double(8,1) NOT NULL,
  `cover` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filepath` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `duration`, `rating`, `cover`, `filepath`, `filename`, `external_url`, `created_at`, `updated_at`) VALUES
(1, 'Al Este del Edén', 1955, 115, 7.0, 'AlEsteDelEden.png', 'movies', 'AlEsteDelEden.mp4', 'https://www.filmaffinity.com/es/film464305.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(2, 'El niño con el pijama de rayas', 2008, 94, 6.9, 'NinoRayas.png', 'movies', 'NinoRayas.mp4', 'https://www.filmaffinity.com/es/film728544.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(3, 'La lista de Schindler', 1993, 195, 8.0, 'LalistadeSchindler.png', 'movies', 'LaListaDeSchindler.mp4', 'https://www.filmaffinity.com/es/film656153.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(4, 'Un burka por amor', 2008, 73, 5.1, 'BurkaAmor.png', 'movies', 'BurkaAmor.mp4', 'https://www.filmaffinity.com/es/film778779.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(5, 'Shrek', 2001, 87, 7.0, 'Shrek.png', 'movies', 'Shrek.mp4', 'https://www.filmaffinity.com/es/film494558.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(6, 'Shrek 2', 2004, 93, 7.3, 'Shrek2.png', 'movies', 'Shrek2.mp4', 'https://www.filmaffinity.com/es/film333949.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(7, 'Shrek 3', 2007, 92, 5.9, 'Shrek3.png', 'movies', 'Shrek3.mp4', 'https://www.filmaffinity.com/es/film416894.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(8, 'Shrek felices para siempre', 2010, 93, 5.9, 'Shrek4.png', 'movies', 'Shrek4.mp4', 'https://www.filmaffinity.com/es/film948443.html', '2019-12-04 07:12:07', '2019-12-04 07:12:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `name`, `photo`, `external_url`, `created_at`, `updated_at`) VALUES
(1, 'Cesar Vicente', 'Cesar Vicente.png', 'http://www.sensacine.com/actores/actor-860090', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(2, 'Francesco Arca', 'Francesco Arca.png', 'http://www.sensacine.com/actores/actor-595867', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(3, 'Travis Fimmel', 'Travis Fimmel.png', 'http://www.sensacine.com/actores/actor-104885', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(4, 'Jasika Nicole', 'Jasika Nicole.png', 'http://www.sensacine.com/actores/actor-155103', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(5, 'Alyssa Sutherland', 'Alyssa Sutherland.png', 'http://www.sensacine.com/actores/actor-168151', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(6, 'Freddie Highmore', 'Freddie Highmore.png', 'http://www.sensacine.com/actores/actor-97468', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(7, 'Jason Statham', 'Jason Statham.png', 'http://www.sensacine.com/actores/actor-28586', '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(8, 'Will Smith', 'Will Smith.png', 'http://www.sensacine.com/actores/actor-19358', '2019-12-04 07:12:07', '2019-12-04 07:12:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_act_movies`
--

CREATE TABLE `people_act_movies` (
  `person_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people_act_movies`
--

INSERT INTO `people_act_movies` (`person_id`, `movie_id`) VALUES
(7, 1),
(4, 1),
(8, 1),
(6, 1),
(5, 1),
(6, 2),
(2, 2),
(3, 2),
(5, 2),
(1, 2),
(2, 3),
(8, 3),
(5, 3),
(6, 3),
(4, 3),
(6, 4),
(5, 4),
(7, 4),
(2, 4),
(4, 4),
(6, 5),
(1, 5),
(5, 5),
(2, 5),
(3, 5),
(6, 6),
(1, 6),
(7, 6),
(3, 6),
(4, 6),
(2, 7),
(3, 7),
(6, 7),
(8, 7),
(7, 7),
(3, 8),
(4, 8),
(1, 8),
(5, 8),
(2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people_direct_movies`
--

CREATE TABLE `people_direct_movies` (
  `person_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people_direct_movies`
--

INSERT INTO `people_direct_movies` (`person_id`, `movie_id`) VALUES
(4, 1),
(1, 1),
(8, 2),
(4, 2),
(2, 3),
(7, 3),
(6, 4),
(2, 4),
(8, 5),
(4, 5),
(8, 6),
(3, 6),
(5, 7),
(2, 7),
(3, 8),
(5, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nick` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nick`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'user0', 'user0@email.com', '$2y$10$f2IncT4X7NRNaP.tmAh1tuLkXQXny5VYpFJnyfTdCKeWo24khE/1W', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(2, 'user1', 'user1@email.com', '$2y$10$WS9gZvviqg.4v3YOh4i.ie3LJibbJeBNALT66pdPToMLKW5RLBPNy', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(3, 'user2', 'user2@email.com', '$2y$10$A.hvj/O10mXUmBduJpHRoOUJgiuc3qbquD/71KUc2BnNPcpU8bRPO', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(4, 'user3', 'user3@email.com', '$2y$10$AFZb7L6MhtDH8R5SJYOCsezXSopzLF74Fh2T154AVSJRoR3A49o2.', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(5, 'user4', 'user4@email.com', '$2y$10$cPSrjBHqgUwJ4ycjnyCPS.aMn9jvwaYptKh4sBmI6SG7L59LuaulO', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(6, 'user5', 'user5@email.com', '$2y$10$923LARhuTPsIiJRtSC1zZ./C.rjqNBgLlKFcUv8K3qySgWsgU/mT6', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07'),
(7, 'admin', 'admin@admin.com', '$2y$10$ScTbg/Rlk/1zpeZinCNvLOeJHu3h/J/1VTETPQ35baVeH0srHk8QO', 0, '2019-12-04 07:12:07', '2019-12-04 07:12:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genres_id_index` (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nick_unique` (`nick`),
  ADD KEY `users_id_index` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
