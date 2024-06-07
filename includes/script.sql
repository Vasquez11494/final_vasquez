create table grados (
    grad_id  SERIAL not null,
    grad_nombre VARCHAR(50),
    PRIMARY KEY (grad_id)
);

create table armas (
    arm_id SERIAL NOT NULL,
    arm_nombre VARCHAR(50),
    PRIMARY KEY (arm_id)
);

create table alumnos (
    alu_id SERIAL NOT NULL,
    alu_nombre VARCHAR(50),
    alu_apellido VARCHAR(50),
    alu_grado INT,
    alu_arma INT,
    alu_nacionalidad VARCHAR(75),
    alu_situacion INT DEFAULT 1,
    PRIMARY KEY (alu_id),
    FOREIGN KEY (alu_grado) REFERENCES grados (grad_id),
    FOREIGN KEY (alu_arma) REFERENCES armas (arm_id) 
);
