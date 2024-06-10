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



