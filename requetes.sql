SELECT * FROM students;
SELECT prenom FROM students;
SELECT prenom, datenaissance, school;
SELECT * FROM students WHERE gender = 'F';

-- first find addy's school
SELECT * FROM students WHERE nom = 'Addy';
-- then use the data;
select * from students WHERE school = 1;

SELECT * FROM students ORDER BY prenom DESC;

SELECT * FROM students ORDER BY prenom DESC Limit 2;

INSERT INTO students (nom, prenom, datenaissance,genre,school) VALUES ("Dalor", "Ginette", "1930-01-01", "F", "Bruxelles")

UPDATE students SET prenom = "Omer", genre = "M" WHERE prenom = "Ginette"

DELETE FROM students WHERE idStudent = 3

ALTER TABLE students change school school varchar(30); 

UPDATE students SET school = "Liège" WHERE school = 1;
UPDATE students SET school = "Gent" WHERE school = 2;