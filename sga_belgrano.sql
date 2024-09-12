/*
SQLyog Ultimate v9.02 
MySQL - 8.0.31 : Database - sga_belgrano
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sga_belgrano` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sga_belgrano`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `alu_dni` bigint NOT NULL,
  `alu_nombre` varchar(50) NOT NULL,
  `alu_apellido` varchar(70) NOT NULL,
  `alu_carrera` varchar(100) NOT NULL,
  `alu_insc` varchar(3) NOT NULL,
  `alu_provincia` varchar(50) NOT NULL,
  `alu_coment` varchar(100) NOT NULL,
  `alu_telefono` bigint NOT NULL,
  PRIMARY KEY (`alu_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `alumno` */

insert  into `alumno`(`alu_dni`,`alu_nombre`,`alu_apellido`,`alu_carrera`,`alu_insc`,`alu_provincia`,`alu_coment`,`alu_telefono`) values (32444333,'Facundo','Egarrat','Desarrollo de Software','2','Cordoba','Me gusta el gaming.',2554466655),(42306658,'Ramiro Iván','Garro Tamborini','Desarrollo de Software','1','Mendoza','Me gusta programar en Java.',2616861215),(42444122,'José','Paredes','Diseño de indumentaria','1','San Luis','Me gustan las prendas oscuras',2611444599);

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `mat_codigo` int NOT NULL AUTO_INCREMENT,
  `mat_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`mat_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

/*Data for the table `materia` */

insert  into `materia`(`mat_codigo`,`mat_nombre`) values (1,'Programación I'),(2,'Práctica profesionalizante I'),(3,'Requerimientos de software'),(4,'Compresión y producción de textos'),(5,'Sistemas administrativos'),(6,'Problemática sociocultural'),(7,'Arquitectura de software'),(8,'Álgebra');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
