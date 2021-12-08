CREATE TABLE reservaciones (
  id_resevacion int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(100) NOT NULL,
  tema varchar(100) DEFAULT NULL,
  inicio tinyint(4) NOT NULL,
  fin tinyint(4) NOT NULL,
  id_sala int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE salas (id_sala int(11) NOT NULL PRIMARY KEY, nombre varchar(10) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE reservaciones ADD KEY id_sala (id_sala);

ALTER TABLE reservaciones ADD CONSTRAINT reservaciones_ibfk_1 FOREIGN KEY (id_sala) REFERENCES salas (id_sala);
