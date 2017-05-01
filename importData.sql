USE `db_manageclass`;

/* chargement des données de base de la table t_user */
LOAD DATA INFILE 'H:\\EasyPHP-Devserver-16.1\\eds-www\\Provok- fil rouge\\database\\Database Data\\data-teacher.csv' INTO TABLE t_user CHARACTER SET 'latin1' FIELDS TERMINATED BY ';' IGNORE 1 LINES SET idUser=NULL;

