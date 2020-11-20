DROP DATABASE IF EXISTS test_db;

CREATE DATABASE test_db;

USE test_db;

DROP TABLE IF EXISTS test_tbl;

CREATE TABLE test_tbl (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name TEXT NOT NULL
);

INSERT INTO test_tbl (name) VALUES ("block"),("flower"),("animal");