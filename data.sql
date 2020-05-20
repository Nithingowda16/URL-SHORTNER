CREATE TABLE links (
  id int NOT NULL AUTO_INCREMENT,
  url text,
  title varchar(100),
  Clicks int,
  title text,
  created_at timestamp,
  recent_access timestamp,
  user varchar(60),
  PRIMARY KEY (id)
);
