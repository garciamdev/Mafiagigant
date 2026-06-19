-- =====================================================================
-- Spalte für den persönlichen Notizblock (einmal ausführen).
--   mysql -u BENUTZER -p DATENBANK < notepad.sql
-- =====================================================================

ALTER TABLE `users`
  ADD COLUMN `notepad` TEXT NULL DEFAULT NULL;
