-- =====================================================================
-- ALLES-AKTIVIEREN-Skript für den Server.
-- Sicher & mehrfach ausführbar (legt nur an, was fehlt; ändert keine Spielstände).
-- In phpMyAdmin: Datenbank wählen -> Reiter "SQL" -> alles einfügen -> OK.
-- =====================================================================

-- ---------- Feature-Tabellen (nur falls nicht vorhanden) ----------
CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `from_user` VARCHAR(80) NOT NULL,
  `to_user` VARCHAR(80) NOT NULL,
  `subject` VARCHAR(150) NOT NULL DEFAULT '',
  `body` TEXT NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `deleted_by_to` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `to_user` (`to_user`), KEY `from_user` (`from_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `forum_threads` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `author` VARCHAR(80) NOT NULL,
  `replies` INT(11) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_post_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `last_post_at` (`last_post_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `thread_id` INT(11) NOT NULL,
  `author` VARCHAR(80) NOT NULL,
  `body` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `thread_id` (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `missions_claimed` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(80) NOT NULL,
  `mission_id` INT(11) NOT NULL,
  `claimed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), UNIQUE KEY `user_mission` (`username`,`mission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `logs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(80) NOT NULL,
  `type` VARCHAR(30) NOT NULL DEFAULT 'info',
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `username` (`username`), KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `auctions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `garage_id` INT(11) NOT NULL,
  `seller` VARCHAR(80) NOT NULL,
  `car_name` VARCHAR(80) NOT NULL DEFAULT 'Auto',
  `car_img` TEXT DEFAULT NULL,
  `min_bid` BIGINT(20) NOT NULL DEFAULT 0,
  `current_bid` BIGINT(20) NOT NULL DEFAULT 0,
  `current_bidder` VARCHAR(80) NOT NULL DEFAULT '',
  `ends_at` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL DEFAULT 'open',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `status` (`status`), KEY `seller` (`seller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `family` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `familyname` VARCHAR(30) NOT NULL,
  `owner` VARCHAR(80) NOT NULL,
  `money` BIGINT(20) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), UNIQUE KEY `familyname` (`familyname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------- Neue Spalten in users (idempotent: nur falls noch nicht vorhanden) ----------
SET @c := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='users' AND column_name='notepad');
SET @s := IF(@c=0, 'ALTER TABLE `users` ADD COLUMN `notepad` TEXT NULL DEFAULT NULL', 'SELECT 1');
PREPARE st FROM @s; EXECUTE st; DEALLOCATE PREPARE st;

SET @c := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='users' AND column_name='family');
SET @s := IF(@c=0, 'ALTER TABLE `users` ADD COLUMN `family` INT(11) NOT NULL DEFAULT 0', 'SELECT 1');
PREPARE st FROM @s; EXECUTE st; DEALLOCATE PREPARE st;

SET @c := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='users' AND column_name='referred_by');
SET @s := IF(@c=0, 'ALTER TABLE `users` ADD COLUMN `referred_by` VARCHAR(80) NULL DEFAULT NULL', 'SELECT 1');
PREPARE st FROM @s; EXECUTE st; DEALLOCATE PREPARE st;

-- ---------- Deutsche Ränge (idempotent) ----------
UPDATE `ranks` SET `rank`='Neuling'       WHERE `id`=1;
UPDATE `ranks` SET `rank`='Mitläufer'     WHERE `id`=2;
UPDATE `ranks` SET `rank`='Laufbursche'   WHERE `id`=3;
UPDATE `ranks` SET `rank`='Handlanger'    WHERE `id`=4;
UPDATE `ranks` SET `rank`='Taschendieb'   WHERE `id`=5;
UPDATE `ranks` SET `rank`='Schmuggler'    WHERE `id`=6;
UPDATE `ranks` SET `rank`='Betrüger'      WHERE `id`=7;
UPDATE `ranks` SET `rank`='Autoknacker'   WHERE `id`=8;
UPDATE `ranks` SET `rank`='Ladendieb'     WHERE `id`=9;
UPDATE `ranks` SET `rank`='Dieb'          WHERE `id`=10;
UPDATE `ranks` SET `rank`='Bandit'        WHERE `id`=11;
UPDATE `ranks` SET `rank`='Einbrecher'    WHERE `id`=12;
UPDATE `ranks` SET `rank`='Drogendealer'  WHERE `id`=13;
UPDATE `ranks` SET `rank`='Tresorknacker' WHERE `id`=14;
UPDATE `ranks` SET `rank`='Spion'         WHERE `id`=15;
UPDATE `ranks` SET `rank`='Bandenführer'  WHERE `id`=16;
UPDATE `ranks` SET `rank`='Pate'          WHERE `id`=17;

-- ---------- Admins (idempotent) ----------
UPDATE `users` SET `authority`='member' WHERE `username`='verveelme';
UPDATE `users` SET `authority`='admin'  WHERE `username`='chobra';
UPDATE `users` SET `authority`='admin'  WHERE `username`='Donna';

-- ---------- Emojis überall (Chat-Tabelle; sicher/idempotent) ----------
ALTER TABLE `shoutouts` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
