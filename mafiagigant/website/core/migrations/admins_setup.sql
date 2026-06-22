-- =====================================================================
-- Admin-Rechte anpassen.
--   mysql -u BENUTZER -p DATENBANK < admins_setup.sql
-- =====================================================================

-- verveelme: Admin-Rechte entfernen (Account bleibt als normaler Spieler erhalten).
UPDATE `users` SET `authority` = 'member' WHERE `username` = 'verveelme';

-- chobra: zum Admin machen (du – Name kann spaeter in 'mdev' geaendert werden,
-- die Admin-Rechte bleiben am selben Account).
UPDATE `users` SET `authority` = 'admin' WHERE `username` = 'chobra';

-- Donna: bleibt Admin (sicherheitshalber sicherstellen).
UPDATE `users` SET `authority` = 'admin' WHERE `username` = 'Donna';
