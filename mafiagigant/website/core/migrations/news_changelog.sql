-- =====================================================================
-- Deutsche Neuigkeiten / Changelog. Einmal ausführen.
-- (Autor anpassen, falls 'verveelme' auf dem Server nicht existiert –
--  oder Neuigkeiten bequem über den Admin-Bereich /admin/news pflegen.)
--   mysql -u BENUTZER -p --default-character-set=utf8mb4 DATENBANK < news_changelog.sql
-- =====================================================================

SET @author = 'verveelme';

INSERT INTO news (username, date) VALUES (@author, NOW());
SET @n = LAST_INSERT_ID();
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_title', @n, 'de', 'Stabiler & schneller');
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_description', @n, 'de', 'Zahlreiche Abstürze und Anzeigefehler wurden behoben. Viel Spaß beim Spielen – eure Crew!');

INSERT INTO news (username, date) VALUES (@author, NOW());
SET @n = LAST_INSERT_ID();
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_title', @n, 'de', 'Viele neue Funktionen');
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_description', @n, 'de', 'Familie, Auktionshaus, Nachrichten, Forum, Missionen, Protokolle, Präsident und Gericht wurden eingebaut.');

INSERT INTO news (username, date) VALUES (@author, NOW());
SET @n = LAST_INSERT_ID();
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_title', @n, 'de', 'Neue Casino-Spiele');
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_description', @n, 'de', 'Roulette, Blackjack, Video-Poker, Spielautomat, Pferderennen, Sportwetten, Lotterie und mehr sind spielbar!');

INSERT INTO news (username, date) VALUES (@author, NOW());
SET @n = LAST_INSERT_ID();
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_title', @n, 'de', 'Großes Update – alles auf Deutsch!');
INSERT INTO translations_news (activity, activity_id, lang, content) VALUES ('news_description', @n, 'de', 'Das komplette Spiel ist jetzt auf Deutsch: moderner Chat mit Emojis, neues Logo und überarbeitete Menüs.');
