DROP USER 'userclass'@'localhost';
CREATE USER 'userclass'@'localhost' IDENTIFIED BY 'managepass';
GRANT ALL PRIVILEGES ON db_manageclass.* TO 'userclass'@'localhost' WITH GRANT OPTION;