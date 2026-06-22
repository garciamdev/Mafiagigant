-- =====================================================================
-- Aktivitäts-Protokoll (Logs). Einmal ausführen.
--   mysql -u BENUTZER -p --default-character-set=utf8mb4 DATENBANK < logs.sql
-- =====================================================================

CREATE TABLE IF NOT EXISTS `logs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(80) NOT NULL,
  `type` VARCHAR(30) NOT NULL DEFAULT 'info',
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
