create database full_calendar;
use full_calendar;
create table eventos(
	id int not null auto_increment primary key,
	title varchar(50) not null,
	apellidos varchar(50),
	email varchar(50),
	telefono int,
	empresa varchar(25),
	start date,
	hora time,
	motivo varchar(200),
	className varchar(50),
	editable boolean
);

insert into `eventos`(`title`, `apellidos`, `email`, `telefono`, `empresa`,`start`,`hora`, `motivo`, `className`, `editable`)  values
 ('Juan', 'Perez', 'juan@gmail.com', '652458474', 'Mazda', '2023-05-31', '10:00:00', 'Cita medica', 'Disponible', true),
 ('Roman', 'Araujo', 'roman@gmail.com', '652458475', 'Toyota', '2023-05-31', '10:30:00', 'Cita ayuntamiento','NoDisponible', true),
 ('Paula', 'Rodriguez', 'paula@gmail.com', '642458474', 'Orange', '2023-05-31', '11:00:00', 'Cita medica', 'Disponible', true);
select * from eventos

/* //$nombre, $apellidos, $email, $telefono, :empresa, :start, :hora, :motivo, :className, :editable) */