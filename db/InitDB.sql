USE chiyo;

-- DROP VIEWS -------------------------------------------------
DROP VIEW IF EXISTS vusers;

-- DROP TABLES ------------------------------------------------
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;

-- CREATE TABLES ----------------------------------------------
CREATE TABLE roles (
  ID int(11) NOT NULL AUTO_INCREMENT,
  NAME varchar(45) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE users (
  ID int(11) NOT NULL AUTO_INCREMENT,
  NAME varchar(45) NOT NULL,
  HASH varchar(45) NOT NULL,
  ROLE_ID int(11) NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY name_UNIQUE (NAME)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- CREATE VIEWS -----------------------------------------------
CREATE VIEW vusers AS
	SELECT
		u.ID USER_ID,
        u.NAME USER_NAME,
        r.NAME ROLE_NAME
	FROM
		users u,
        roles r
	WHERE
		u.ROLE_ID = r.ID
;

-- INSERT DATA ------------------------------------------------
-- roles
INSERT INTO roles (ID, NAME) values
	(1, 'Admin'),
    (2, 'Default')
;
-- users
INSERT INTO users (ID, NAME, HASH, ROLE_ID) values
	(1, 'admin', sha1(concat('BPKeL*Eh@qtpA4t', 'admin')), 1),
    (2, 'user', sha1(concat('BPKeL*Eh@qtpA4t', 'user')), 2)
;
