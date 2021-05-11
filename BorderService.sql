DROP DATABASE IF EXISTS BorderService;
CREATE DATABASE BorderService; 
USE BorderService;

DROP TABLE IF EXISTS account;
CREATE TABLE `account` (
    username VARCHAR(16) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
	privilege VARCHAR(16) NOT NULL,
    PRIMARY KEY (username)
);

DROP TABLE IF EXISTS person;
CREATE TABLE person (
    ID INT NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    phone VARCHAR(45) NOT NULL,
    address VARCHAR(45) NOT NULL,
    username VARCHAR(45) NOT NULL,
    PRIMARY KEY (ID),
    KEY username_idx (username),
    CONSTRAINT username FOREIGN KEY (username) REFERENCES `account` (username) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS branch;
CREATE TABLE branch (
    branchID INT NOT NULL,
    accesstype VARCHAR(45) NOT NULL,
    borderingcountry VARCHAR(45) NOT NULL,
    address VARCHAR(45) NOT NULL,
    PRIMARY KEY (branchID)
);

DROP TABLE IF EXISTS employee;
CREATE TABLE employee (
    EID INT NOT NULL,
    ID INT NOT NULL,
    startdate DATE NOT NULL,
    PRIMARY KEY (EID),
    KEY ID (ID),
    CONSTRAINT employee_ibfk_1 FOREIGN KEY (ID) REFERENCES person (ID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS borderofficer;
CREATE TABLE borderofficer (
    EID INT NOT NULL,
    numapproved INT NOT NULL,
    numdenied INT NOT NULL,
    branchID INT NOT NULL,
    PRIMARY KEY (EID),
    CONSTRAINT branchID FOREIGN KEY (branchID) REFERENCES branch (branchID) ON UPDATE CASCADE,
    CONSTRAINT EID FOREIGN KEY (EID) REFERENCES employee(EID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS visitor;
CREATE TABLE visitor (
    ID INT NOT NULL,
    homecountry VARCHAR(45) NOT NULL,
    entrypoint INT DEFAULT NULL,
    exitpoint INT DEFAULT NULL,
    entrydate DATE DEFAULT NULL,
    exitdate DATE DEFAULT NULL,
    processedby INT DEFAULT NULL,
    `status` VARCHAR(45) DEFAULT NULL,
    PRIMARY KEY (ID),
    KEY entrypoint_idx (entrypoint),
    KEY exitpoint_idx (exitpoint),
    KEY processedby_idx (processedby),
    CONSTRAINT entrypoint FOREIGN KEY (entrypoint) REFERENCES branch (branchID) ON UPDATE CASCADE,
    CONSTRAINT exitpoint FOREIGN KEY (exitpoint) REFERENCES branch (branchID) ON UPDATE CASCADE,
    CONSTRAINT ID FOREIGN KEY (ID) REFERENCES person (ID) ON UPDATE CASCADE,
    CONSTRAINT processedby FOREIGN KEY (processedby) REFERENCES borderofficer (EID) ON UPDATE CASCADE
);


DROP TABLE IF EXISTS dependent;
CREATE TABLE dependent (
    visitorID INT NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    CONSTRAINT visitorID FOREIGN KEY (visitorID) REFERENCES person (ID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS healthrecord;
CREATE TABLE healthrecord (
    personID INT NOT NULL,
    gender VARCHAR(45) NOT NULL,
    lasttestdate DATE DEFAULT NULL,
    PRIMARY KEY (personID),
    CONSTRAINT personID FOREIGN KEY (personID) REFERENCES person (ID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS vehicle;
CREATE TABLE vehicle (
    vvisitorID INT NOT NULL,
    licensenum VARCHAR(45) NOT NULL,
    PRIMARY KEY (vvisitorID),
    CONSTRAINT vvisitorID FOREIGN KEY (vvisitorID) REFERENCES visitor (ID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS securityguard;
CREATE TABLE securityguard (
    sgEID INT NOT NULL,
    numincidents INT NOT NULL,
    sgbranchID INT NOT NULL,
    PRIMARY KEY (sgEID),
    KEY branchID_idx (sgbranchID),
    CONSTRAINT sgbranchID FOREIGN KEY (sgbranchID) REFERENCES branch (branchID) ON UPDATE CASCADE,
    CONSTRAINT sgEID FOREIGN KEY (sgEID) REFERENCES employee (EID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS manager;
CREATE TABLE manager (
    mEID INT NOT NULL,
    numsupervised INT DEFAULT NULL,
    mbranchID INT NOT NULL,
    PRIMARY KEY (mEID),
    KEY mbranchID_idx (mbranchID),
    CONSTRAINT mbranchID FOREIGN KEY (mbranchID) REFERENCES branch (branchID) ON UPDATE CASCADE,
    CONSTRAINT mEID FOREIGN KEY (mEID) REFERENCES employee (EID) ON UPDATE CASCADE
);

DROP TABLE IF EXISTS location;
CREATE TABLE location (
    address VARCHAR(45) NOT NULL,
    `name` VARCHAR(45) DEFAULT NULL,
    safetylevel INT NOT NULL,
    PRIMARY KEY (address)
);

DROP TABLE IF EXISTS visits;
CREATE TABLE visits (
    visitaddress VARCHAR(45) NOT NULL,
    visitvisitorID INT NOT NULL,
    visitDate DATE NOT NULL,
    duration INT DEFAULT NULL,
    KEY visitorID_idx (visitvisitorID),
    CONSTRAINT visitaddress FOREIGN KEY (visitaddress) REFERENCES location (address) ON UPDATE CASCADE,
    CONSTRAINT visitvisitorID FOREIGN KEY (visitvisitorID) REFERENCES visitor (ID) ON UPDATE CASCADE
);

INSERT INTO account (username, password, privilege) VALUES
('Tom',	'123', 'borderofficer'),
('Hank', '123', 'visitor'),
('Bob',	'456', 'visitor'),
('James', '456', 'securityguard'),
('David', '789', 'manager');

INSERT INTO person (ID, `name`, phone, address, username) VALUES
(1, 'Hank H', '1234567890', '11 city ave, calgary', 'Hank'),
(2, 'Bob B', '1111111111', '22 country ave, calgary', 'Bob'),
(3, 'Tom T', '2222222222', '33 town ave, calgary', 'Tom'),
(4, 'James B', '1112223333', '44 country street, calgary', 'James'),
(5, 'David T', '4445556666', '33 town street, calgary', 'David');

INSERT INTO branch(branchID, accesstype, borderingcountry, address) VALUES
(11, 'water', 'Canada', 'City Border, Vancover'),
(22, 'land', 'US', 'Town Border, Vancover');

INSERT INTO employee(EID, ID, startdate) VALUES
(1234, 3, '2021-01-01'),
(1235, 4, '2021-01-02'),
(1236, 5, '2021-01-03');
    
INSERT INTO borderofficer(EID, numapproved, numdenied, branchID) VALUES
(1234, 4, 2, '11');

INSERT INTO securityguard(sgEID, numincidents, sgbranchID) VALUES
(1235, 10, '22');

INSERT INTO manager(mEID, numsupervised, mbranchID) VALUES
(1236, 1, '11');

INSERT INTO location(address, `name`, safetylevel) VALUES
('I want to go here too', 'city park', 1),
('resort', 'fun park', 3),
('I want to go here', 'Fancy place', 5);

INSERT INTO visitor (ID, homecountry, entrypoint, exitpoint, entrydate, exitdate, processedby, `status`) VALUES
(1,'Canada', 11, null, '2021-01-11', null, 1234, 'Y'),
(2,'US', 22, null, '2021-01-12', null, 1234, 'Y');
    
INSERT INTO visits (visitaddress, visitvisitorID, visitDate, duration) VALUES
('I want to go here too', 1, '2021-02-01', 5),
('resort', 1, '2021-04-01', 5),
('I want to go here too', 2, '2021-02-01', 3);

INSERT INTO healthrecord (personID, gender, lasttestdate) VALUES
(1, 'male', '2020-12-12'),
(2, 'female', '2020-12-17');

INSERT INTO dependent (visitorID, `name`) VALUES
(1, 'child');

INSERT INTO vehicle (vvisitorID, licensenum) VALUES
(2, '16848919'),
(1, '58269518');