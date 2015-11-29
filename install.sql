CREATE TABLE km_user (
	userID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL DEFAULT '',
	password VARCHAR(150) NOT NULL DEFAULT '',
	email VARCHAR(255) NOT NULL DEFAULT '',
	activated TINYINT(1) NOT NULL DEFAULT 0,
	user_group INT(10),
	first_name VARCHAR(255) NOT NULL DEFAULT '',
	name VARCHAR(255) NOT NULL DEFAULT ''
);

CREATE TABLE km_user_group (
	groupID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	group_name VARCHAR(255) NOT NULL DEFAULT ''
);

INSERT INTO km_user_group (groupID, group_name) VALUES (1, 'Administrator');
INSERT INTO km_user_group (groupID, group_name) VALUES (2, 'Moderator');
INSERT INTO km_user_group (groupID, group_name) VALUES (3, 'Mitglied');