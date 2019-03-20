-- create table
CREATE TABLE IF NOT EXISTS app_bear_db.customer (
  id              integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
  account         varchar(255),
  last_name       varchar(255),
  first_name      varchar(255),
  zip_code        varchar(7),
  prefecture_id   int(4),
  city            varchar(255),
  street_address  varchar(255),
  tel             varchar(64),
  gender          int(4),
  created_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX(account, prefecture_id)
);
-- sample data
INSERT INTO app_bear_db.customer (id, account, last_name, first_name, zip_code, prefecture_id, city, street_address, tel, gender, created_at, updated_at)
  VALUES (null, 'sample_account', 'sample', 'taro', 8100001, 12, 'city', 'street', '08012341234', 1, NOW(), NOW());
INSERT INTO app_bear_db.customer (id, account, last_name, first_name, zip_code, prefecture_id, city, street_address, tel, gender, created_at, updated_at)
  VALUES (null, 'sample_account2', 'sample', 'jiro', 1500001, 12, 'city2', 'street2', '08043214321', 3, NOW(), NOW());
