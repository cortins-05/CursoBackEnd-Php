/*
int (nº caracteres) ENTERO
integer(nº caracteres) ENTERO
varchar(nº caracteres) string/alfanumerico (maximo 255)
char(nº caracteres) string/alfanumerico
float(nº de cifras,nº decimales) decimal/coma flotante
date, time, timestamp

//STRING MAS GRANDES
TEXT 65535 caracteres
MEDIUMTEXT 16 millones de caracteres
LONGTEXT 16 billones de caracteres

//ENTERO MAS GRANDE
MEDIUMINT 
BIGINT
*/

/*
Crear tabla
*/

create table usuarios{
    id int(11) auto_increment not null,
    nombre varchar(100) not null,
    apellidos varchar(255) default('hola que tal'),
    email varchar(100) not null,
    password varchar(255),
    constraint pk_usuarios primary key(id)
};