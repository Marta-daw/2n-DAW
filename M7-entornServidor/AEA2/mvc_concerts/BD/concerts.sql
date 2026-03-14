CREATE DATABASE IF NOT EXISTS concertsMVC;

CREATE TABLE IF NOT EXISTS concertsMVC.concerts (
    id_concert TiNYINT AUTO_INCREMENT PRIMARY KEY,
    grup VARCHAR(30),
    ciutat VARCHAR(30),
    sala VARCHAR(50),
    data DATE,
    hora TIME
);

INSERT INTO concertsMVC.concerts (grup, ciutat, sala, data, hora) VALUES 
    ('AC-DC', 'Barcelona', 'Razz', '2026-04-06', '21:30:00'),
    ('AC-DC', 'Madrid', 'La Riviera', '2026-04-20', '22:00:00'),
    ('AC-DC', 'Gijon', 'Sala Albéniz', '2026-05-02', '21:00:00'),
    ('Coldplay', 'Barcelona', 'Palau Sant Jordi', '2026-04-16', '20:30:00'),
    ('Coldplay', 'Sevilla', 'Estadio La Cartuja', '2026-04-25', '21:00:00'),
    ('Coldplay', 'Bilbao', 'San Mamés', '2026-05-05', '20:45:00'),
    ('Imagine Dragons', 'Gijón', 'Sala Acapulco', '2026-04-27', '21:30:00'),
    ('Imagine Dragons', 'Madrid', 'WiZink Center', '2026-05-02', '20:45:00'),
    ('Imagine Dragons', 'Sevilla', 'Estadio la Cartuja', '2026-05-20', '21:00:00');
    