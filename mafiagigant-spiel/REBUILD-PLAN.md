# Mafiagigant – Modern-Rebuild-Plan

Stand: 2026-06-19. Diese Datei ist die Roadmap für die schrittweise Modernisierung.
Prinzip: **immer lauffähig bleiben**, kleine Schritte, nach jedem Schritt testen.

---

## ✅ Phase 0 – Aufräumen & Sofort-Fixes (ERLEDIGT)

- ~134 Datei-Leichen entfernt (DB-Kopien, Backups, tote Themes/Module).
- Fremdprojekt-CMS (Energietoeslag/bol.com) komplett entfernt.
- Umlaut-/Encoding-Fix: alles auf UTF-8 (Meta-Charset + HTTP-Header).
- Neuer moderner Chat (Dark-Design, Emojis, XSS-sicher, utf8mb4).
- „🚧 in Arbeit"-Fallback statt leerer Seiten für nicht gebaute Module.
- Routen-Karte erstellt (welche Menüpunkte funktionieren / fehlen).

---

## 🔧 Phase 1 – Fundament härten (empfohlen als Nächstes)

Ziel: technische Altlasten beseitigen, ohne Spielgefühl zu ändern.

1. **utf8mb4 überall**
   - Verbindungs-Charset in `core/database.php` von `utf8` auf `utf8mb4`.
   - Migration aller Tabellen auf `utf8mb4` (analog zur Chat-Migration).
2. **Konfig vereinheitlichen**
   - DB-Zugangsdaten liegen doppelt (`config/db.config.php` UND
     `themes/general/chat/config.php`). → eine zentrale Quelle.
3. **Sicherheits-Pass**
   - SQL-Injection-Audit (viele Module bauen Queries per String-Konkatenation).
   - Konsequent Prepared Statements / `$db->escape()`.
   - `display_errors` in Produktion abschalten (steht aktuell auf E_ALL).
4. **Toten Code in Kerndateien**
   - Unerreichbarer Test-Block am Ende von `index.php` (nach `exit;`).
   - Ungenutzte Funktionen (`loadChat()` in `functions.php`).
   - Hardcodierte IP-Sperre / `secretcrime.nl`-Redirect in `index.php` prüfen.

---

## 🎨 Phase 2 – Theme modernisieren

Ziel: zeitgemäßes, responsives Aussehen. Das Theme ist bereits div-basiert,
aber nutzt veraltetes jQuery 1.7 / Prototype / Cufon.

1. Alte JS-Abhängigkeiten ausmisten (Cufon, Prototype, mehrfaches jQuery).
2. Modernes, responsives CSS (mobiltauglich) – Schritt für Schritt pro Bereich.
3. Einheitliche Komponenten (Buttons, Panels, Tabellen) wie schon beim Chat.
4. Sprache vereinheitlichen: Theme mischt Deutsch/Englisch/Niederländisch.

---

## 🧭 Phase 3 – Routing & Struktur

Ziel: sauberes, nachvollziehbares Laden von Seiten.

1. Zentrale Modul-Registry (welche Module existieren, Rechte, Titel).
2. Einheitliches Muster: jedes Modul = Logik + View (heute gemischt).
3. Sauberes 404/Fallback (Basis steht bereits mit `_coming-soon.php`).

---

## 🎮 Phase 4 – Fehlende Funktionen bauen (priorisiert)

~36 Menüpunkte sind noch nicht gebaut. Jede Funktion braucht eine
kurze Design-Entscheidung (Regeln, Kosten, Auszahlung). Vorschlag-Reihenfolge:

**A. Einfach / hoher Nutzen (wenig Design nötig)**
- `settings` – Account-Einstellungen (Passwort, Avatar, E-Mail)
- `notepad` – persönliche Notizen
- `manual`, `maffia-story`, `crew`, `spielregeln` – Info-/Textseiten
- `mail/inbox` – internes Nachrichtensystem

**B. Spielfeatures Verbrechen (mittel)**
- `organized-crime`, `group-robbery`, `shooting`, `attack`,
  `russian-roulette`, `targets`, `missions`, `farao`

**C. Casino (mittel–komplex, brauchen Spielregeln)**
- `blackjack`, `roulette`, `slots`, `poker`, `lottery`,
  `scratch-cards`, `crack-the-safe`, `horse-racing`,
  `guess-the-number`, `soccer`

**D. Sozial / Wirtschaft**
- `forum`, `court`, `president`, `auction`, `donate`,
  `referrals`, `callcredits`, `credit-lottery`, `logs`

> Hinweis: Für B/C/D entscheiden wir pro Feature kurz die Mechanik,
> dann baue ich es nach dem bestehenden Modul-Muster.

---

## 📋 Phase 5 – Feinschliff

- Admin-Bereich modernisieren.
- i18n aufräumen (Sprachdateien konsolidieren).
- Cronjobs (`CroNj0bs/`) prüfen und dokumentieren.
- Logging/Fehlerseiten.

---

## Empfohlene nächste Aktion
**Phase 1 starten** (utf8mb4 + Konfig vereinheitlichen + Sicherheits-Quickwins) –
geringes Risiko, großer Aufräumeffekt. Danach Phase 4-A (sichtbare neue Funktionen).
