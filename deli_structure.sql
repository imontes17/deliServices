-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2018 a las 21:06:03
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 5.6.32-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deli`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_categories`
--

CREATE TABLE `deli_categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(45) NOT NULL,
  `description_category` varchar(45) NOT NULL,
  `others` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_codes`
--

CREATE TABLE `deli_codes` (
  `id_code` int(11) NOT NULL,
  `name_code` varchar(45) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_user_codes_id_ucode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_experience`
--

CREATE TABLE `deli_experience` (
  `id_experience` int(11) NOT NULL,
  `name_experience` varchar(45) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `id_package` int(11) NOT NULL,
  `deli_restaurant_id_restaurant` int(11) NOT NULL,
  `deli_packages_id_package` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_global_achievements`
--

CREATE TABLE `deli_global_achievements` (
  `id_achievement` int(11) NOT NULL,
  `name_achievement` varchar(45) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_user_achievement_id_uachivement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_global_gift`
--

CREATE TABLE `deli_global_gift` (
  `id_gift` int(11) NOT NULL,
  `name_gift` varchar(45) NOT NULL,
  `comments` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_global_schedules`
--

CREATE TABLE `deli_global_schedules` (
  `id_schedule` int(11) NOT NULL,
  `name_schedule` varchar(45) NOT NULL,
  `schedule` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_noticia`
--

CREATE TABLE `deli_noticia` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `img_autor` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `introduccion` longtext,
  `encabezado` longtext,
  `p1` longtext,
  `p2` longtext,
  `p3` longtext,
  `p4` longtext,
  `logo` varchar(255) DEFAULT NULL,
  `img_p` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `img_sec1` varchar(255) DEFAULT NULL,
  `img_sec2` varchar(255) DEFAULT NULL,
  `img_sec3` varchar(255) DEFAULT NULL,
  `desc_img_sec1` varchar(255) DEFAULT NULL,
  `desc_img_sec2` varchar(255) DEFAULT NULL,
  `desc_img_sec3` varchar(255) DEFAULT NULL,
  `frase` varchar(255) DEFAULT NULL,
  `editorial` varchar(255) DEFAULT NULL,
  `logo_editorial` varchar(255) DEFAULT NULL,
  `sugeridos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_packages`
--

CREATE TABLE `deli_packages` (
  `id_package` int(11) NOT NULL,
  `name_package` varchar(45) NOT NULL,
  `id_product` int(11) NOT NULL,
  `deli_product_id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_packages_routes`
--

CREATE TABLE `deli_packages_routes` (
  `id_package_route` int(11) NOT NULL,
  `name_package` varchar(45) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_packages` int(11) NOT NULL,
  `deli_product_id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_product`
--

CREATE TABLE `deli_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `prize` varchar(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_restaurant`
--

CREATE TABLE `deli_restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `name_restaurant` longtext NOT NULL,
  `category` varchar(100) NOT NULL,
  `zona` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `tipo_comida` varchar(100) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `img_price` varchar(200) NOT NULL,
  `incluye` longtext NOT NULL,
  `introduccion` longtext NOT NULL,
  `p1` longtext NOT NULL,
  `p2` longtext NOT NULL,
  `p3` longtext NOT NULL,
  `logo` varchar(200) NOT NULL,
  `imagen_principal` varchar(200) NOT NULL,
  `link_video` varchar(200) NOT NULL,
  `imagen_2` varchar(200) NOT NULL,
  `imagen_3` varchar(200) NOT NULL,
  `frase` varchar(200) NOT NULL,
  `editorial` varchar(200) NOT NULL,
  `logo_editorial` varchar(200) NOT NULL,
  `sugeridos` varchar(200) NOT NULL,
  `google_maps` varchar(200) NOT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `no_ordenes_deli` int(5) NOT NULL,
  `no_ordenes_adicionales` int(5) NOT NULL,
  `deli_categories_id_category` int(11) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_restaurant_schedule`
--

CREATE TABLE `deli_restaurant_schedule` (
  `id_rschedule` int(11) NOT NULL,
  `id_restaurant` int(10) NOT NULL,
  `id_schedule` int(10) NOT NULL,
  `deli_global_schedules_id_schedule` int(11) NOT NULL,
  `deli_restaurant_id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_routes`
--

CREATE TABLE `deli_routes` (
  `id_route` int(11) NOT NULL,
  `name_route` varchar(45) NOT NULL,
  `id_package` int(11) NOT NULL,
  `deli_routes_id_route` int(11) NOT NULL,
  `deli_packages_routes_id_packages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_surveys`
--

CREATE TABLE `deli_surveys` (
  `id_survey` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `attention` int(2) NOT NULL,
  `quality` int(2) NOT NULL,
  `service` int(2) NOT NULL,
  `amenity` int(2) NOT NULL,
  `id_restaurant` int(10) NOT NULL,
  `date_registered` date NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_trivia`
--

CREATE TABLE `deli_trivia` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `incluye` varchar(255) NOT NULL,
  `vigencia` varchar(255) NOT NULL,
  `premio` double NOT NULL,
  `logoB` varchar(255) NOT NULL,
  `logoN` varchar(255) NOT NULL,
  `imgP` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user`
--

CREATE TABLE `deli_user` (
  `id` int(5) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tipo_comida` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_achievement`
--

CREATE TABLE `deli_user_achievement` (
  `id_uachivement` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_achievement` int(10) NOT NULL,
  `finished` int(2) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_categories`
--

CREATE TABLE `deli_user_categories` (
  `id_user_category` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_categories_id_category` int(11) NOT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_codes`
--

CREATE TABLE `deli_user_codes` (
  `id_ucode` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_code` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_experience`
--

CREATE TABLE `deli_user_experience` (
  `id_uexperience` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_experiende` int(10) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL,
  `deli_experience_id_experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_gifts`
--

CREATE TABLE `deli_user_gifts` (
  `id_ugifts` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_gift` int(10) NOT NULL,
  `date_gift` date NOT NULL,
  `deli_global_gift_id_gift` int(11) NOT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_routes`
--

CREATE TABLE `deli_user_routes` (
  `id_uroutes` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_route` int(11) NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `deli_routes_id_route` int(11) NOT NULL,
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deli_user_trivia`
--

CREATE TABLE `deli_user_trivia` (
  `id_utrivia` int(11) NOT NULL,
  `id_trivia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `winner` int(11) NOT NULL DEFAULT '0',
  `deli_user_sign_iddeli_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deli_categories`
--
ALTER TABLE `deli_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `deli_codes`
--
ALTER TABLE `deli_codes`
  ADD PRIMARY KEY (`id_code`);

--
-- Indices de la tabla `deli_experience`
--
ALTER TABLE `deli_experience`
  ADD PRIMARY KEY (`id_experience`);

--
-- Indices de la tabla `deli_global_achievements`
--
ALTER TABLE `deli_global_achievements`
  ADD PRIMARY KEY (`id_achievement`,`deli_user_achievement_id_uachivement`);

--
-- Indices de la tabla `deli_global_gift`
--
ALTER TABLE `deli_global_gift`
  ADD PRIMARY KEY (`id_gift`);

--
-- Indices de la tabla `deli_global_schedules`
--
ALTER TABLE `deli_global_schedules`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indices de la tabla `deli_noticia`
--
ALTER TABLE `deli_noticia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deli_packages`
--
ALTER TABLE `deli_packages`
  ADD PRIMARY KEY (`id_package`);

--
-- Indices de la tabla `deli_packages_routes`
--
ALTER TABLE `deli_packages_routes`
  ADD PRIMARY KEY (`id_packages`);

--
-- Indices de la tabla `deli_product`
--
ALTER TABLE `deli_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `deli_restaurant`
--
ALTER TABLE `deli_restaurant`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Indices de la tabla `deli_restaurant_schedule`
--
ALTER TABLE `deli_restaurant_schedule`
  ADD PRIMARY KEY (`id_rschedule`);

--
-- Indices de la tabla `deli_routes`
--
ALTER TABLE `deli_routes`
  ADD PRIMARY KEY (`id_route`);

--
-- Indices de la tabla `deli_surveys`
--
ALTER TABLE `deli_surveys`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indices de la tabla `deli_trivia`
--
ALTER TABLE `deli_trivia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deli_user`
--
ALTER TABLE `deli_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `deli_user_achievement`
--
ALTER TABLE `deli_user_achievement`
  ADD PRIMARY KEY (`id_uachivement`);

--
-- Indices de la tabla `deli_user_categories`
--
ALTER TABLE `deli_user_categories`
  ADD PRIMARY KEY (`id_user_category`);

--
-- Indices de la tabla `deli_user_codes`
--
ALTER TABLE `deli_user_codes`
  ADD PRIMARY KEY (`id_ucode`);

--
-- Indices de la tabla `deli_user_experience`
--
ALTER TABLE `deli_user_experience`
  ADD PRIMARY KEY (`id_uexperience`);

--
-- Indices de la tabla `deli_user_gifts`
--
ALTER TABLE `deli_user_gifts`
  ADD PRIMARY KEY (`id_ugifts`);

--
-- Indices de la tabla `deli_user_routes`
--
ALTER TABLE `deli_user_routes`
  ADD PRIMARY KEY (`id_uroutes`);

--
-- Indices de la tabla `deli_user_trivia`
--
ALTER TABLE `deli_user_trivia`
  ADD PRIMARY KEY (`id_utrivia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deli_categories`
--
ALTER TABLE `deli_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_codes`
--
ALTER TABLE `deli_codes`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_experience`
--
ALTER TABLE `deli_experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_global_achievements`
--
ALTER TABLE `deli_global_achievements`
  MODIFY `id_achievement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_global_gift`
--
ALTER TABLE `deli_global_gift`
  MODIFY `id_gift` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_global_schedules`
--
ALTER TABLE `deli_global_schedules`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_noticia`
--
ALTER TABLE `deli_noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `deli_packages`
--
ALTER TABLE `deli_packages`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_packages_routes`
--
ALTER TABLE `deli_packages_routes`
  MODIFY `id_packages` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_product`
--
ALTER TABLE `deli_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_restaurant`
--
ALTER TABLE `deli_restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `deli_restaurant_schedule`
--
ALTER TABLE `deli_restaurant_schedule`
  MODIFY `id_rschedule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_routes`
--
ALTER TABLE `deli_routes`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_surveys`
--
ALTER TABLE `deli_surveys`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_trivia`
--
ALTER TABLE `deli_trivia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `deli_user`
--
ALTER TABLE `deli_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `deli_user_achievement`
--
ALTER TABLE `deli_user_achievement`
  MODIFY `id_uachivement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_categories`
--
ALTER TABLE `deli_user_categories`
  MODIFY `id_user_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_codes`
--
ALTER TABLE `deli_user_codes`
  MODIFY `id_ucode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_experience`
--
ALTER TABLE `deli_user_experience`
  MODIFY `id_uexperience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_gifts`
--
ALTER TABLE `deli_user_gifts`
  MODIFY `id_ugifts` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_routes`
--
ALTER TABLE `deli_user_routes`
  MODIFY `id_uroutes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deli_user_trivia`
--
ALTER TABLE `deli_user_trivia`
  MODIFY `id_utrivia` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
