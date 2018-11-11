DROP database if exists example;
CREATE DATABASE example;
USE example;
CREATE TABLE Customer(
    CustName VARCHAR(20) NOT NULL PRIMARY KEY,
    City VARCHAR(20),
    Size CHAR(1)
) ;
INSERT INTO Customer VALUES('1','2','3');