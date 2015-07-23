create database tienda;
use tienda;

create table productos
(
id int auto_increment,
nombre varchar(50),
descripcion varchar(100),
precio varchar(10),
cuanto_hay varchar(10),
imagen varchar(100),
fecha date,
constraint pk_id primary key (id)
);