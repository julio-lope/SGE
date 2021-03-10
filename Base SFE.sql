create database systemsgev2;
use systemsgev2;

create table usuarios(id_usuario bigint primary key auto_increment,correo varchar(90)unique not null,password varchar(50)not null,type_user int(3))engine=INNODB;

create table persona(id_persona bigint(10)primary key auto_increment,nombre varchar(50)not null,app_pat varchar(50)not null,app_mat varchar(50)not null,genero ENUM('Masculino','Femenino'),fecha_nac date,tel_cel bigint(10)unique not null,tel_fijo bigint(10),foto varchar(250))engine=INNODB;

create table jerarquia(id_jerarquia bigint(10)primary key auto_increment,cargo varchar(60))engine=INNODB;

create table municipio(id_municipio bigint(10)primary key auto_increment,clave bigint,municipio varchar(60))engine=INNODB;

create table seccion(id_seccion bigint(10) primary key auto_increment,id_municipio bigint(10),FOREIGN KEY(id_municipio)references municipio(id_municipio)ON DELETE CASCADE ON UPDATE CASCADE,seccion bigint)engine=INNODB;

create table bitacora(id_registro bigint(10)primary key auto_increment,id_usuario bigint(10),FOREIGN KEY(id_usuario)references usuarios(id_usuario)ON DELETE CASCADE ON UPDATE CASCADE,fecha date,hora time,accion varchar(50))engine=INNODB;

create table colonia(id_colonia bigint(10)primary key auto_increment,id_municipio bigint(10),FOREIGN KEY(id_municipio)references municipio(id_municipio)ON DELETE CASCADE ON UPDATE CASCADE,colonia varchar(60))engine=INNODB;

create table direccion(id_direccion bigint(10)primary key auto_increment,id_persona bigint(10),FOREIGN KEY(id_persona)references persona(id_persona)ON DELETE CASCADE ON UPDATE CASCADE,id_colonia bigint(10),FOREIGN KEY(id_colonia)references colonia(id_colonia)ON DELETE CASCADE ON UPDATE CASCADE,calle varchar(90),no_interior int(5),no_exterior int(5),localidad varchar(100),cp int(5),latitud varchar(255),longitud varchar(255))engine=INNODB;

create table miembro(id_miembro bigint(10)primary key auto_increment,id_persona bigint(10),FOREIGN KEY(id_persona)references persona(id_persona)ON DELETE CASCADE ON UPDATE CASCADE,id_jerarquia bigint(10),FOREIGN KEY(id_jerarquia)references jerarquia(id_jerarquia)ON DELETE CASCADE ON UPDATE CASCADE,id_seccion bigint(10),FOREIGN KEY(id_seccion)references seccion(id_seccion)ON DELETE CASCADE ON UPDATE CASCADE,folio bigint(20),clave_elector varchar(18),folio_ine varchar(100),fecha_afiliacion date,distrito_electoral int(5))engine=INNODB;