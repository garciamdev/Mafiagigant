-- =====================================================================
-- Chat-Migration: Emojis & Umlaute korrekt speichern
-- ---------------------------------------------------------------------
-- Die Tabelle `shoutouts` ist aktuell utf8mb3 und kann KEINE Emojis
-- speichern (Emojis brauchen 4 Byte -> utf8mb4).
-- Diese Migration stellt die Tabelle auf utf8mb4 um. Vorhandene
-- Nachrichten bleiben erhalten.
--
-- Ausfuehren z.B. via phpMyAdmin (SQL-Tab) oder:
--   mysql -u BENUTZER -p DATENBANK < upgrade-chat-utf8mb4.sql
-- =====================================================================

ALTER TABLE `shoutouts`
  CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER TABLE `shoutouts`
  MODIFY `username` VARCHAR(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 's',
  MODIFY `message`  TEXT        CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
