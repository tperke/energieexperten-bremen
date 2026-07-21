# Sicherheitsprüfliste

## Umgesetzt

1. Sichere Sitzungseinstellungen mit HttpOnly und SameSite Lax
2. Secure Attribut bei verschlüsseltem Aufruf
3. Erneuerung der Sitzungskennung beim ersten Start
4. CSRF Token je Formularaufruf
5. Zeitbasierte Plausibilitätsprüfung
6. Unsichtbares Bot Feld
7. Begrenzung wiederholter Anfragen mit gesalzenem Hash
8. Serverseitige Längen und Formatprüfung
9. Sichere HTML Ausgabe
10. Schutz vor Header Injection durch feste Betreffzeilen und validierte Mailadressen
11. Keine Dateiübertragung
12. Keine Zugangsdaten im Repository
13. Technische Fehler werden nicht öffentlich angezeigt
14. Content Security Policy
15. Referrer Policy
16. Permissions Policy
17. Schutz vor MIME Sniffing
18. Schutz vor Einbettung in fremde Frames
19. Sperre interner Verzeichnisse
20. Keine Verzeichnisauflistung

## Vor Veröffentlichung zwingend prüfen

1. Zufälligen langen Wert für `RATE_LIMIT_SALT` als Umgebungsvariable setzen.
2. Fehlerprotokoll außerhalb des öffentlichen Webstamms speichern.
3. Schreibrechte auf das erforderliche Minimum begrenzen.
4. PHP und Servermodule auf unterstützte Versionen aktualisieren.
5. Produktive Fehlerseiten und Protokollrotation testen.
6. E Mail Zustellung, Absenderauthentifizierung und Missbrauchsschutz testen.
7. Content Security Policy im Browser auf Verstöße prüfen.
8. HTTPS Konfiguration mit einem aktuellen Prüfdienst bewerten.
9. Sicherungen verschlüsseln und Wiederherstellung testen.
10. Verantwortlichkeiten für Sicherheitsupdates festlegen.
11. Externe Sicherheitsprüfung vor produktiver Formularfreigabe durchführen.

## Spätere Funktionen

Eine Datenbank, Benutzerkonten, Uploads oder ein Verwaltungsmodul dürfen erst nach eigenem Bedrohungsmodell, Rollenprüfung, Protokollierung, Dateiprüfung und Sicherungskonzept aktiviert werden.

