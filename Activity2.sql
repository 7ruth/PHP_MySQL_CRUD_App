-- Steps I took to complete activity 2

-- Created the tables shown in the diagram
-- Report ID table
CREATE TABLE report_id(report_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, project_id INT(11), name VARCHAR(255));
-- Module ID table
CREATE TABLE module_id(module_id INT(11) NOT NULL PRIMARY KEY, report_id INT(11), FOREIGN KEY (report_id) REFERENCES report_id(report_id));
-- Violation ID table
CREATE TABLE violation(violation_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255));
-- Instances ID table
CREATE TABLE instance(instance_id INT(11) NOT NULL PRIMARY KEY, violation_id INT(11), module_id INT(11), FOREIGN KEY (violation_id) REFERENCES violation(violation_id), FOREIGN KEY (module_id) REFERENCES module_id(module_id));
--
-- Generated some fake data to work with
INSERT INTO report_id (project_id, name) VALUES ('1','one');
INSERT INTO report_id (project_id, name) VALUES ('2','two');
INSERT INTO report_id (project_id, name) VALUES ('3','three');
INSERT INTO module_id (module_id, report_id) VALUES ('1','1');
INSERT INTO module_id (module_id, report_id) VALUES ('2','1');
INSERT INTO module_id (module_id, report_id) VALUES ('3','1');
INSERT INTO module_id (module_id, report_id) VALUES ('4','2');
INSERT INTO module_id (module_id, report_id) VALUES ('5','3');
INSERT INTO module_id (module_id, report_id) VALUES ('6','3');
INSERT INTO violation (name) VALUES ('divide by zero');
INSERT INTO violation (name) VALUES ('no data');
INSERT INTO violation (name) VALUES ('overflow');
INSERT INTO violation (name) VALUES ('parking ticket');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('1','1','1');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('2','2','1');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('3','3','1');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('4','3','1');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('5','1','2');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('6','1','2');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('7','4','3');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('8','4','4');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('9','1','5');
INSERT INTO instance (instance_id, violation_id, module_id) VALUES ('10','3','6');
--
-- I tried several different query formulations until I got to the following which fulfilled the activity requirements
SELECT report_id.report_id, violation.name as Category, COUNT(instance.instance_id) AS NumberOfViolations FROM instance
LEFT JOIN violation
ON instance.violation_id=violation.violation_id
LEFT JOIN module_id
ON instance.module_id = module_id.module_id
LEFT JOIN report_id
ON module_id.report_id = report_id.report_id
GROUP BY report_id, violation.name;
