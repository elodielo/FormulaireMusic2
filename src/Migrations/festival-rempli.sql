CREATE TABLE fest_client(
   id VARCHAR(50),
   nom VARCHAR(50),
   prenom VARCHAR(50),
   email VARCHAR(50),
   telephone VARCHAR(50),
   adresse VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE fest_reservations(
   id VARCHAR(50),
   nombre INT,
   prix INT,
   joursChoisis VARCHAR(50),
   id_options VARCHAR(50) NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_options) REFERENCES fest_client(id)
);

CREATE TABLE fest_options(
   id INT,
   nombreTentes INT,
   nombreCamions INT,
   nombreEnfants INT,
   nombreCasques INT,
   nombreLuges INT NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Reservations_Options(
   id_reservations VARCHAR(50),
   id_options INT,
   PRIMARY KEY(id_reservations, id_options),
   FOREIGN KEY(id_reservations) REFERENCES fest_reservations(id),
   FOREIGN KEY(id_options) REFERENCES fest_options(id)
);
