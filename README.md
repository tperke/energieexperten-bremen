# Energieexperten Bremen

Vollständiges PHP Projekt für ein Energieberatungsunternehmen mit Leistungsgebiet Bremen und Büro in Düsseldorf. Die Website verbindet Fachinformationen, Anfragewege und ein transparentes Expertenverzeichnis.

Die Projektfassung ist für den Betrieb unter `https://energieexperten-bremen.de` konfiguriert. Echte Anbieterprofile werden weiterhin erst nach dokumentierter Prüfung veröffentlicht.

## Architektur

1. PHP 8.2 oder neuer erzeugt alle wesentlichen Inhalte serverseitig.
2. Wiederverwendbare Komponenten liegen in `includes/`.
3. Statische Inhalte für Leistungen, Beiträge, Profile und Stadtteile liegen strukturiert in `data/`.
4. Apache Rewrite Regeln erzeugen lesbare kanonische Adressen.
5. CSS und JavaScript sind lokal, ohne Framework und ohne externe Abhängigkeiten.
6. Formulare nutzen Sitzungsschutz, CSRF Schutz, Bot Feld, Zeitprüfung, Begrenzung wiederholter Anfragen und serverseitige Validierung.
7. Das Verzeichnis veröffentlicht nur Datensätze mit `published: true` und `verified: true`.
8. Stadtteilseiten bleiben ohne eigenständigen redaktionellen Mehrwert gesperrt.

## Systemvoraussetzungen

1. PHP ab Version 8.2 mit `mbstring`, `json`, `filter` und `session`.
2. Apache 2.4 mit `mod_rewrite`, `mod_headers`, `mod_expires` und `mod_deflate`.
3. HTTPS Zertifikat für die Produktivdomain.
4. Schreibbarer temporärer Systemordner für die anonymisierte Anfragebegrenzung.
5. Schreibrecht für `storage/logs/`, wobei das Verzeichnis nicht öffentlich erreichbar sein darf.
6. Ein konfigurierter E Mail Versand auf Serverebene oder eine später integrierte Versandkomponente.

## Verzeichnisstruktur

```text
/
├── index.php
├── energieberater_bremen.php
├── energieberatung_bremen.php
├── sanierungsfahrplan_bremen.php
├── energieausweis_bremen.php
├── foerdermittelberatung_bremen.php
├── baubegleitung_bremen.php
├── nichtwohngebaeude_bremen.php
├── experten.php
├── experte.php
├── anbieter_eintragen.php
├── anfrage.php
├── danke.php
├── ratgeber.php
├── artikel.php
├── stadtteil.php
├── ueber_uns.php
├── redaktionsrichtlinien.php
├── kontakt.php
├── impressum.php
├── datenschutz.php
├── 404.php
├── sitemap.php
├── robots.txt
├── .htaccess
├── .env.example
├── includes/
├── data/
├── assets/
├── docs/
├── storage/
└── tests/
```

Die zusätzliche Datei `includes/content.php` bündelt redaktionelle Leistungsseiten. `includes/page_renderer.php` rendert diese Inhalte einheitlich. Diese Abweichung reduziert doppelte Darstellungscodebereiche, ohne Seiteninhalte oder Adressen zusammenzulegen.

## Installation

1. Alle Projektdateien in das öffentliche Stammverzeichnis der Domain übertragen.
2. Die Domain auf dieses Verzeichnis zeigen lassen.
3. PHP 8.2 oder neuer aktivieren.
4. Apache Rewrite Regeln und die erforderlichen Module aktivieren.
5. HTTPS einrichten und sämtliche Aufrufe auf `https://energieexperten-bremen.de` leiten.
6. Die Werte aus `.env.example` als geschützte Servervariablen einrichten. Die Datei selbst darf nicht mit Zugangsdaten veröffentlicht werden. `SITE_BASE_URL` bleibt `https://energieexperten-bremen.de`.
7. Schreibrecht für `storage/logs/` restriktiv vergeben. Empfohlen ist ein Verzeichnis außerhalb des öffentlichen Webstamms und eine Anpassung des Pfades in `includes/bootstrap.php`.
8. `PUBLIC_LAUNCH_READY=true` erst nach erfolgreicher Inhalts-, SSL- und Funktionserprobung setzen. Für eine erneute Vorschau kann der Wert vorübergehend auf `false` gestellt werden.
9. Erst nach Einsetzen des echten SMTP-Passworts `MAIL_ENABLED=true` setzen.

## Lokale Prüfung

Der eingebaute PHP Entwicklungsserver unterstützt keine Apache Rewrite Regeln. Für die Prüfung einzelner Dateien:

```bash
php -S 127.0.0.1:8080
php tests/run.php
```

Saubere Adressen müssen zusätzlich auf einem Apache Testsystem geprüft werden.

## Domain und HTTPS

1. DNS Einträge auf den vorgesehenen Webserver richten.
2. Zertifikat für `energieexperten-bremen.de` und `www.energieexperten-bremen.de` ausstellen.
3. Die bevorzugte Domain bleibt `https://energieexperten-bremen.de` ohne `www`; `.htaccess` leitet HTTP und www dauerhaft dorthin um.
4. Die Domain muss direkt auf das öffentliche Stammverzeichnis dieses Projekts zeigen, nicht auf ein zusätzliches Unterverzeichnis.
5. Nach erfolgreicher HTTPS Prüfung kann HSTS dauerhaft aktiv bleiben.
6. Weiterleitungen mit einem Prüfdienst auf Schleifen und falsche Statuscodes testen.

## Betreiberangaben

Alle unbekannten Angaben liegen zentral in `includes/config.php` und werden bevorzugt aus Umgebungsvariablen gelesen. Vor Veröffentlichung müssen mindestens folgende Werte gesetzt sein:

1. Name des Betreibers
2. Unternehmensbezeichnung
3. Vollständige Geschäftsanschrift
4. Telefonnummer
5. E Mail Adresse
6. Umsatzsteuer Identifikationsnummer, sofern vorhanden
7. Redaktionell verantwortliche Person
8. Hostingdienst und Verarbeitungsort
9. E Mail Dienst und Verarbeitungsort

## Formularversand

Die Projektfassung versendet Formularnachrichten direkt per authentifiziertem SMTP über IONOS. Das echte Passwort muss ausschließlich als geschützte Servervariable gesetzt werden und darf nicht in das Repository gelangen.

Vor Aktivierung:

1. Absenderdomain mit SPF, DKIM und DMARC absichern.
2. Empfänger und Absender über Umgebungsvariablen setzen.
3. Hosting und Versanddienst in der Datenschutzerklärung eintragen.
4. Vertrag zur Auftragsverarbeitung prüfen und dokumentieren.
5. Speicher und Löschfristen verbindlich festlegen.
6. Testnachrichten auf Zustellung, Zeichenkodierung und Header Injection prüfen.

## Dateiberechtigungen

1. Dateien grundsätzlich `0644`.
2. Verzeichnisse grundsätzlich `0755`.
3. Konfiguration mit Geheimnissen außerhalb des Webstamms restriktiver absichern.
4. `storage/logs/` nur für den PHP Prozess schreibbar machen.
5. `data/`, `includes/`, `docs/`, `tests/` und `storage/` sind durch Apache Regeln gesperrt.

## Bilder austauschen

1. Hero Illustration unter `assets/images/hero_bremen.webp` ersetzen.
2. Die beiden kleineren Varianten `hero_bremen_800.webp` und `hero_bremen_1200.webp` passend neu erzeugen.
3. Open Graph Bild unter `assets/images/og_image_modern.webp` ersetzen.
4. Abmessungen und Seitenverhältnis beibehalten oder HTML Angaben anpassen.
5. Nur eigene, lizenzierte oder dokumentiert freigegebene Bilder verwenden.
6. Alternativtext an den tatsächlichen Bildinhalt anpassen.
7. Bildplan in `docs/BILDPLAN.md` beachten.

## Expertenprofile pflegen

Öffentliche Profile liegen im Array `public_profiles` in `data/experten.json`. Ein Profil wird nur ausgegeben, wenn `published` und `verified` beide den Wert `true` besitzen.

Vor Freigabe sind zu dokumentieren:

1. Identität und Kontaktdaten
2. Leistungen und Gebäudetypen
3. Tätigkeitsgebiete
4. Qualifikationen und offizieller Listeneintrag
5. Zustimmung zur Veröffentlichung personenbezogener Angaben
6. Rechte an Logo und Bildern
7. Prüfdatum und verantwortliche Person
8. Profilart Basis oder Premium

## Ratgeber pflegen

Beiträge liegen in `data/artikel.json`. Ein Beitrag erscheint nur mit `published_public: true`. Jeder Eintrag benötigt Titel, Einleitung, Abschnitte, Zusammenfassung, Handlungsschritte, Fragen, Quellen, Datum, Autor und Prüfstatus.

Zeitabhängige Aussagen müssen anhand der in `includes/config.php` hinterlegten Originalquellen neu geprüft werden. Die sichtbare fachliche Prüfung darf erst nach tatsächlicher Prüfung durch eine benannte qualifizierte Person angepasst werden.

## Sitemap

`sitemap.php` erzeugt die XML Sitemap dynamisch aus freigegebenen Hauptseiten und veröffentlichten Beiträgen. Sie ist unter `/sitemap.xml` erreichbar. Kontakt, Formulare, Rechtstexte, Filter und nicht freigegebene Profile werden nicht aufgenommen.

`robots.php` erzeugt die Datei `/robots.txt` abhängig von `PUBLIC_LAUNCH_READY`. Bei gesperrter Veröffentlichung bleibt die gesamte Installation für Suchmaschinen blockiert. Bei Freigabe wird die Sitemap der Hauptdomain genannt. Die statische `robots.txt` ist nur ein sperrender Sicherheitsfallback, falls die Apache-Umschreibung nicht aktiv ist.

Für den Livebetrieb gelten `SITE_BASE_URL=https://energieexperten-bremen.de` und die ausdrücklich gesetzte Servervariable `PUBLIC_LAUNCH_READY=true`. Ohne diesen Serverwert bleiben HTML-Seiten und die dynamische robots.txt aus Sicherheitsgründen vollständig für die Indexierung gesperrt.

## Google Search Console

1. Domain Property nach vollständiger Domain und HTTPS Einrichtung bestätigen.
2. `/sitemap.xml` einreichen.
3. Indexierung erst nach Ergänzung sämtlicher Pflichtangaben erlauben.
4. Seitenindexierung, strukturierte Daten und Core Web Vitals regelmäßig prüfen.
5. Parameteradressen und Suchfilter bleiben auf `noindex`.

## Strukturierte Daten

Die Seite erzeugt `Organization`, `WebSite`, `WebPage`, `BreadcrumbList`, `Service`, `Article`, `DefinedTermSet` und bei sichtbaren Fragen `FAQPage`. Es werden weder `LocalBusiness` noch Bewertungen oder Sterne ausgegeben.

Prüfung vor Veröffentlichung:

1. Schema Markup Validator
2. Google Test für Rich Results
3. Abgleich jeder strukturierten Angabe mit dem sichtbaren Inhalt
4. Erneute Prüfung nach Ergänzung echter Anbieterprofile

## Leistung und Core Web Vitals

1. Hero Bild besitzt feste Abmessungen und wird nicht verzögert geladen.
2. Es gibt keine externen Ressourcen oder Schriftarten.
3. JavaScript umfasst nur Navigation und Untermenü.
4. Statische Ressourcen erhalten lange Cachezeiten und eine Dateiversion in der Adresse.
5. Apache komprimiert Textressourcen.
6. Nach Produktivinstallation mit PageSpeed Insights und echten Felddaten prüfen.

## Dokumentation

1. `docs/ARCHITEKTUR.md`
2. `docs/KEYWORD_ZUORDNUNG.md`
3. `docs/QUELLEN.md`
4. `docs/BILDPLAN.md`
5. `docs/SEO_CHECKLISTE.md`
6. `docs/SICHERHEIT_CHECKLISTE.md`
7. `docs/DATENSCHUTZ_DOKUMENTATION.md`
8. `docs/DATENSCHUTZ_CHECKLISTE.md`
9. `docs/VEROEFFENTLICHUNG_CHECKLISTE.md`

## Spätere Datenbank oder Verwaltung

Die JSON Dateien können durch Repository Klassen ersetzt werden. Darstellung und Adressen bleiben dabei unverändert. Für ein Verwaltungsmodul werden Authentifizierung, Rollen, Protokollierung, Freigabestatus, sichere Medienverarbeitung, Versionierung, Datensicherung und ein dokumentierter Löschablauf benötigt.

## Veröffentlichungssperre

Die Webseite darf erst veröffentlicht werden, wenn die gesamte Liste in `docs/VEROEFFENTLICHUNG_CHECKLISTE.md` bestätigt wurde. Die technische Umsetzung ist keine rechtliche Freigabe.
