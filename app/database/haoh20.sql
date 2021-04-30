CREATE TABLE IF NOT EXISTS migrations (
	id	INT NOT NULL AUTO_INCREMENT,
	migration	VARCHAR(100) NOT NULL,
	batch	INT NOT NULL,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS users (
	id	INT NOT NULL AUTO_INCREMENT,
	name	VARCHAR(20) NOT NULL,
	email	VARCHAR(100) NOT NULL,
	email_verified_at	datetime,
	password	VARCHAR(20) NOT NULL,
	remember_token	VARCHAR(500),
	created_at	datetime,
	updated_at	datetime,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS password_resets (
	email	VARCHAR(100) NOT NULL,
	token	VARCHAR(500) NOT NULL,
	created_at	datetime
);
CREATE TABLE IF NOT EXISTS failed_jobs (
	id	INT NOT NULL AUTO_INCREMENT,
	uuid	VARCHAR(20) NOT NULL,
	connection	text NOT NULL,
	queue	text NOT NULL,
	payload	text NOT NULL,
	exception	text NOT NULL,
	failed_at	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS mvc_books (
	id	INT NOT NULL AUTO_INCREMENT,
	title	VARCHAR(45) NOT NULL,
	author	VARCHAR(45) NOT NULL,
	isbn	INT NOT NULL,
	image	VARCHAR(500) NOT NULL,
	created_at	datetime,
	updated_at	datetime,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS mvc_scores (
	id	INT NOT NULL AUTO_INCREMENT,
	points	INT NOT NULL,
	created_at	datetime,
	updated_at	datetime,
	PRIMARY KEY(id)
);
INSERT INTO migrations (id,migration,batch) VALUES (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2021_04_29_130004_create_books_table',2),
 (5,'2021_04_30_135317_create_scores_table',3),
 (6,'2021_04_30_143417_create_scores_table',4);
INSERT INTO mvc_books (id,title,author,isbn,image,created_at,updated_at) VALUES (1,'The Withcer','Andrzej Sapkowski',111,'https://images-na.ssl-images-amazon.com/images/I/71UP4i8KZJL.jpg',NULL,NULL),
 (2,'Ready Player One','Ernest Cline',222,'https://pbs.twimg.com/media/ECHBidEU4AA8HEY.jpg:large',NULL,NULL),
 (3,'The Lord of the Rings','J.R.R. Tolkien',333,'https://images-na.ssl-images-amazon.com/images/I/81zqkBcTTCL.jpg',NULL,NULL);
INSERT INTO mvc_scores (id,points,created_at,updated_at) VALUES (1,83,'2021-04-30 14:59:01','2021-04-30 14:59:01');
