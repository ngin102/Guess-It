CREATE TABLE guess_it.schema_migrations (
  migration varchar(255),
  migrated_at time,
  PRIMARY KEY (migration)
);

INSERT INTO guess_it.schema_migrations
  (migration, migrated_at)
VALUES
  ('20220223201923_add_guess_it_schema.sql', '2022-02-23 20:19:23'),
  ('20220223210518_add_regular_random_mode.sql', '2022-02-23 21:05:18'),
  ('20220225153012_add_celebrity_mode.sql', '2022-02-25 15:30:12'),
  ('20220225160258_add_educational_mode.sql', '2022-02-25 16:02:58'),
  ('20220226221800_add_leaderboard.sql', '2022-02-26 22:18:00'),
  ('20220303144744_add_schema_migrations.sql', '2022-03-03 14:47:44');