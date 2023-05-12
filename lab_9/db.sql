DROP DATABASE mojaBaza;
CREATE DATABASE mojaBaza;
USE mojaBaza;
CREATE TABLE samochody
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    marka VARCHAR(40),
    model VARCHAR(40),
    cena MEDIUMINT UNSIGNED NOT NULL,
    rok SMALLINT UNSIGNED NOT NULL,
    opis VARCHAR(400)
);
CREATE TABLE rola 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rola VARCHAR (20)
);
CREATE TABLE uzytkownik
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR (30),
    haslo VARCHAR (50),
    id_rola INT, 
    CONSTRAINT FK_id_rola FOREIGN KEY (id_rola) REFERENCES rola(id)
);
ALTER TABLE samochody ADD id_uzytkownik INT DEFAULT 1;
ALTER TABLE samochody ADD CONSTRAINT FK_id_uzytkownik FOREIGN KEY (id_uzytkownik) REFERENCES uzytkownik(id);

 


INSERT INTO rola (rola) VALUES ('uzytkownik');
INSERT INTO rola (rola) VALUES ('administrator');
INSERT INTO uzytkownik (id, login, haslo, id_rola) VALUES (1, 'gosc','',(SELECT id FROM rola WHERE rola='uzytkownik' LIMIT 1));
INSERT INTO uzytkownik (login, haslo, id_rola) VALUES ('admin', 'admin', (SELECT id FROM rola WHERE rola='administrator' LIMIT 1));
INSERT INTO uzytkownik (login, haslo, id_rola) VALUES ('user1', 'user1', (SELECT id FROM rola WHERE rola='uzytkownik' LIMIT 1));
INSERT INTO uzytkownik (login, haslo, id_rola) VALUES ('user2', 'user2', (SELECT id FROM rola WHERE rola='uzytkownik' LIMIT 1));
INSERT INTO samochody (marka, model, cena, rok, opis) VALUES ('marka1', 'model1', 1, 2001, 'opis1');
INSERT INTO samochody (marka, model, cena, rok, opis, id_uzytkownik) VALUES ('marka1', 'model1', 1, 2001, 'opis1', (SELECT id FROM uzytkownik WHERE login='user1' LIMIT 1));