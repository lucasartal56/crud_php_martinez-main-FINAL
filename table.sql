CREATE TABLE programador (
    pro_id SERIAL NOT NULL,
    pro_grado VARCHAR (30) NOT NULL,
    pro_arma varchar (30) NOT NULL,
    pro_nombre VARCHAR (30) NOT NULL,
    pro_apellido VARCHAR (30) NOT NULL,
    pro_catalogo INTEGER NOT NULL, 
    pro_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY (pro_id)
);

CREATE TABLE aplicacion (
    ap_id SERIAL NOT NULL,
    ap_nombre VARCHAR (30) NOT NULL,
    ap_descripcion VARCHAR (50) NOT NULL,
    ap_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY (ap_id)
);


CREATE TABLE asignacion (
    asig_id SERIAL NOT NULL,
    asig_pro_id INTEGER NOT NULL,
    asig_ap_id INTEGER NOT NULL,
    asig_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY (asig_id),
    FOREIGN KEY (asig_pro_id) REFERENCES programador (pro_id),
    FOREIGN KEY (asig_ap_id) REFERENCES aplicacion (ap_id)
);

CREATE TABLE tarea (
    tarea_id SERIAL NOT NULL,
    tarea_nombre VARCHAR (100) NOT NULL,
    tarea_ap_id INTEGER NOT NULL,
    tarea_fecha DATETIME YEAR TO DAY NOT NULL, 
    tarea_estado VARCHAR (30) NOT NULL,
    tarea_situacion SMALLINT DEFAULT 1,
    PRIMARY KEY (tarea_id),
    FOREIGN KEY (tarea_ap_id) REFERENCES aplicacion (ap_id)
);

select tarea_nombre, tarea_ap_id, ap_nombre, tarea_fecha, tarea_estado from aplicacion
inner join tarea on tarea_ap_id = ap_id
where tarea_id = 2;

select * from tarea

SELECT ap_nombre FROM aplicacion INNER JOIN aplicacion ON tarea_ap_id = ap_id WHERE tarea_situacion = 1

SELECT asig_id, pro_nombre || ' ' || pro_apellido AS nombre_completo, ap_nombre 
FROM asignacion 
INNER JOIN programador ON asig_pro_id = pro_id 
INNER JOIN aplicacion ON asig_ap_id = ap_id 
WHERE asig_situacion = 1;

select * from asignacion

select * from aplicacion


select * from programador
INSERT into programador (pro_grado, pro_arma, pro_nombre, cli_apellido, pro_catalogo)
 values ('Teniente', 'Infantería', 'DAS', 'ASDF', 444)
 
 INSERT into programador (pro_grado, pro_arma, pro_nombre, pro_apellido, pro_catalogo) values ('Teniente', 'Infantería', 'DAS', 'ASDF', 444)
 
UPDATE programador SET pro_grado = 'Subteniente',
 pro_arma = 'Infantería',
 pro_nombre = 'DAS',
 pro_apellido = 'ASDF',
 pro_catalogo = 4445599, WHERE pro_id = 2
 
 
 select * from aplicacion;
 select * from asignacion;
 
 
 SELECT tarea_id, tarea_nombre, ap_nombre, tarea_fecha, tarea_estado FROM tarea
 INNER JOIN aplicacion ON tarea_ap_id = ap_id
 WHERE tarea_situacion =1

