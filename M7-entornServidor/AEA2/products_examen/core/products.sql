CREATE DATABASE IF NOT EXISTS botiga;

CREATE TABLE IF NOT EXISTS botiga.products (
  id TiNYINT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(30),
  categoria VARCHAR(30),
  preu DECIMAL(10,2),
  color VARCHAR(30)
);

INSERT INTO botiga.products (nom, categoria, preu, color) VALUES 
     ('Portàtil','Electrònica',1056,'Blanc'),
     ('Catifa','Hogar',249.90,'Vermell'),
     ('Smart TV','Electrònica',733,'Negre'),
     ('Taula','Mobiliari',122.5,'Pi'),
     ('Pilota','Oci',33,'Taronja'),
     ('Trivial','Oci',25.5,'Blau'),
     ('Aspirador','Hogar',399.9,'Plata');
  