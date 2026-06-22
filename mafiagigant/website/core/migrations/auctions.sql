-- =====================================================================
-- Auktionshaus. Einmal ausführen.
--   mysql -u BENUTZER -p --default-character-set=utf8mb4 DATENBANK < auctions.sql
-- =====================================================================

CREATE TABLE IF NOT EXISTS `auctions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `garage_id` INT(11) NOT NULL,
  `seller` VARCHAR(80) NOT NULL,
  `car_name` VARCHAR(80) NOT NULL DEFAULT 'Auto',
  `car_img` TEXT DEFAULT NULL,
  `min_bid` BIGINT(20) NOT NULL DEFAULT 0,
  `current_bid` BIGINT(20) NOT NULL DEFAULT 0,
  `current_bidder` VARCHAR(80) NOT NULL DEFAULT '',
  `ends_at` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL DEFAULT 'open',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `seller` (`seller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
