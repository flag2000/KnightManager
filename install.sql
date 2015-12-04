CREATE TABLE km_user (
	userID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL DEFAULT '',
	password VARCHAR(255) NOT NULL DEFAULT '',
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

INSERT INTO km_user (userID, username, passwort, email, activated, user_group, first_name, name) VALUES (1, 'System', '$2y$10$k40Ct3Spk2pE0QkWM36EWeNhmTkda9g6V0eS9ZsKc2k6Btjls159e', 'test@test.de', 0, 1, 'System', 'System');

INSERT INTO km_user_group (groupID, group_name) VALUES (1, 'Administrator');
INSERT INTO km_user_group (groupID, group_name) VALUES (2, 'Moderator');
INSERT INTO km_user_group (groupID, group_name) VALUES (3, 'Mitglied');