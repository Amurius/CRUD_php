USE animaux;
CREATE TABLE user (id int not null primary key AUTO_INCREMENT, nom varchar(100), motDePasse varchar(255), email varchar(100)  UNIQUE)