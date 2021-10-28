create database parqueadero;
use parqueadero;
create table persona(
idPersona int(11) unsigned primary key,
cedula int (11) unsigned unique,
Nombre varchar(100) not null,
direccion varchar(40),
telefono varchar(11)
);
create table tipoVehiculo (
idTipo int(11) unsigned primary key,
clase varchar(40)
);
create table parqueadero (
idParqueadero int(11) unsigned primary key,
nombre varchar(100) not null,
ubicacion varchar(40) not null
);
create table bahia (
idBahia int(11) unsigned primary key,
idParqueadero int(11) unsigned not null,
disponible boolean,
foreign key (idParqueadero) references parqueadero(idParqueadero)
);
create table vehiculo(
idVehiculo int(11) unsigned primary key,
marca varchar(40) not null,
placa varchar(7) not null,
idPersona int(11) unsigned not null,
idTipo int(11) unsigned not null,
foreign key (idPersona) references persona(idPersona),
foreign key (idTipo) references tipoVehiculo(idTipo)
);
create table tarifa(
idTarifa int(11) unsigned primary key,
costo int(11) unsigned not null,
idTipo int(11) unsigned not null, 
foreign key (idTipo) references tipoVehiculo(idTipo)
);
create table Pago(
idPago int(11) unsigned Primary key,
idBahia int(11) unsigned not null,
idVehiculo int(11) unsigned not null,
tiempo time not null,
costo int(11) not null,
fecha date not null,
foreign key (idBahia) references bahia(idBahia),
foreign key (idVehiculo) references vehiculo(idVehiculo)
);
