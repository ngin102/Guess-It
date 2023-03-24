CREATE SCHEMA guess_it;
CREATE TABLE guess_it.regular_random_mode (
	id int,
	word varchar(255) NOT NULL,
	day_of_word date,
	PRIMARY KEY (id)
);

CREATE TABLE guess_it.celebrity_mode (
	c_id int,
	celebrity varchar(255) NOT NULL,
	PRIMARY KEY (c_id)
);

CREATE TABLE guess_it.educational_mode (
	e_id int,
	educational_term varchar(255) NOT NULL,
	PRIMARY KEY (e_id)
);

CREATE TABLE guess_it.leaderboard (
	l_id int,
	player_name varchar(255) NOT NULL,
	guesses int,
	day_of_word date,
	PRIMARY KEY (l_id)
);

CREATE TABLE guess_it.schema_migrations (
  migration varchar(255),
  migrated_at time,
  PRIMARY KEY (migration)
);

-- Ensure all migrations are added
INSERT INTO guess_it.schema_migrations
  (migration, migrated_at)
VALUES
  ('20220223201923_add_guess_it_schema.sql', '2022-02-23 20:19:23'),
  ('20220223210518_add_regular_random_mode.sql', '2022-02-23 21:05:18'),
  ('20220225153012_add_celebrity_mode.sql', '2022-02-25 15:30:12'),
  ('20220225160258_add_educational_mode.sql', '2022-02-25 16:02:58'),
  ('20220226221800_add_leaderboard.sql', '2022-02-26 22:18:00'),
  ('20220303144744_add_schema_migrations.sql', '2022-03-03 14:47:44');