-- =====================================================================
-- Family-/Clan-System (einmal ausführen). ADDITIV – bestehende Daten
-- bleiben unverändert.
--   mysql -u BENUTZER -p DATENBANK < family.sql
-- =====================================================================

CREATE TABLE IF NOT EXISTS `family` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `familyname` VARCHAR(30) NOT NULL,
  `owner` VARCHAR(80) NOT NULL,
  `money` BIGINT(20) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `familyname` (`familyname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Spalte für die Familienzugehörigkeit der Spieler (0 = keine Familie).
-- Falls die Spalte bereits existiert, diese Zeile einfach überspringen.
ALTER TABLE `users` ADD COLUMN `family` INT(11) NOT NULL DEFAULT 0;
