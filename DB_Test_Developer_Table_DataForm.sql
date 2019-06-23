CREATE DATABASE IF NOT EXISTS test_developer;
use test_developer;
CREATE TABLE IF NOT EXISTS DataForm (
    id int NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(40) DEFAULT NULL, 
    telefono VARCHAR(40) DEFAULT NULL,
    correo VARCHAR(40) DEFAULT NULL,
    mensaje VARCHAR(1000) DEFAULT NULL,
    PRIMARY KEY(id)
)  ENGINE = InnoDB
AS SELECT 'Rodrigo' AS nombre, '982325896' AS telefono, 'rodrigozx23@gmail.com' AS correo, 'algun mensaje de prueba' as mensaje;