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
create table usuarios
(
id int,
nombre varchar(30),
usuario varchar(30),
pass varchar(30),
permisos int(1),
imagen varchar(100),
fecha date,
primary key (id)
);