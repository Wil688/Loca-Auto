#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Roles
#------------------------------------------------------------

CREATE TABLE Roles(
        id         Int  Auto_increment  NOT NULL ,
        typeOfRole Varchar NOT NULL
	,CONSTRAINT Roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        id        Int  Auto_increment  NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        lastname  Varchar (50) NOT NULL ,
        birthDate Date NOT NULL ,
        mail      Varchar (50) NOT NULL ,
        password  Varchar (50) NOT NULL ,
        id_Roles  Int NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (id)

	,CONSTRAINT Users_Roles_FK FOREIGN KEY (id_Roles) REFERENCES Roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Engines
#------------------------------------------------------------

CREATE TABLE Engines(
        id         Int  Auto_increment  NOT NULL ,
        engineType Varchar (9) NOT NULL
	,CONSTRAINT Engines_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Brands
#------------------------------------------------------------

CREATE TABLE Brands(
        id        Int  Auto_increment  NOT NULL ,
        brandName Varchar (50) NOT NULL
	,CONSTRAINT Brands_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Seats
#------------------------------------------------------------

CREATE TABLE Seats(
        id         Int  Auto_increment  NOT NULL ,
        seatNumber Varchar NOT NULL
	,CONSTRAINT Seats_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categories
#------------------------------------------------------------

CREATE TABLE Categories(
        id   Int  Auto_increment  NOT NULL ,
        type Varchar (50) NOT NULL
	,CONSTRAINT Categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cars
#------------------------------------------------------------

CREATE TABLE Cars(
        id            Int  Auto_increment  NOT NULL ,
        availability  Bool NOT NULL ,
        guarantee     Bool NOT NULL ,
        id_Categories Int NOT NULL ,
        id_Brands     Int NOT NULL ,
        id_Engines    Int NOT NULL ,
        id_Seats      Int NOT NULL
	,CONSTRAINT Cars_PK PRIMARY KEY (id)

	,CONSTRAINT Cars_Categories_FK FOREIGN KEY (id_Categories) REFERENCES Categories(id)
	,CONSTRAINT Cars_Brands0_FK FOREIGN KEY (id_Brands) REFERENCES Brands(id)
	,CONSTRAINT Cars_Engines1_FK FOREIGN KEY (id_Engines) REFERENCES Engines(id)
	,CONSTRAINT Cars_Seats2_FK FOREIGN KEY (id_Seats) REFERENCES Seats(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contracts
#------------------------------------------------------------

CREATE TABLE Contracts(
        id          Int  Auto_increment  NOT NULL ,
        releaseDate Datetime NOT NULL ,
        returnDate  Datetime NOT NULL ,
        id_Users    Int NOT NULL ,
        id_Cars     Int NOT NULL
	,CONSTRAINT Contracts_PK PRIMARY KEY (id)

	,CONSTRAINT Contracts_Users_FK FOREIGN KEY (id_Users) REFERENCES Users(id)
	,CONSTRAINT Contracts_Cars0_FK FOREIGN KEY (id_Cars) REFERENCES Cars(id)
)ENGINE=InnoDB;

