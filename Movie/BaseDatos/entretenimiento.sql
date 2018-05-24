-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 23:58:47
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `entretenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

-- CREATE TABLE `peliculas` (
--  `IdPelicula` int(11) NOT NULL,
--  `Nombre_Pelicula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `Portada` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
--  `Sipnosis` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
--  `PaginaOficial` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
--  `Titulo_Original` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
--  `Genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `Nacionalidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `duracion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `annio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
--  `director` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `actores` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--  `UrlPelicula` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
--  `UrlTrailer` int(11) NOT NULL
-- ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoElectronico` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenna` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `CorreoElectronico`, `Contrasenna`, `Nombres`, `Apellidos`, `Cuenta`) VALUES
(1, 'rperdomo23', 'tito.007@gmail.com', 'abc123..', 'Roberto Esau', 'Perdomo Aragon', 0),
(2, 'qweqwe', 'qweqw', 'qweqwe', 'qweqw', 'qweqwe', 0),
(3, 'qweqwe', 'qweqw', 'qweqwe', 'qweqw', 'qweqwe', 0),
(4, 'r', 'r', 'r', 'r', 'r', 0),
(5, '3', '123213', 'abc', 'eqweqwe', 'qweqwe', 0),
(6, '3', '123213', 'abc', 'eqweqwe', 'qweqwe', 0),
(7, 'eqweqw', 'eqweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 0),
(8, 'qweqw', 'eqwe', 'qweqwe', 'wqeqw', 'qweqwe', 0),
(9, '13d', 'dsad', 'abc', 'asdasd', 'asdasd', 0),
(10, 'eqweq', 'eqwe', 'qweqw', 'qweqe', 'qweq', 0),
(11, 'eqw', 'qwee', 'qwe', 'qweqw', 'ewqe', 0),
(12, 'qweqwe', 'qweqw', 'qwe', 'qewewq', 'eqwe', 0),
(13, '1123', '1231', '123', '123', '123', 0),
(14, 'qweqw', 'qweqwe', 'qwe', 'qweqw', 'qwe', 0),
(15, '12312', '123', '123', '123', '132', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
--ALTER TABLE `peliculas`
--  ADD PRIMARY KEY (`IdPelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
--ALTER TABLE `peliculas`
  --MODIFY `IdPelicula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- 

CREATE TABLE ClasificacionPelicula
(
  IdClasificacionPelicula int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Nombre varchar(100),
  Descripcion varchar(500)
);

INSERT INTO ClasificacionPelicula(Nombre, Descripcion)
VALUES('G', 'Todo espectador.'),
('PG', 'Menores acompañados de sus padres.'),
('14A', 'Menores de 14 años acompañados por adultos.'),
('18A', 'Menores de 18 años acompañados por adultos.'),
('R', 'Restringido, ningún menor de 18 años puede ver esta película.'),
('A', 'Mayores de 18 años.');

CREATE TABLE GeneroPelicula
(
  IdGeneroPelicula int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Nombre varchar(100),
  Descripcion varchar(500)
);

INSERT INTO GeneroPelicula(Nombre, Descripcion)
VALUES('Drama', 'Descripción...'),
('Comedia', 'Descripción...'),
('Acción', 'Descripción...'),
('Cine ficción', 'Descripción...'),
('Fantasía', 'Descripción...'),
('Romance', 'Descripción...'),
('Musical', 'Descripción...'),
('Terror', 'Descripción...');

CREATE TABLE Nacionalidades
(
  IdNacionalidad int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Nombre varchar(100),
  Descripcion varchar(500)
);



INSERT INTO Nacionalidades(Nombre, Descripcion)
VALUES('Venezolana','Venezuela'),
('Afgana','Afganistán'),
('Albanesa','Albania'),
('Alemana','Alemania'),
('Alto volteña','Alto volta'),
('Andorrana','Andorra'),
('Angoleña','Angola'),
('Argelina','Argelia'),
('Argentina','Argentina'),
('Australiana','Australia'),
('Austriaca','Austria'),
('Bahamesa','Bahamas'),
('Bahreina','Bahrein'),
('Bangladesha','Bangladesh'),
('Barbadesa','Barbados'),
('Belga','Belgica'),
('Beliceña','Belice'),
('Bermudesa','Bermudas'),
('Birmana','Birmania'),
('Boliviana','Bolivia'),
('Botswanesa','Botswana'),
('Brasileña','Brasil'),
('Bulgara','Bulgaria'),
('Burundesa','Burundi'),
('Butana','Butan'),
('Camboyana','Khemer Rep de Camboya '),
('Camerunesa','Camerun'),
('Canadiense','Canada'),
('Centroafricana','Rep Centroafricana'),
('Chadeña','Chad'),
('Checoslovaca','Rep. Checa'),
('Chilena','Chile'),
('China','China'),
('China','Taiwan'),
('Chipriota','Chipre'),
('Colombiana','Colombia'),
('Congoleña','Congo'),
('Costarricense','Costa Rica'),
('Cubana','Cuba'),
('Dahoneya','Dahoney'),
('Danes','Dinamarca'),
('Dominicana','Rep. Dominicana'),
('Ecuatoriana','Ecuador'),
('Egipcia','Egipto'),
('Emirata','Emiratos Arabes Udo.'),
('Escosesa','Escocia'),
('Eslovaca','Rep. Eslovaca'),
('Española','España'),
('Estona','Estonia'),
('Etiope','Etiopia'),
('Fijena','Fiji'),
('Filipina','Filipinas'),
('Finlandesa','Finlandia'),
('Francesa','Francia'),
('Gabiana','Gambia'),
('Gabona','Gabon'),
('Galesa','Gales'),
('Ghanesa','Ghana'),
('Granadeña','Granada'),
('Griega','Grecia'),
('Guatemalteca','Guatemala'),
('Guinesa Ecuatoriana','Guinea Ecuatorial'),
('Guinesa','Guinea'),
('Guyanesa','Guyana'),
('Haitiana','Haiti'),
('Holandesa','Holanda'),
('Hondureña','Honduras'),
('Hungara','Hungria'),
('India','India'),
('Indonesa','Indonesia'),
('Inglesa','Inglaterra'),
('Iraki','Irak'),
('Irani','Iran'),
('Irlandesa','Irlanda'),
('Islandesa','Islandia'),
('Israeli','Israel'),
('Italiana','Italia'),
('Jamaiquina','Jamaica'),
('Japonesa','Japon'),
('Jordana','Jordania'),
('Katensa','Katar'),
('Keniana','Kenia'),
('Kuwaiti','Kwait'),
('Laosiana','Laos'),
('Leonesa','Sierra leona'),
('Lesothensa','Lesotho'),
('Letonesa','Letonia'),
('Libanesa','Libano'),
('Liberiana','Liberia'),
('Libeña','Libia'),
('Liechtenstein','Liechtenstein'),
('Lituana','Lituania'),
('Luxemburgo','Luxemburgo'),
('Madagascar','Madagascar'),
('Malaca','Fede. de Malasia'),
('Malawi','Malawi'),
('Maldivas','Maldivas'),
('Mali','Mali'),
('Maltesa','Malta'),
('Marfilesa','Costa de Marfil'),
('Marroqui','Marruecos'),
('Mauricio','Mauricio'),
('Mauritana','Mauritania'),
('Mexicana','México'),
('Monaco','Monaco'),
('Mongolesa','Mongolia'),
('Nauru','Nauru'),
('Neozelandesa','Nueva Zelandia'),
('Nepalesa','Nepal'),
('Nicaraguense','Nicaragua'),
('Nigerana','Niger'),
('Nigeriana','Nigeria'),
('Norcoreana','Corea del Norte'),
('Norirlandesa','Irlanda del norte'),
('Norteamericana','Estados unidos'),
('Noruega','Noruega'),
('Omana','Oman'),
('Pakistani','Pakistan'),
('Panameña','Panama'),
('Paraguaya','Paraguay'),
('Peruana','Peru'),
('Polaca','Polonia'),
('Portoriqueña','Puerto Rico'),
('Portuguesa','Portugal'),
('Rhodesiana','Rhodesia'),
('Ruanda','Ruanda'),
('Rumana','Rumania'),
('Rusa','Russia'),
('Salvadoreña','El Salvador'),
('Samoa Occidental','Samoa Occidental'),
('San marino','San Marino'),
('Saudi','Arabia Saudita'),
('Senegalesa','Senegal'),
('Sikkim','Sikkim'),
('Singapur','Singapur'),
('Siria','Siria'),
('Somalia','Somalia'),
('Sovietica','Union Sovietica'),
('Sri Lanka','Sri Lanka (Ceylan) '),
('Suazilandesa','Suazilandia'),
('Sudafricana','Sudafrica'),
('Sudanesa','Sudan'),
('Sueca','Suecia'),
('Suiza','Suiza'),
('Surcoreana','Corea del Sur'),
('Tailandesa','Tailandia'),
('Tanzana','Tanzania'),
('Tonga','Tonga'),
('Tongo','Tongo'),
('Trinidad y Tobago','Trinidad y Tobago'),
('Tunecina','Tunez'),
('Turca','Turquia'),
('Ugandesa','Uganda'),
('Uruguaya','Uruguay'),
('Vaticano','Vaticano'),
('Vietnamita','Vietnam'),
('Yemen Rep Arabe','Yemen Rep. Arabe'),
('Yemen Rep Dem','Yemen Rep. Dem'),
('Yugoslava','Yugoslavia'),
('Zaire','Zaire');

CREATE TABLE Peliculas (
  IdPelicula int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Titulo varchar(100) NOT NULL,
  Sinopsis varchar(2000),
  UrlPaginaOficial varchar(2000),
  FKGenero int not null REFERENCES GeneroPeliculas(IdGeneroPelicula),
  FKNacionalidad int not null REFERENCES Nacionalidades(IdGeneroPelicula),
  DuracionMinutos int,
  Anio int,
  Directores varchar(500) DEFAULT '',
  Actores varchar(500) DEFAULT '',
  FKClasificacion int not null REFERENCES ClasificacionPelicula(IdClasificacionPelicula),
  UrlImgPortada varchar(1000),
  UrlPelicula varchar(1000)
);

INSERT INTO Peliculas(
  Titulo, 
  Sinopsis, 
  UrlPaginaOficial, 
  FKGenero, 
  FKNacionalidad, 
  DuracionMinutos, 
  Anio, 
  Directores, 
  Actores, 
  FKClasificacion, 
  UrlImgPortada, 
  UrlPelicula)
VALUES('Titanic', 
'La trama, una epopeya romántica, relata la relación de Jack Dawson y Rose DeWitt Bukater, dos jóvenes que se conocen y se enamoran a bordo del transatlántico RMS Titanic en su viaje inaugural desde Southampton, Inglaterra, a Nueva York, EE. UU., en abril de 1912. Pertenecientes a diferentes clases sociales, intentan salir adelante pese a las adversidades que los separarían de forma definitiva, entre ellas el prometido de Rose, Caledon «Cal» Hockley (un adinerado del cual ella no está enamorada, pero su madre la ha obligado a permanecer con él para garantizar un futuro económico próspero) y el hundimiento del lujoso barco tras chocar con un iceberg.',
'https://es.wikipedia.org/wiki/Titanic_(película_de_1997)',
6, -- Romance
115,
195,
1997,
'James Cameron',
'Leonardo DiCaprio, Kate Winslet, Kathy Bates, Frances Fisher, Victor Garber, Bernard Hill...',
4,
'https://static.diariofemenino.com/pictures/fotos/194000/194305-peliculas-romanticas-titanic.jpg',
'blob:https://www.youtube.com/0aecb215-e344-46b3-aebe-21c8a4eff3e3'
);

INSERT INTO Peliculas(
  Titulo, 
  Sinopsis, 
  UrlPaginaOficial, 
  FKGenero, 
  FKNacionalidad, 
  DuracionMinutos, 
  Anio, 
  Directores, 
  Actores, 
  FKClasificacion, 
  UrlImgPortada, 
  UrlPelicula)
VALUES('Jurasic Park', 
'Es una próxima película de ciencia ficción, acción y aventura hispano-estadounidense. Es la secuela de Jurassic World estrenada en 2015, y la quinta entrega de la franquicia de Parque Jurásico. Derek Connolly y el director de Jurassic World, Colin Trevorrow, regresan como los escritores del guion, mientras que el cineasta español J. A. Bayona se encarga de la dirección. Será producida por Frank Marshall, Patrick Crowley y Belén Atienza. Trevorrow y el director original de Parque Jurásico, Steven Spielberg, son los productores ejecutivos.',
'https://es.wikipedia.org/wiki/Titanic_(película_de_1997)',
3, -- Acción
115,
195,
2018,
'J. A. Bayona',
'Chris Pratt, Jeff Goldblum, Bryce Dallas Howard, B. D. Wong, Toby Jones, Rafe Spall, Justice Smith...',
4,
'http://allcalidad.com/wp-content/uploads/2018/02/14134132.jpg',
'../../Peliculas/Jurasic-Park-2.mp4'
);

CREATE TABLE Trailers
(
  IdTrailer int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  FKPelicula int not null REFERENCES Peliculas(IdPelicula),
  UrlTriller varchar(1000)
);

insert into Trailers(FKPelicula, UrlTriller)
values (1, '../../Peliculas/Triller-Titanic-1997.mp4')

CREATE TABLE GeneroCanciones
(
  IdGeneroCancion int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Nombre varchar(100),
  Descripcion varchar(500)
);

INSERT INTO GeneroCanciones(Nombre, Descripcion)
VALUES
('Trap', 'Descripción...'), 
('Rap', 'Descripción...'),
('Salsa', 'Descripción...'),
('Electrónica', 'Descripción...'),
('Vals', 'Descripción...');


CREATE TABLE Canciones
(
  IdCancion int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  Titulo varchar(100) NOT NULL,
  FKGenero int not null REFERENCES GeneroCanciones(IdGeneroPelicula),
  DuracionMinutos int,
  Cantautores varchar(500) DEFAULT '',
  UrlImgPortada varchar(1000),
  UrlCancion varchar(1000),
  UrlCancionPrueba varchar(1000)
);

INSERT INTO Canciones(Titulo, FKGenero,
DuracionMinutos, Cantautores, UrlImgPortada, UrlCancion, UrlCancionPrueba)
VALUES('Es Épico', 2, 6, 'Cancerbero', '../../Musica/Canserbero/Canserbero.jpg', 
'../../Musica/Canserbero/Es Épico.mp3', '../../Musica/Canserbero/Es Épico T.mp3');

INSERT INTO Canciones(Titulo, FKGenero,
DuracionMinutos, Cantautores, UrlImgPortada, UrlCancion, UrlCancionPrueba)
VALUES('Mundo De Piedra', 2, 6, 'Cancerbero', '../../Musica/Canserbero/Canserbero.jpg', 
'../../Musica/Canserbero/Mundo De Piedra.mp3', '../../Musica/Canserbero/Mundo De Piedra T.mp3');

INSERT INTO Canciones(Titulo, FKGenero,
DuracionMinutos, Cantautores, UrlImgPortada, UrlCancion, UrlCancionPrueba)
VALUES('Pensando En Ti', 2, 6, 'Cancerbero', '../../Musica/Canserbero/Canserbero.jpg', 
'../../Musica/Canserbero/Pensando En Ti.mp3', '../../Musica/Canserbero/Pensando En Ti T.mp3');