CREATE TABLE IF NOT EXISTS llx_cakecreator_cakes (
  rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
  ref VARCHAR(128) NOT NULL,
  label VARCHAR(255) NOT NULL,
  description TEXT,
  stuffing TEXT,
  soaking TEXT,
  cake_color VARCHAR(64),
  photo_weight DOUBLE,
  weight DOUBLE,
  tiers VARCHAR(64),
  coverage VARCHAR(64),
  decoration_type TEXT,
  image_url VARCHAR(255)
) ENGINE=innodb;
