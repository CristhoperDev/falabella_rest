-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2019 a las 01:21:47
-- Versión del servidor: 5.7.27-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_hack_falabella`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `idCat` int(10) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`idCat`, `descripcion`, `estado`) VALUES
(1, 'Gaseosas', 1),
(2, 'Snaks', 1),
(3, 'plaza vea', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detailSales`
--

CREATE TABLE `detailSales` (
  `codDetailSales` int(10) NOT NULL,
  `codBarras` bigint(14) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(10) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `descripcion`, `estado`) VALUES
(1, 'sybilla', 1),
(2, 'Fanta', 1),
(3, 'Sprite', 1),
(4, 'Frito lay', 1),
(5, 'bisini', 1),
(6, 'CHIFLES CLÁSICOS ', 1),
(7, 'GALLETA MARGARITAS ', 1),
(8, 'Galleta picaras ', 1),
(9, 'YOURT laive  100 ml', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `codBarras` bigint(14) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(150) NOT NULL,
  `idCat` int(10) DEFAULT NULL,
  `idMarca` int(10) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `peso` int(11) NOT NULL,
  `vencimiento` date NOT NULL,
  `grasa` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tipo_data` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`codBarras`, `descripcion`, `imagen`, `idCat`, `idMarca`, `precio`, `stock`, `estado`, `peso`, `vencimiento`, `grasa`, `tipo`, `tipo_data`) VALUES
(775024305037, 'CALORÍAS  220 KCAL 11%(%del VRD)\r\nGRASA TOTAL: 7g  9% (%del VRD)\r\ngrasa saturada: 2.5 g  13% (%del VRD)\r\nsodio: 190 mg 10% (%del VRD)\r\nazúcares totales: 10.3 g 11% (%del VRD)', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRxN9LoI_UgD9cc4S6GJPIf-XyGIAAQevpCeP-FkaNAzymvneZH', 3, 7, 1, 2345, 1, 46, '2020-05-03', 'evitar su consumo excesivo', 'abarrotes', 'ABARROTES,Abarrotes,Aceite,Aceite vegetal,Aceite de oliva,Aceites especiales,Arroz,Arroz extra,Arroz superior,Arroz integral y especiales,Menestras,Frijol,Lenteja,Arveja,Garbanzo,Pallar,Quinua,Otras Menestras,Azúcar y endulzantes,Endulzantes,Azúcar,Fideos y Pastas,Fideos largos,Fideos cortos,Fideos chinos,Pastas rellenas y para rellenar,Salsas,Comidas instantáneas,Purés,Sopas,Cremas,Comidas listas,Desayunos,Café,Cereales,Chocolate para taza,Complementos alimenticios,Modificadores de Leche,Mermeladas y mieles,Té e Infusiones,Confitería,Galletas Dulces,Galletas saladas,Chocolates,Caramelos y Chupetes,Gomitas y Gomas de Mascar,Otras Golosinas,Snacks y Piqueos,Papas,Camotes, chifles y yucas,Piqueos mixtos,Maíz,Pretzels,Maní, habas, pistachos y semillas,Frutos secos,Salsas y dips,Canastas Navideñas,Conservas,Frutas en conserva,Aceitunas en conserva,Verduras en conserva,Legumbres en conserva,Pescados en conserva,Mariscos en conserva,Otras Conservas,Salsas, Cremas y Condimentos,Mayonesa,Ketchup,Mostaza,Ají y rocoto,Salsas de tomate,Salsas especiales,Sal,Pimienta,Otros condimentos,Vinagre,Sillao,Aliños y vinagretas'),
(7750151002158, 'GRASA TOTAL: 1g  2% (%del VRD)\r\ngrasas saturadas 1g 4% (%del VRD)\r\nsodio 49mg  2% (%del VRD)\r\ncarbohidrtos total: 10 g  3% (%del VRD)\r\nazúcares tortales: 10 g \r\nazúcares añadidos: 5.9g \r\nproteína: 1g 3% (%del VRD)', 'https://wongfood.vteximg.com.br/arquivos/ids/157774-500-500/Yogurt-Laive-Ninos-Vainilla-Vaso-100-ml-428161002.jpg', 3, 9, 1.8, 1234, 1, 40, '2019-12-14', 'ALTO EN AZÚCAR (EVITA SU CONSUMO EXCESIVO)', 'Lácteos y huevos', 'Huevos,Huevos de Gallina,Huevos de Codorniz,Leche,Leche Fresca y UHT Larga Vida,Leche de Soya y Otras Bebidas Vegetales,Leche Evaporada y Mezclas Lácteas,Leche en Polvo,Mantequilla y Margarina,Margarina,Mantequilla,Yogurt,Yogurt Bebible,Yogurt Batido,Yogurt Frutado,Yogurt Especial y Funcional,Yogurt con Cereal'),
(7752748005924, 'proteínas: 8 g  6 % (%del VRD)\r\nCALORÍAS: 500 KCAL\r\nGRASA TOTAL: 22g  12% (%del VRD)\r\ngrasa saturada: 14g  30% (%del VRD)\r\ncoresterol: 5 mg 1% (%del VRD)\r\nsodio: 165 mg 4 % (%del VRD)\r\ncarbohidratos total: 67mg 10% (%del VRD)\r\nazúcares totales: 26 g', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQz9FpYh_HSxIzg0a5LcBzWoFGQPU8Go6w8R7pWZMVhMmkII69F', 3, 8, 1.3, 1200, 1, 40, '2020-09-24', 'ALTO EN GRASA SATURADA  , ALTO EN AZÚCAR ', 'abarrotes', 'ABARROTES,Abarrotes,Aceite,Aceite vegetal,Aceite de oliva,Aceites especiales,Arroz,Arroz extra,Arroz superior,Arroz integral y especiales,Menestras,Frijol,Lenteja,Arveja,Garbanzo,Pallar,Quinua,Otras Menestras,Azúcar y endulzantes,Endulzantes,Azúcar,Fideos y Pastas,Fideos largos,Fideos cortos,Fideos chinos,Pastas rellenas y para rellenar,Salsas,Comidas instantáneas,Purés,Sopas,Cremas,Comidas listas,Desayunos,Café,Cereales,Chocolate para taza,Complementos alimenticios,Modificadores de Leche,Mermeladas y mieles,Té e Infusiones,Confitería,Galletas Dulces,Galletas saladas,Chocolates,Caramelos y Chupetes,Gomitas y Gomas de Mascar,Otras Golosinas,Snacks y Piqueos,Papas,Camotes, chifles y yucas,Piqueos mixtos,Maíz,Pretzels,Maní, habas, pistachos y semillas,Frutos secos,Salsas y dips,Canastas Navideñas,Conservas,Frutas en conserva,Aceitunas en conserva,Verduras en conserva,Legumbres en conserva,Pescados en conserva,Mariscos en conserva,Otras Conservas,Salsas, Cremas y Condimentos,Mayonesa,Ketchup,Mostaza,Ají y rocoto,Salsas de tomate,Salsas especiales,Sal,Pimienta,Otros condimentos,Vinagre,Sillao,Aliños y vinagretas'),
(7861006731045, 'calorías: 220 kcal 11% (%del VRD)\r\nGRASA TOTAL 11g  17% (%del VRD)\r\ngrasa saturada 5g  25% (%del VRD)\r\nácidos grasos monoinsaturados 4g \r\ncoresterol o mg\r\ncarbohidratos totales 25 g 8 % (%del VRD)\r\nsodio 113 mg 5 %  (%del VRD)\r\nenergia total: calorías totales: 755 ', 'https://mimercadoenlinea.ec/6579-large_default/tortolines-chifles-clasicos-natural-45-gr-y-150-gr.jpg', 3, 6, 1.5, 2567, 1, 38, '2020-08-14', 'alto en grasa saturada ', 'abarrotes', 'ABARROTES,Abarrotes,Aceite,Aceite vegetal,Aceite de oliva,Aceites especiales,Arroz,Arroz extra,Arroz superior,Arroz integral y especiales,Menestras,Frijol,Lenteja,Arveja,Garbanzo,Pallar,Quinua,Otras Menestras,Azúcar y endulzantes,Endulzantes,Azúcar,Fideos y Pastas,Fideos largos,Fideos cortos,Fideos chinos,Pastas rellenas y para rellenar,Salsas,Comidas instantáneas,Purés,Sopas,Cremas,Comidas listas,Desayunos,Café,Cereales,Chocolate para taza,Complementos alimenticios,Modificadores de Leche,Mermeladas y mieles,Té e Infusiones,Confitería,Galletas Dulces,Galletas saladas,Chocolates,Caramelos y Chupetes,Gomitas y Gomas de Mascar,Otras Golosinas,Snacks y Piqueos,Papas,Camotes, chifles y yucas,Piqueos mixtos,Maíz,Pretzels,Maní, habas, pistachos y semillas,Frutos secos,Salsas y dips,Canastas Navideñas,Conservas,Frutas en conserva,Aceitunas en conserva,Verduras en conserva,Legumbres en conserva,Pescados en conserva,Mariscos en conserva,Otras Conservas,Salsas, Cremas y Condimentos,Mayonesa,Ketchup,Mostaza,Ají y rocoto,Salsas de tomate,Salsas especiales,Sal,Pimienta,Otros condimentos,Vinagre,Sillao,Aliños y vinagretas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `detailSales`
--
ALTER TABLE `detailSales`
  ADD PRIMARY KEY (`codDetailSales`),
  ADD KEY `codBarras` (`codBarras`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`codBarras`),
  ADD KEY `idCat` (`idCat`),
  ADD KEY `idMarca` (`idMarca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idCat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `detailSales`
--
ALTER TABLE `detailSales`
  MODIFY `codDetailSales` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detailSales`
--
ALTER TABLE `detailSales`
  ADD CONSTRAINT `detailSales_ibfk_1` FOREIGN KEY (`codBarras`) REFERENCES `products` (`codBarras`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categories` (`idCat`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
