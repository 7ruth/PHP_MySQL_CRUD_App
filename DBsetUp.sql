CREATE DATABASE ssb_bart_group;
USE ssb_bart_group;
CREATE TABLE IF NOT EXISTS parent (parent_id INT(11) NOT NULL PRIMARY KEY);
CREATE TABLE IF NOT EXISTS child (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, parent_id INT(11), name VARCHAR(255), long_description TEXT);
ALTER TABLE child FOREIGN KEY (parent_id) REFERENCES parent(parent_id);
