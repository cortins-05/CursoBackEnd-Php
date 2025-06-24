create database phpmysql;

use phpmysql;

create table notas(
    id int(255) primary key,
    titulo varchar(255),
    descripcion mediumtext,
    color varchar(255)
);

insert into notas(id,titulo,descripcion,color) values (1,'Nota 1','Hacer los ejercicios de SQL', 'red');
insert into notas(id,titulo,descripcion,color) values (2,'Aprendiendo PHP','Master en PHP de Victor Robles', 'yellow');

