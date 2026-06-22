-- =====================================================================
-- Tabelle für abgeschlossene Missionen (einmal ausführen).
--   mysql -u BENUTZER -p DATENBANK < missions.sql
-- =====================================================================

CREATE TABLE IF NOT EXISTS `missions_claimed` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(80) NOT NULL,
  `mission_id` INT(11) NOT NULL,
  `claimed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_mission` (`username`, `mission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
