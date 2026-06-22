-- =====================================================================
-- Empfehlungen (Referrals): Spalte, wer einen Spieler geworben hat.
-- ADDITIV – keine Spielerdaten werden veraendert.
--   mysql -u BENUTZER -p DATENBANK < referrals.sql
-- =====================================================================

ALTER TABLE `users` ADD COLUMN `referred_by` VARCHAR(80) NULL DEFAULT NULL;
