CREATE TABLE stock_exchange ( 
    stock_exchangeID BIGSERIAL NOT NULL PRIMARY KEY,
    name CHAR(50) NOT NULL, 
    description VARCHAR(50) NOT NULL, 
    alternative_name VARCHAR(50) NOT NULL
);

CREATE TABLE person ( 
    personID BIGSERIAL NOT NULL PRIMARY KEY, 
    name_surname CHAR(50) NOT NULL,
    sex CHAR(50) NOT NULL, 
    profession_code CHAR(50) NOT NULL, 
    date_of_birth INTEGER NOT NULL
);

CREATE TABLE organization ( 
    organizationID BIGSERIAL NOT NULL PRIMARY KEY, 
    name CHAR(50) NOT NULL,
    web_address CHAR(50) NOT NULL, 
    number_of_employees INTEGER NOT NULL, 
    date_of_creation INTEGER NOT NULL
);

CREATE TABLE country ( 
    countryID BIGSERIAL NOT NULL PRIMARY KEY,
    name CHAR(50) NOT NULL,
    description CHAR(50) NOT NULL, 
    alternative_name CHAR(50) NOT NULL
);

CREATE TABLE connects_to ( 
    stock_exchangeID INT, 
    organizationID INT,
    FOREIGN KEY(stock_exchangeID) REFERENCES stock_exchange(stock_exchangeID), 
    FOREIGN KEY(organizationID) REFERENCES organization(organizationID)
);

CREATE TABLE works ( 
    personID INT NOT NULL, 
    organizationID INT NOT NULL,
    role CHAR(50) NOT NULL,
    FOREIGN KEY(personID) REFERENCES person(personID), 
    FOREIGN KEY(organizationID) REFERENCES organization(organizationID)
);

CREATE TABLE citizen ( 
    personID INT NOT NULL, 
    countryID INT NOT NULL,
    FOREIGN KEY(personID) REFERENCES person(personID), 
    FOREIGN KEY(countryID) REFERENCES country(countryID)
);

CREATE TABLE is_active ( 
    organizationID INT NOT NULL, 
    countryID INT NOT NULL,
    FOREIGN KEY(organizationID) REFERENCES organization(organizationID), 
    FOREIGN KEY(countryID) REFERENCES country(countryID)
);