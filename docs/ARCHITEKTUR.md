# Architekturentscheidungen

## Grundprinzip

Das Projekt verwendet kleine PHP Einstiegspunkte für jede Hauptseite. Gemeinsame Darstellung, Sicherheit, Suchmaschinenangaben und strukturierte Daten liegen in wiederverwendbaren Komponenten. Wichtige Inhalte werden vollständig im ersten HTML Dokument ausgegeben und benötigen kein JavaScript.

## Komponenten

1. `bootstrap.php` startet eine sichere Sitzung und lädt Abhängigkeiten.
2. `config.php` enthält Betreiber, Funktionen, Dienste, Quellen und Funktionsschalter.
3. `seo.php` ordnet jeder Hauptseite einen individuellen Titel, eine Beschreibung und eine kanonische Adresse zu.
4. `schema.php` erzeugt nur strukturierte Daten, die auch sichtbar sind.
5. `content.php` enthält redaktionelle Leistungsseiten.
6. `page_renderer.php` sorgt für eine konsistente zugängliche Ausgabe.
7. `form_security.php` kapselt Formularschutz, Validierung und Versand.
8. JSON Dateien trennen veränderliche Datensätze von Darstellungscode.

## Sicherheitsgrenzen

1. Interne Verzeichnisse sind per Apache Regel gesperrt.
2. Formulare akzeptieren keine Dateiübertragung.
3. Eingaben werden serverseitig begrenzt, normalisiert und bei Ausgabe maskiert.
4. Zugangsdaten werden ausschließlich als Umgebungsvariablen erwartet.
5. Fehler werden nicht im Browser angezeigt.
6. Anfragebegrenzung speichert nur einen zeitlich begrenzten Hash aus Formularart und Internet Protokoll Adresse im temporären Systemverzeichnis.

## Erweiterbarkeit

Für eine Datenbank wird eine Zugriffsschicht zwischen JSON Daten und Darstellung eingeführt. Die aktuelle Profil und Artikelstruktur kann als Migrationsschema dienen. Ein Verwaltungsmodul benötigt getrennte Rollen für Redaktion, Prüfung und Veröffentlichung.

