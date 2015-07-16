DROP DATABASE stammdatenverwaltung;
DROP USER 'M1t4rb31t3r'@'localhost';
DROP USER 'Syst3m4dm1n'@'localhost';

#Erstellen der Datenbanktabellen
Create Database stammdatenverwaltung;

use stammdatenverwaltung;

#Benutzer festlegen
CREATE USER 'M1t4rb31t3r'@'localhost' IDENTIFIED BY 'n3D5Lp6Yq9KxYd7B';GRANT SELECT ON *.* TO 'M1t4rb31t3r'@'localhost' IDENTIFIED BY 'n3D5Lp6Yq9KxYd7B' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE USER 'Syst3m4dm1n'@'localhost' IDENTIFIED BY 'pnQxQRxdtQcFRK2r';GRANT SELECT, INSERT, UPDATE, SHOW DATABASES, SHOW VIEW, EXECUTE ON *.* TO 'Syst3m4dm1n'@'localhost' IDENTIFIED BY 'pnQxQRxdtQcFRK2r' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;



Create Table lieferant
(PK_ID int AUTO_INCREMENT, Name text, Strasse text, Hausnr int, Ort text, PLZ int, Email text, Telefon int, Notiz text, constraint PK_Lieferant primary key (PK_ID));

Create Table komponente
(PK_ID int AUTO_INCREMENT, Beschreibung text, Hersteller text, Notiz text, Einkaufsdatum date, Gewaehrleistungsdauer int, FK_Lieferant int, FK_Komponentenart int, FK_Raum int, Seriennummer text, constraint PK_Komponenten primary key (PK_ID));

Create Table KomponenteZuVorgang
(FK_Hauptkomponente int, FK_Teilkomponente int, FK_Vorgang int, Datum date);

Create Table vorgangsart
(PK_ID int AUTO_INCREMENT, Bezeichnung text, constraint PK_Vorgangsarten primary key (PK_ID));

Create Table raum
(PK_Raumnr int, Stockwerk int, Notiz text, IP_AdressbereichAnfang text, IP_AdressbereichEnde text, constraint PK_Raum primary key (PK_Raumnr));

Create Table komponentezuattribut
(FK_Komponente int, FK_Attribut int, Wert text);

Create Table komponentenattribut
(PK_ID int AUTO_INCREMENT, Bezeichnung text, constraint PK_Komponentenattribut primary key (PK_ID));

Create Table artzuattribut
(FK_Art int, FK_Attribut int);

Create Table komponentenart
(PK_ID int AUTO_INCREMENT, Bezeichnung text, constraint PK_Komponentenart primary key (PK_ID));

Create Table zulaessigewerte
(PK_ID int AUTO_INCREMENT, Wert text, constraint PK_Zulaessigewerte primary key (PK_ID));

Create Table attributzuzulaessig
(FK_Attribut int, FK_Zulaessig int);

Create Table users
(PK_ID int AUTO_INCREMENT, username text, password text, FK_Group int, constraint PK_Users primary key (PK_ID));

Create Table groups
(PK_ID int AUTO_INCREMENT, name text, constraint PK_Groups primary key (PK_ID));

#Beziehungen zwischen den Tabellen

Alter Table komponente
add (constraint FK_Lieferant foreign key (FK_Lieferant) references lieferant (PK_ID),
constraint FK_Komponentenart foreign key (FK_Komponentenart) references komponentenart (PK_ID),
constraint FK_Raum foreign key (FK_Raum) references raum (PK_Raumnr));

Alter Table komponentezuvorgang
add (constraint FK_Komponente foreign key (FK_Hauptkomponente) references komponente (PK_ID),
constraint FK_Komponente2 foreign key (FK_Teilkomponente) references komponente (PK_ID),
constraint FK_Vorgangsart foreign key (FK_Vorgang) references vorgangsart (PK_ID));

Alter Table komponentezuattribut
add (constraint FK_Komponente3 foreign key (FK_Komponente) references komponente (PK_ID),
constraint FK_Komponentenattribut foreign key (FK_Attribut) references komponentenattribut (PK_ID));

Alter Table artzuattribut
add (constraint FK_Komponentenattribut2 foreign key (FK_Attribut) references komponentenattribut (PK_ID),
constraint FK_Komponentenart2 foreign key (FK_Art) references komponentenart (PK_ID));

Alter Table attributzuzulaessig
add (constraint FK_Komponentenattribut3 foreign key (FK_Attribut) references komponentenattribut (PK_ID),
constraint FK_Zulaessigewerte foreign key (FK_Zulaessig) references zulaessigewerte (PK_ID));

Alter Table users
add (constraint FK_Group foreign key(FK_Group) references groups (PK_ID));

#Tabelle Komponentenart füllen
Insert into komponentenart (Bezeichnung) Values('PC');
Insert into komponentenart (Bezeichnung) Values('RAM');
Insert into komponentenart (Bezeichnung) Values('CPU');
Insert into komponentenart (Bezeichnung) Values('Mainboard');
Insert into komponentenart (Bezeichnung) Values('Festplatte');
Insert into komponentenart (Bezeichnung) Values('Grafikkarte');
Insert into komponentenart (Bezeichnung) Values('Netzwerkkarte');
Insert into komponentenart (Bezeichnung) Values('Raidcontroller');
Insert into komponentenart (Bezeichnung) Values('CD-ROM');
Insert into komponentenart (Bezeichnung) Values('CD-Brenner');
Insert into komponentenart (Bezeichnung) Values('DVD-ROM');
Insert into komponentenart (Bezeichnung) Values('DVD-Brenner');
Insert into komponentenart (Bezeichnung) Values('Netzteil');
Insert into komponentenart (Bezeichnung) Values('Switch');
Insert into komponentenart (Bezeichnung) Values('VLAN');
Insert into komponentenart (Bezeichnung) Values('Router');
Insert into komponentenart (Bezeichnung) Values('Hub');
Insert into komponentenart (Bezeichnung) Values('Accesspoint');
Insert into komponentenart (Bezeichnung) Values('Drucker');
Insert into komponentenart (Bezeichnung) Values('Software');


#Tabelle raum füllen
Insert into raum (PK_Raumnr, Stockwerk, Notiz) Values('0','0','Ausgemustert');
Insert into raum (PK_Raumnr, Stockwerk, Notiz, IP_AdressbereichAnfang, IP_AdressbereichEnde) Values('1','0','Labor','10.0.1.1','10.0.1.99');
Insert into raum (PK_Raumnr, Stockwerk, Notiz, IP_AdressbereichAnfang, IP_AdressbereichEnde) Values('2','0','Labor','10.0.2.1','10.0.2.99');
Insert into raum (PK_Raumnr, Stockwerk, Notiz, IP_AdressbereichAnfang, IP_AdressbereichEnde) Values('112','1','Computerraum','10.0.112.1','10.0.112.99');
Insert into raum (PK_Raumnr, Stockwerk, Notiz, IP_AdressbereichAnfang, IP_AdressbereichEnde) Values('301','3','Unterrichtsraum','10.0.31.1','10.0.31.99');
Insert into raum (PK_Raumnr, Stockwerk, Notiz, IP_AdressbereichAnfang, IP_AdressbereichEnde) Values('116','1','Unterrichtsraum','10.0.116.1','10.0.116.99');

#Tabelle groups füllen
Insert into groups (name) Values('sysadmin');
Insert into groups (name) Values('users');

#Tabelle users füllen
Insert into users (username, password, FK_Group) Values('Admin','adminPassword','1');

#Tabelle Komponentenattribut füllen
Insert into komponentenattribut (Bezeichnung) Values('Interne Bezeichnung / Name');
Insert into komponentenattribut (Bezeichnung) Values('IP');
Insert into komponentenattribut (Bezeichnung) Values('Subnetzmaske');
Insert into komponentenattribut (Bezeichnung) Values('Gateway des Geraets');
Insert into komponentenattribut (Bezeichnung) Values('Größe');
Insert into komponentenattribut (Bezeichnung) Values('Taktfrequenz');
Insert into komponentenattribut (Bezeichnung) Values('Sockel');
Insert into komponentenattribut (Bezeichnung) Values('RAM-Typ');
Insert into komponentenattribut (Bezeichnung) Values('RAM maximal möglich');
Insert into komponentenattribut (Bezeichnung) Values('Bänke Anzahl');
Insert into komponentenattribut (Bezeichnung) Values('Steckertyp zum Netzteil');
Insert into komponentenattribut (Bezeichnung) Values('Steckertyp zur CPU');
Insert into komponentenattribut (Bezeichnung) Values('Onboard-Funktionalität');
Insert into komponentenattribut (Bezeichnung) Values('interne Schnittstellen');
Insert into komponentenattribut (Bezeichnung) Values('externe Schnittstellen');
Insert into komponentenattribut (Bezeichnung) Values('Schnittstellenart');
Insert into komponentenattribut (Bezeichnung) Values('Einsatzzweck');
Insert into komponentenattribut (Bezeichnung) Values('Speicherart');
Insert into komponentenattribut (Bezeichnung) Values('Bandbreite/Geschwindigkeit');
Insert into komponentenattribut (Bezeichnung) Values('Anzahl Ports');
Insert into komponentenattribut (Bezeichnung) Values('RAIDLevel');
Insert into komponentenattribut (Bezeichnung) Values('Leistung');
Insert into komponentenattribut (Bezeichnung) Values('Anschluss-Anzahl');
Insert into komponentenattribut (Bezeichnung) Values('Uplinktyp');
Insert into komponentenattribut (Bezeichnung) Values('Pfad der Konfigdatei');
Insert into komponentenattribut (Bezeichnung) Values('ID des VLANs');
Insert into komponentenattribut (Bezeichnung) Values('Port');
Insert into komponentenattribut (Bezeichnung) Values('Druckertyp');
Insert into komponentenattribut (Bezeichnung) Values('DruckerArt');
Insert into komponentenattribut (Bezeichnung) Values('Anschluss-Art');
Insert into komponentenattribut (Bezeichnung) Values('Bezeichnung / Name');
Insert into komponentenattribut (Bezeichnung) Values('Versionsnummer');
Insert into komponentenattribut (Bezeichnung) Values('Lizenztyp');
Insert into komponentenattribut (Bezeichnung) Values('Lizenzanzahl');
Insert into komponentenattribut (Bezeichnung) Values('Lizenzinformationen');
Insert into komponentenattribut (Bezeichnung) Values('Installationshinweise');
Insert into komponentenattribut (Bezeichnung) Values('Speicher');
Insert into komponentenattribut (Bezeichnung) Values('Lizenzlaufzeit');



#Tabelle Zulaessigewerte füllen
Insert into zulaessigewerte (Wert) Values('255.255.255.0');
Insert into zulaessigewerte (Wert) Values('255.255.0.0');
Insert into zulaessigewerte (Wert) Values('10.0.2.250');
Insert into zulaessigewerte (Wert) Values('10.0.2.249');
Insert into zulaessigewerte (Wert) Values('10.0.2.248');
Insert into zulaessigewerte (Wert) Values('1');
Insert into zulaessigewerte (Wert) Values('2');
Insert into zulaessigewerte (Wert) Values('3');
Insert into zulaessigewerte (Wert) Values('4');
Insert into zulaessigewerte (Wert) Values('5');
Insert into zulaessigewerte (Wert) Values('6');
Insert into zulaessigewerte (Wert) Values('7');
Insert into zulaessigewerte (Wert) Values('8');
Insert into zulaessigewerte (Wert) Values('9');
Insert into zulaessigewerte (Wert) Values('10');
Insert into zulaessigewerte (Wert) Values('11');
Insert into zulaessigewerte (Wert) Values('12');
Insert into zulaessigewerte (Wert) Values('13');
Insert into zulaessigewerte (Wert) Values('14');
Insert into zulaessigewerte (Wert) Values('15');
Insert into zulaessigewerte (Wert) Values('16');
Insert into zulaessigewerte (Wert) Values('17');
Insert into zulaessigewerte (Wert) Values('18');
Insert into zulaessigewerte (Wert) Values('19');
Insert into zulaessigewerte (Wert) Values('20');
Insert into zulaessigewerte (Wert) Values('21');
Insert into zulaessigewerte (Wert) Values('22');
Insert into zulaessigewerte (Wert) Values('23');
Insert into zulaessigewerte (Wert) Values('24');
Insert into zulaessigewerte (Wert) Values('25');
Insert into zulaessigewerte (Wert) Values('26');
Insert into zulaessigewerte (Wert) Values('27');
Insert into zulaessigewerte (Wert) Values('28');
Insert into zulaessigewerte (Wert) Values('29');
Insert into zulaessigewerte (Wert) Values('30');
Insert into zulaessigewerte (Wert) Values('32');
Insert into zulaessigewerte (Wert) Values('40');
Insert into zulaessigewerte (Wert) Values('48');
Insert into zulaessigewerte (Wert) Values('50');
Insert into zulaessigewerte (Wert) Values('64');
Insert into zulaessigewerte (Wert) Values('128');
Insert into zulaessigewerte (Wert) Values('1066');
Insert into zulaessigewerte (Wert) Values('1333');
Insert into zulaessigewerte (Wert) Values('1600');
Insert into zulaessigewerte (Wert) Values('AM3');
Insert into zulaessigewerte (Wert) Values('AM3+');
Insert into zulaessigewerte (Wert) Values('FM2');
Insert into zulaessigewerte (Wert) Values('1150');
Insert into zulaessigewerte (Wert) Values('1155');
Insert into zulaessigewerte (Wert) Values('2011');
Insert into zulaessigewerte (Wert) Values('DDR');
Insert into zulaessigewerte (Wert) Values('DDR2');
Insert into zulaessigewerte (Wert) Values('DDR3');
Insert into zulaessigewerte (Wert) Values('DDR4');
Insert into zulaessigewerte (Wert) Values('DDR5');
Insert into zulaessigewerte (Wert) Values('ATX 4-pol.');
Insert into zulaessigewerte (Wert) Values('ATX 8-pol.');
Insert into zulaessigewerte (Wert) Values('ATX 20-pol.');
Insert into zulaessigewerte (Wert) Values('ATX 24-pol.');
Insert into zulaessigewerte (Wert) Values('Grafik');
Insert into zulaessigewerte (Wert) Values('NIC');
Insert into zulaessigewerte (Wert) Values('WakeOnLAN');
Insert into zulaessigewerte (Wert) Values('Radicontroller');
Insert into zulaessigewerte (Wert) Values('IDE');
Insert into zulaessigewerte (Wert) Values('SATA');
Insert into zulaessigewerte (Wert) Values('SAS');
Insert into zulaessigewerte (Wert) Values('E-SATA');
Insert into zulaessigewerte (Wert) Values('USB 2.0');
Insert into zulaessigewerte (Wert) Values('USB 3.0');
Insert into zulaessigewerte (Wert) Values('Client');
Insert into zulaessigewerte (Wert) Values('Server');
Insert into zulaessigewerte (Wert) Values('250');
Insert into zulaessigewerte (Wert) Values('500');
Insert into zulaessigewerte (Wert) Values('1000');
Insert into zulaessigewerte (Wert) Values('Magnetisch');
Insert into zulaessigewerte (Wert) Values('SSD');
Insert into zulaessigewerte (Wert) Values('512');
Insert into zulaessigewerte (Wert) Values('1024');
Insert into zulaessigewerte (Wert) Values('2048');
Insert into zulaessigewerte (Wert) Values('PCIe');
Insert into zulaessigewerte (Wert) Values('AGP');
Insert into zulaessigewerte (Wert) Values('PCI');
Insert into zulaessigewerte (Wert) Values('100');
Insert into zulaessigewerte (Wert) Values('RJ45');
Insert into zulaessigewerte (Wert) Values('LWL');
Insert into zulaessigewerte (Wert) Values('0');
Insert into zulaessigewerte (Wert) Values('750');
Insert into zulaessigewerte (Wert) Values('650');
Insert into zulaessigewerte (Wert) Values('550');
Insert into zulaessigewerte (Wert) Values('Tinte');
Insert into zulaessigewerte (Wert) Values('Laser');
Insert into zulaessigewerte (Wert) Values('Nadel');
Insert into zulaessigewerte (Wert) Values('Farbe');
Insert into zulaessigewerte (Wert) Values('SW');
Insert into zulaessigewerte (Wert) Values('LAN');
Insert into zulaessigewerte (Wert) Values('USB');
Insert into zulaessigewerte (Wert) Values('Adobe Reader');
Insert into zulaessigewerte (Wert) Values('Adobe Photoshop');
Insert into zulaessigewerte (Wert) Values('Microsoft Visual Studio');
Insert into zulaessigewerte (Wert) Values('Microsoft Office');
Insert into zulaessigewerte (Wert) Values('VLC Media Player');
Insert into zulaessigewerte (Wert) Values('11.0.6');
Insert into zulaessigewerte (Wert) Values('10.0.4');
Insert into zulaessigewerte (Wert) Values('CS5');
Insert into zulaessigewerte (Wert) Values('CS6');
Insert into zulaessigewerte (Wert) Values('2010');
Insert into zulaessigewerte (Wert) Values('2013');
Insert into zulaessigewerte (Wert) Values('2.2.1');
Insert into zulaessigewerte (Wert) Values('2.1.5');
Insert into zulaessigewerte (Wert) Values('Volumen');
Insert into zulaessigewerte (Wert) Values('Einzelplatzlizenz');
Insert into zulaessigewerte (Wert) Values('Schuelerversion');
Insert into zulaessigewerte (Wert) Values('Lehrerversion');
Insert into zulaessigewerte (Wert) Values('Verwaltung');


#Tabelle artzuattribut füllen

Insert into artzuattribut (FK_Art,FK_Attribut) Values('1','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('1','2');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('1','3');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('1','4');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('2','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('2','5');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('2','6');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('3','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('3','7');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','7');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','8');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','9');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','10');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','11');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','12');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','13');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','14');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('4','15');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('5','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('5','16');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('5','17');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('5','5');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('5','18');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('6','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('6','14');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('6','37');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('7','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('7','19');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('7','15');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('7','14');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('7','20');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('8','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('8','21');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('13','22');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('13','11');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('13','12');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('13','23');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('14','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('14','2');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('14','20');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('14','24');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('14','25');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('15','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('15','26');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('15','27');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('16','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('16','2');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('16','25');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('17','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('17','20');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('17','19');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('18','1');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('18','2');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('18','25');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('19','2');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('19','28');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('19','29');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('19','30');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','31');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','32');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','33');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','34');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','35');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','36');
Insert into artzuattribut (FK_Art,FK_Attribut) Values('20','38');
#Tabelle attributzuzulaessig füllen

Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('3','1');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('3','2');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('4','3');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('4','4');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('4','5');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','21');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','36');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','40');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','41');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','72');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','73');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','74');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('5','87');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('6','42');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('6','43');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('6','44');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','45');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','46');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','47');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','48');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','49');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('7','50');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('8','51');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('8','52');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('8','53');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('8','54');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('8','55');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','21');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','36');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','40');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('9','41');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','8');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','11');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('10','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('11','58');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('11','59');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('12','56');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('12','57');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('13','60');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('13','61');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('13','62');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('13','63');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','64');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','65');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','66');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','67');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','80');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','81');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('14','82');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('15','68');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('15','69');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('15','84');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('15','85');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('16','64');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('16','65');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('16','66');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('17','70');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('17','71');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('18','75');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('18','76');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('19','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('19','15');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('19','83');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('19','74');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','10');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','11');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','15');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','17');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','21');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','25');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','29');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('20','38');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','86');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','8');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','10');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('21','15');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','72');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','73');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','74');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','87');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','88');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('22','89');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('23','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('23','8');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('23','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('23','10');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('23','11');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('24','84');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('24','85');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('26','25');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('26','35');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('28','90');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('28','91');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('28','92');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('29','93');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('29','94');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('30','95');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('30','96');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('31','97');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('31','98');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('31','99');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('31','100');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('31','101');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','102');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','103');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','104');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','105');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','106');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','107');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','108');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('32','109');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('33','110');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('33','111');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('33','112');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('33','113');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('33','114');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','8');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','10');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','11');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','12');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','14');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','15');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','16');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','17');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','18');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','19');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','20');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','21');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','22');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','23');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','24');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','25');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','26');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','27');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','28');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','29');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','30');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','31');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','32');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','33');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','34');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('34','35');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('37','77');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('37','78');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('37','79');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','6');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','7');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','8');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','9');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','10');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','11');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','12');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','13');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','14');
Insert into attributzuzulaessig (FK_Attribut, FK_Zulaessig) Values('38','15');



#Tabelle vorgangsart füllen
Insert into vorgangsart (Bezeichnung) Values('Einbau');
Insert into vorgangsart (Bezeichnung) Values('Ausbau');

#Tabelle lieferant füllen
Insert into lieferant (Name, Strasse, Hausnr, Ort, PLZ, Email, Telefon, Notiz) Values('Sinell EDV Zubehoer GmbH','Siemensstrasse','18', 'Monheim', '40789', 'sez@sinell.de', '49217395960', 'EDV Zubehoer');
Insert into lieferant (Name, Strasse, Hausnr, Ort, PLZ, Email, Telefon, Notiz) Values('Ingram Micro Distrubution GmbH','Heisenbergbogen','3', 'Dornach bei Muenchen', '85609', 'webmaster@ingrammicro.de', '498942080', 'PC Komplettsysteme');
Insert into lieferant (Name, Strasse, Hausnr, Ort, PLZ, Email, Telefon, Notiz) Values('proMX GmbH','Nordring','100', 'Nuernberg', '90409', 'kontakt@promx.net', '499112398040', 'Software');

#Tabelle komponente füllen
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('ThinkCentre','Lenovo','2015-05-05','3','2','1','1','ABTE23491JG');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('ThinkCentre','Lenovo','2015-05-05','3','2','1','1','ABTE23491SG');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('Savage HX316C9SR','HyperX','2013-02-12','1','1','2','0','ABTE23491ZT');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('ThinkCentre','Lenovo','2015-07-05','3','2','1','2','ABROFP9863');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('ThinkCentre','Lenovo','2014-03-15','3','2','1','112','ABTE23491JU');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('B50-30 MCA32GE','Lenovo','2014-03-15','3','2','1','112','ABTE2349536G');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('B50-30 MCA32GE','Lenovo','2014-03-15','3','2','1','116','ABTE234AD68G');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('B50-30 MCA32GE','Lenovo','2014-03-15','3','2','1','301','ZTTE23491JG');
Insert into komponente(Beschreibung, Hersteller, Einkaufsdatum, Gewaehrleistungsdauer, FK_Lieferant, FK_Komponentenart, FK_Raum, Seriennummer)
Values('Bildbearbeitungssoftware','Adobe','2015-03-15','0','3','20','1','56-89-68-42-78-52');

#Tabelle komponentezuattribut füllen
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('1','1','R001PC01');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('1','2','10.0.1.1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('1','3','255.255.225.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('1','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('2','1','R001PC02');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('2','2','10.0.1.2');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('2','3','255.255.225.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('2','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('3','1','RAM DDR3');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('3','5','4');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('3','6','1600');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('4','1','R002PC01');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('4','2','10.0.2.1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('4','3','255.255.225.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('4','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('5','1','R112PC01');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('5','2','10.0.112.1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('5','3','255.255.255.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('5','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('6','1','R116PC01');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('6','2','10.0.116.1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('6','3','255.255.0.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('6','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('7','1','R301PC01');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('7','2','10.0.31.1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('7','3','255.255.0.0');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('7','4','10.0.2.250');

Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','31','Adobe Photoshop');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','32','CS6');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','33','Einzelplatzlizenz');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','34','1');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','35','56-89-68-42-78-52');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','36','Als Admin ausführen');
Insert into komponentezuattribut(FK_Komponente, FK_Attribut, Wert) Values('8','38','5');
