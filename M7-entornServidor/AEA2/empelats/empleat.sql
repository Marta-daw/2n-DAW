CREATE DATABASE IF NOT EXISTS empleatsmvc;

CREATE TABLE IF NOT EXISTS empleatsmvc.empleat (
    id TiNYINT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30),
    cognoms VARCHAR(50),
    professio VARCHAR(30),
    telefon VARCHAR(9)
) 

INSERT INTO empleatsmvc.empleat VALUES
    ('Maria', 'Alvarez Carmona', 'Arquitecta', '6633221100'),
    ('Oriol', 'Diaz Fernandez', 'Metge', '677889944'),
    ('Paula', 'Hernandez Jota', 'Infermera', '674108526'),
    ('Quim', 'López Muñoz', 'Informatic', '660225366')
