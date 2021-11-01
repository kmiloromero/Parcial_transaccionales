create database parqueadero;
use parqueadero;
create table persona(
idPersona int(11) unsigned primary key,
cedula int (11) unsigned unique,
nombre varchar(100) not null,
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

//insercion de datos


insert into persona values (1,1121912734,'Sebastian romero','calle 123','3142957090');
insert into persona values (2,1120654845,'Tatiana Serna','calle 130','3212855060');
insert into persona values (3,1221651242,'Sebastian Cañon','carrera 13','33042959070');
insert into persona values (4,1130022120,'Freddy Fuentes','calle 12','3942757050');
insert into persona values (5,1121965218,'Andres Lozano','calle 160','3142753290');
insert into persona values (6,1130121351,'Oscar Gomez','calle 144','3602698830');
insert into persona values (7,1120154658,'Fernanda Leon','calle 28','3717952070');
insert into persona values (8,1122556555,'Johana Daza','calle 22A','3342950840');
insert into persona values (9,1195546851,'Juan Rios','carrera 19','3222277090');
insert into persona values (10,1120914979,'Nicolas Garzon','calle 71','3212854501');

insert into tipoVehiculo values (1,'Urbano');
insert into tipoVehiculo values (2,'Sedan');
insert into tipoVehiculo values (3,'Pickup');
insert into tipoVehiculo values (4,'Furgon');
insert into tipoVehiculo values (5,'Monovolumen');
insert into tipoVehiculo values (6,'Deportivo');
insert into tipoVehiculo values (7,'Compacto');
insert into tipoVehiculo values (8,'NPR');
insert into tipoVehiculo values (9,'Vox Ban');
insert into tipoVehiculo values (10,'Utilitario');

insert into parqueadero values (1,'--','H22');
insert into parqueadero values (2,'--','A10');
insert into parqueadero values (3,'--','B5');
insert into parqueadero values (4,'--','G9');
insert into parqueadero values (5,'--','C7');
insert into parqueadero values (6,'--','A8');
insert into parqueadero values (7,'--','B7');
insert into parqueadero values (8,'--','D3');
insert into parqueadero values (9,'--','A7');
insert into parqueadero values (10,'--','B3');

insert into bahia values (1,2,false);
insert into bahia values (2,9,false);
insert into bahia values (3,4,true);
insert into bahia values (4,7,true);
insert into bahia values (5,6,true);
insert into bahia values (6,5,false);
insert into bahia values (7,8,true);
insert into bahia values (8,3,false);
insert into bahia values (9,10,true);
insert into bahia values (10,1,true);

insert into vehiculo values(1,'jeep','gss-28a',1,3);
insert into vehiculo values(3,'volkswagen','obp-11c',3,7);
insert into vehiculo values(4,'toyota','cvy-000',5,6);
insert into vehiculo values(5,'kia','mjo-765',7,8);
insert into vehiculo values(6,'suzuki','cnc-330',9,3);
insert into vehiculo values(7,'hyundai','jxv-321',4,3);
insert into vehiculo values(8,'volvo','fak-579',1,7);
insert into vehiculo values(9,'ford','mak-281',3,4);

insert into tarifa values (1,23000,1);
insert into tarifa values (2,50000,4);
insert into tarifa values (3,12500,2);
insert into tarifa values (4,15000,3);
insert into tarifa values (5,18700,6);
insert into tarifa values (6,25000,8);
insert into tarifa values (7,11200,9);
insert into tarifa values (8,13400,5);
insert into tarifa values (9,17800,7);

insert into pago values (1,3,3,'08:00:00',12500,'31-10-2021');
insert into pago values (2,4,4,'00:30:00',15000,'27-10-2021');
insert into pago values (3,5,5,'01:28:00',18700,'25-10-2021');
insert into pago values (4,7,7,'02:40:60',11200,'26-10-2021');
insert into pago values (5,9,8,'06:25:20',13400,'31-10-2021');
insert into pago values (6,10,7,'24:13:01',427200,'29-10-2021');
