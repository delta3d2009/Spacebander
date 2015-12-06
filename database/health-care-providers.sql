{\rtf1\ansi\ansicpg1252\cocoartf1187\cocoasubrtf390
{\fonttbl\f0\fswiss\fcharset0 ArialMT;}
{\colortbl;\red255\green255\blue255;}
\margl1440\margr1440\vieww25440\viewh11400\viewkind0
\deftab720
\pard\pardeftab720

\f0\fs36 \cf0 CREATE TABLE Physician ( \
ID INT NOT NULL AUTO_INCREMENT, \
Company VARCHAR(50) NOT NULL,\
FirstName VARCHAR(80) NOT NULL, \
LastName VARCHAR(80) NOT NULL, \
Address VARCHAR(80) NOT NULL,\
Suite VARCHAR(80) NOT NULL,\
City VARCHAR(40) NOT NULL,\
State VARCHAR(40) NOT NULL,\
Zip INT NOT NULL,\
Country VARCHAR(50) NOT NULL,\
Phone VARCHAR(20) NOT NULL,\
Cell VARCHAR(20) NOT NULL,\
Fax VARCHAR(20) NOT NULL,\
Email VARCHAR(50) NULL,\
Office VARCHAR(50) NULL,\
Lat FLOAT(20,16) NOT NULL,\
Lng FLOAT(20,16) NOT NULL,\
PRIMARY KEY(ID)\
);\
\
CREATE TABLE Account(\
ID INT NOT NULL AUTO_INCREMENT,\
Username VARCHAR(16) NOT NULL,\
Password VARCHAR(32) NOT NULL,\
Email VARCHAR(30) NOT NULL,\
Token INT NULL,\
PRIMARY KEY(ID)\
);\
\
CREATE TABLE Contact ( \
ID INT NOT NULL AUTO_INCREMENT, \
FirstName VARCHAR(80) NOT NULL, \
LastName VARCHAR(80) NOT NULL, \
Phone VARCHAR(20) NOT NULL,\
Email VARCHAR(50) NULL,\
Message VARCHAR(200) NULL,\
Date DATE NOT NULL,\
PRIMARY KEY(ID)\
);\
\
CREATE TABLE RemovedPhysician LIKE Physician;\
\
DELIMITER ;;\
CREATE PROCEDURE getPhysicians(IN paramLat FLOAT, IN paramLng FLOAT, IN paramRadius INT)\
BEGIN\
\pard\tx20800\pardeftab720
\cf0 SELECT Company, FirstName, LastName, Address, Suite, City, State, Country, Phone, Cell, Fax, Zip, Email, Office, Lat, Lng, ( 3959 * acos( cos( radians(paramLat) ) * cos( radians( Lat ) ) * cos( radians( Lng ) - radians(paramLng) ) + sin( radians(paramLat) ) * sin( radians( Lat ) ) ) ) AS Distance FROM Physician HAVING Distance < paramRadius ORDER BY Distance LIMIT 0 , 20;\
END;;\
\
\pard\pardeftab720
\cf0 INSERT INTO Account (Username, Password, Email, Token) VALUES ('admin', MD5('123queso'), 'marlonjuc@hotmail.com', 0);\
INSERT INTO Account (Username, Password, Email, Token) VALUES ('gaby', MD5('123queso'), 'gabrielasalas@gmail.com', 0);\
INSERT INTO Account (Username, Password, Email, Token) VALUES ('steve.loonan', MD5('Steve2015!'), 'steve.loonan@spacebander.com', 0);\
INSERT INTO Account (Username, Password, Email, Token) VALUES ('howard.loonan', MD5('Howard2015!'), 'howard.loonan@spacebander.com', 0);\
INSERT INTO Account (Username, Password, Email, Token) VALUES ('devjit.nayar', MD5('Devjit2015!'), 'devjit.nayar@spacebander.com', 0);\
\
DELIMITER ;;\
CREATE PROCEDURE getUserAccount(IN user VARCHAR(16), IN pass VARCHAR(32))\
BEGIN\
SELECT COUNT(Username) FROM Account WHERE Username = user AND Password = MD5(pass);\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE insertPhysician(IN paramCompany VARCHAR(50), IN paramFirstName VARCHAR(80), IN paramLastName VARCHAR(80), IN paramAddress VARCHAR(80), paramSuite VARCHAR(80), IN paramCity VARCHAR(40), IN paramState VARCHAR(40), IN paramZip INT, IN paramCountry VARCHAR(50), IN paramPhone VARCHAR(20), IN paramCell VARCHAR(20), IN paramFax VARCHAR(20), IN paramEmail VARCHAR(50), IN paramOffice VARCHAR(50), IN paramLat FLOAT, IN paramLng FLOAT )\
BEGIN\
DECLARE counter INT;\
SET counter = 0;\
SELECT COUNT(ID) INTO counter FROM Physician WHERE Address = paramAddress AND Suite = paramSuite;\
IF (counter > 0)\
THEN\
SELECT counter;\
ELSE\
INSERT INTO Physician (Company, FirstName, LastName, Address, Suite, City, State, Zip, Country, Phone, Cell, Fax, Email, Office, Lat, Lng) VALUES (paramCompany, paramFirstName, paramLastName, paramAddress, paramSuite, paramCity, paramState, paramZip, paramCountry, paramPhone, paramCell, paramFax, paramEmail, paramOffice, paramLat, paramLng);\
SELECT 0;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE insertContact(IN paramFirstName VARCHAR(80), IN paramLastName VARCHAR(80), IN paramPhone VARCHAR(20), IN paramEmail VARCHAR(50), IN paramMessage VARCHAR(200) )\
BEGIN\
INSERT INTO Contact (FirstName, LastName, Phone , Email, Message, Date) VALUES (paramFirstName, paramLastName, paramPhone, paramEmail, paramMessage, CURDATE());\
SELECT 0;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE searchPhysicians(IN paramColumn VARCHAR(80), IN paramStartRow INT)\
BEGIN\
IF paramColumn = "LastName"\
THEN\
SELECT * FROM Physician ORDER BY LastName ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Address"\
THEN\
SELECT * FROM Physician ORDER BY Country ASC, State ASC, City ASC, Address ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Zip"\
THEN\
SELECT * FROM Physician ORDER BY Zip, LastName ASC LIMIT paramStartRow, 10;\
ELSE\
SELECT * FROM Physician ORDER BY ID ASC LIMIT paramStartRow, 10;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE searchPhysiciansASC(IN paramColumn VARCHAR(80), IN paramStartRow INT)\
BEGIN\
IF paramColumn = "FirstName"\
THEN\
SELECT * FROM Physician ORDER BY FirstName ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "LastName"\
THEN\
SELECT * FROM Physician ORDER BY LastName ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Company"\
THEN\
SELECT * FROM Physician ORDER BY Company ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Address"\
THEN\
SELECT * FROM Physician ORDER BY Address ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Suite"\
THEN\
SELECT * FROM Physician ORDER BY Suite ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Zip"\
THEN\
SELECT * FROM Physician ORDER BY Zip ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "City"\
THEN\
SELECT * FROM Physician ORDER BY City ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "State"\
THEN\
SELECT * FROM Physician ORDER BY State ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Country"\
THEN\
SELECT * FROM Physician ORDER BY Country ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Phone"\
THEN\
SELECT * FROM Physician ORDER BY Phone ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Cell"\
THEN\
SELECT * FROM Physician ORDER BY Cell ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Fax"\
THEN\
SELECT * FROM Physician ORDER BY Fax ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Country"\
THEN\
SELECT * FROM Physician ORDER BY Country ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Phone"\
THEN\
SELECT * FROM Physician ORDER BY Phone ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Email"\
THEN\
SELECT * FROM Physician ORDER BY Email ASC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Office"\
THEN\
SELECT * FROM Physician ORDER BY Office ASC LIMIT paramStartRow, 10;\
ELSE\
SELECT * FROM Physician ORDER BY ID ASC LIMIT paramStartRow, 10;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE searchPhysiciansDESC(IN paramColumn VARCHAR(80), IN paramStartRow INT)\
BEGIN\
IF paramColumn = "FirstName"\
THEN\
SELECT * FROM Physician ORDER BY FirstName DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "LastName"\
THEN\
SELECT * FROM Physician ORDER BY LastName DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Company"\
THEN\
SELECT * FROM Physician ORDER BY Company DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Address"\
THEN\
SELECT * FROM Physician ORDER BY Address DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Suite"\
THEN\
SELECT * FROM Physician ORDER BY Suite DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Zip"\
THEN\
SELECT * FROM Physician ORDER BY Zip DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "City"\
THEN\
SELECT * FROM Physician ORDER BY City DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "State"\
THEN\
SELECT * FROM Physician ORDER BY State DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Country"\
THEN\
SELECT * FROM Physician ORDER BY Country DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Phone"\
THEN\
SELECT * FROM Physician ORDER BY Phone DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Cell"\
THEN\
SELECT * FROM Physician ORDER BY Cell DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Fax"\
THEN\
SELECT * FROM Physician ORDER BY Fax DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Country"\
THEN\
SELECT * FROM Physician ORDER BY Country DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Phone"\
THEN\
SELECT * FROM Physician ORDER BY Phone DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Email"\
THEN\
SELECT * FROM Physician ORDER BY Email DESC LIMIT paramStartRow, 10;\
ELSEIF paramColumn = "Office"\
THEN\
SELECT * FROM Physician ORDER BY Office DESC LIMIT paramStartRow, 10;\
ELSE\
SELECT * FROM Physician ORDER BY ID DESC LIMIT paramStartRow, 10;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE getCountPhysicians()\
BEGIN\
SELECT COUNT(ID) FROM Physician;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE getTableInfo(IN paramTableName VARCHAR(80))\
BEGIN\
IF paramTableName = "Physician"\
THEN\
SELECT * FROM Physician;\
ELSEIF paramTableName = "Account"\
THEN\
SELECT * FROM Account;\
ELSE\
SELECT * FROM Physician;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE SearchPhysicianByID( IN paramID INT)\
BEGIN\
SELECT * FROM Physician WHERE ID = paramID;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE removePhysicianByID( IN paramID INT)\
BEGIN\
IF EXISTS(SELECT ID FROM Physician WHERE ID = paramID)\
THEN\
INSERT RemovedPhysician SELECT * FROM Physician WHERE ID = paramID;\
SELECT ID FROM Physician WHERE ID = paramID; \
DELETE FROM Physician WHERE ID = paramID;\
ELSE\
SELECT 0;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE updatePhysician(IN paramID INT, IN paramCompany VARCHAR(50), IN paramFirstName VARCHAR(80), IN paramLastName VARCHAR(80), IN paramAddress VARCHAR(80), IN paramSuite VARCHAR(80), IN paramCity VARCHAR(40), IN paramState VARCHAR(40), IN paramZip INT, IN paramCountry VARCHAR(50), IN paramPhone VARCHAR(20), IN paramCell VARCHAR(20), IN paramFax VARCHAR(20), IN paramEmail VARCHAR(50), IN paramOffice VARCHAR(50) )\
BEGIN\
IF EXISTS(SELECT ID FROM Physician WHERE ID = paramID)\
THEN\
UPDATE Physician SET Company = paramCompany, FirstName = paramFirstName, LastName = paramLastName, Address = paramAddress, Suite = paramSuite, City = paramCity, State = paramState, Zip = paramZip, Country = paramCountry, Phone = paramPhone, Cell = paramCell, fax = paramFax, Email = paramEmail, Office = paramOffice WHERE ID = paramID;\
SELECT ID FROM Physician WHERE ID = paramID;\
ELSE\
SELECT 0;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE getToken(IN paramEmail VARCHAR(30))\
BEGIN\
IF EXISTS (SELECT ID FROM Account WHERE Email = paramEmail)\
THEN\
UPDATE Account SET Token = FLOOR(RAND()*(9000-1000)+1000) WHERE Email = paramEmail;\
SELECT Token, UserName FROM Account WHERE Email = paramEmail;\
ELSE\
SELECT 0;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE resetPassword(IN paramEmail VARCHAR(30), IN paramPassword VARCHAR(32), IN paramToken INT )\
BEGIN\
IF EXISTS(SELECT ID FROM Account WHERE Email = paramEmail AND Token = paramToken)\
THEN\
UPDATE Account SET Password = MD5(paramPassword) WHERE Email = paramEmail AND Token = paramToken;\
SELECT ID FROM Account WHERE Email = paramEmail AND Token = paramToken;\
ELSE\
SELECT 0;\
END IF;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE filterPhysicians(IN paramFilter VARCHAR(80), IN paramStartRow INT)\
BEGIN\
SELECT * FROM Physician WHERE ID Like paramFilter OR Company LIKE paramFilter OR FirstName LIKE paramFilter OR LastName  LIKE paramFilter OR Address LIKE paramFilter OR Suite LIKE paramFilter OR City LIKE paramFilter OR State LIKE paramFilter OR Zip LIKE paramFilter OR Country LIKE paramFilter OR Phone LIKE paramFilter OR Cell LIKE paramFilter OR Fax LIKE paramFilter OR Email LIKE paramFilter OR Office LIKE paramFilter ORDER BY ID ASC LIMIT paramStartRow, 10;\
END;;\
\
DELIMITER ;;\
CREATE PROCEDURE getPhysiciansDataGrid()\
BEGIN\
SELECT DISTINCT p.ID, p.Company, p.FirstName, p.LastName, p.Address, p.Suite, p.City, p.State, p.Zip, p.Country, p.Phone, p.Cell, p.Fax, p.Email, p.Office FROM Physician p ORDER BY p.ID;\
END;;}