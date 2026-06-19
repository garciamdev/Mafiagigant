-- =====================================================================
-- Tabelle für interne Nachrichten (einmal ausführen).
--   mysql -u BENUTZER -p DATENBANK < messages.sql
-- =====================================================================

CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `from_user` VARCHAR(80) NOT NULL,
  `to_user` VARCHAR(80) NOT NULL,
  `subject` VARCHAR(150) NOT NULL DEFAULT '',
  `body` TEXT NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `deleted_by_to` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `to_user` (`to_user`),
  KEY `from_user` (`from_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
