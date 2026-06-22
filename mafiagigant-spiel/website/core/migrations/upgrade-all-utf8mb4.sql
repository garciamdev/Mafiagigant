-- =====================================================================
-- Komplette Datenbank auf utf8mb4 umstellen (Umlaute + Emojis ueberall)
-- ---------------------------------------------------------------------
-- Die DB-Verbindung nutzt seit Phase 1 utf8mb4 (siehe config/db.config.php).
-- Die Tabellen selbst sind aber noch utf8mb3. Diese Datei stellt alles um.
--
-- WICHTIG: Vorher ein BACKUP der Datenbank machen!
--
-- Schritt 1: Standard-Charset der Datenbank setzen (gilt fuer neue Tabellen)
-- =====================================================================

ALTER DATABASE `mafiagigan-crime`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- =====================================================================
-- Schritt 2: Bestehende Tabellen umstellen.
-- Fuehre die folgende Abfrage aus -> sie ERZEUGT die ALTER-Befehle.
-- Kopiere das Ergebnis und fuehre es anschliessend aus.
-- (So bleibt die Migration auch bei neuen Tabellen vollstaendig.)
-- =====================================================================

SELECT CONCAT('ALTER TABLE `', table_name,
       '` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;') AS migration_sql
FROM information_schema.tables
WHERE table_schema = 'mafiagigan-crime'
  AND table_type = 'BASE TABLE';
