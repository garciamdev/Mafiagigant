-- =====================================================================
-- Rangnamen auf Deutsch (mafia-stimmig). Ändert nur die Anzeige-Namen
-- der Rang-Stufen – KEINE Spielerdaten/XP werden verändert.
--   mysql -u BENUTZER -p --default-character-set=utf8mb4 DATENBANK < ranks_de.sql
-- =====================================================================

UPDATE `ranks` SET `rank` = 'Neuling'        WHERE `id` = 1;
UPDATE `ranks` SET `rank` = 'Mitläufer'      WHERE `id` = 2;
UPDATE `ranks` SET `rank` = 'Laufbursche'    WHERE `id` = 3;
UPDATE `ranks` SET `rank` = 'Handlanger'     WHERE `id` = 4;
UPDATE `ranks` SET `rank` = 'Taschendieb'    WHERE `id` = 5;
UPDATE `ranks` SET `rank` = 'Schmuggler'     WHERE `id` = 6;
UPDATE `ranks` SET `rank` = 'Betrüger'       WHERE `id` = 7;
UPDATE `ranks` SET `rank` = 'Autoknacker'    WHERE `id` = 8;
UPDATE `ranks` SET `rank` = 'Ladendieb'      WHERE `id` = 9;
UPDATE `ranks` SET `rank` = 'Dieb'           WHERE `id` = 10;
UPDATE `ranks` SET `rank` = 'Bandit'         WHERE `id` = 11;
UPDATE `ranks` SET `rank` = 'Einbrecher'     WHERE `id` = 12;
UPDATE `ranks` SET `rank` = 'Drogendealer'   WHERE `id` = 13;
UPDATE `ranks` SET `rank` = 'Tresorknacker'  WHERE `id` = 14;
UPDATE `ranks` SET `rank` = 'Spion'          WHERE `id` = 15;
UPDATE `ranks` SET `rank` = 'Bandenführer'   WHERE `id` = 16;
UPDATE `ranks` SET `rank` = 'Pate'           WHERE `id` = 17;
