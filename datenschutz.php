<?php

declare(strict_types=1);
require __DIR__ . '/includes/bootstrap.php';
$breadcrumbs = [['name' => 'Startseite', 'url' => site_url()], ['name' => 'Datenschutz', 'url' => site_url('datenschutz/')]];
site_header('datenschutz', ['breadcrumbs' => $breadcrumbs]);
render_breadcrumbs($breadcrumbs);
?>
<main id="main-content">
    <section class="page-hero compact"><div class="wrap narrow"><p class="eyebrow">Datenschutzinformationen</p><h1>Datenschutzerklärung</h1><p class="lead">Hier erfahren Sie, welche personenbezogenen Daten beim Besuch dieser Website und bei der Nutzung der Formulare verarbeitet werden.</p></div></section>
    <section class="section legal-page"><div class="wrap narrow">
        <h2>1. Verantwortlicher</h2>
        <address>neu-protec Mediendesign<br>Thomas Perke<br>Hamburger Str. 43<br>40221 Düsseldorf<br>Deutschland</address>
        <p>Telefon: <a href="tel:+4915678281339">0156 – 78 281 339</a><br>E-Mail: <a href="mailto:info@neu-protec.de">info@neu-protec.de</a></p>

        <h2>2. Hosting und Serverprotokolle</h2>
        <p>Diese Website wird bei der IONOS SE, Elgendorfer Str. 57, 56410 Montabaur, gehostet. Beim Aufruf verarbeitet der Webserver technisch erforderliche Verbindungsdaten. Dazu gehören insbesondere IP-Adresse, Datum und Uhrzeit, aufgerufene Adresse, HTTP-Status, übertragene Datenmenge, zuvor besuchte Seite sowie Angaben zu Browser und Betriebssystem.</p>
        <p>Die Verarbeitung dient der sicheren, stabilen und fehlerfreien Bereitstellung der Website. Rechtsgrundlage ist Art. 6 Abs. 1 Buchst. f DSGVO. Unser berechtigtes Interesse liegt in Betrieb, Sicherheit und Missbrauchserkennung. IONOS speichert anonymisierte Daten der Websitebesucher nach eigenen Angaben acht Wochen. IONOS handelt als Auftragsverarbeiter. Eine Übermittlung in ein Drittland findet bei diesem Hosting nach Angaben von IONOS nicht statt.</p>

        <h2>3. Verschlüsselte Übertragung</h2>
        <p>Die Website wird über HTTPS bereitgestellt. Dadurch werden Daten, die Sie an uns übermitteln, nach dem Stand der Technik verschlüsselt übertragen. Eine vollständig risikofreie Datenübertragung im Internet kann dennoch nicht garantiert werden.</p>

        <h2>4. Technisch erforderliches Sitzungscookie</h2>
        <p>Beim Aufruf eines Formulars verwendet die Website das technisch notwendige Sitzungscookie <code>eeb_session</code>. Reine Informationsseiten setzen dieses Cookie nicht. Es enthält eine zufällige Sitzungskennung und schützt Formulare insbesondere vor gefälschten Anfragen. Das Cookie wird beim Schließen des Browsers gelöscht und ist mit HttpOnly sowie SameSite=Lax versehen; bei HTTPS zusätzlich mit Secure.</p>
        <p>Rechtsgrundlagen sind § 25 Abs. 2 Nr. 2 TDDDG für die Speicherung im Endgerät sowie Art. 6 Abs. 1 Buchst. f DSGVO für die anschließende Verarbeitung. Unser berechtigtes Interesse ist der sichere Betrieb der ausdrücklich angeforderten Formularfunktion. Eine Einwilligung ist hierfür nicht erforderlich.</p>

        <h2>5. Schutz vor automatisierten und wiederholten Anfragen</h2>
        <p>Zur Abwehr von Missbrauch verarbeiten wir Formularart, Zeitpunkte und einen serverseitig mit einem geheimen Schlüssel gebildeten Prüfwert aus der IP-Adresse. Die IP-Adresse wird dabei nicht im Klartext in der Begrenzungsdatei gespeichert. Die Einträge werden nach einer Stunde nicht mehr berücksichtigt. Rechtsgrundlage ist Art. 6 Abs. 1 Buchst. f DSGVO; unser berechtigtes Interesse ist der Schutz der Website und der Kommunikationskanäle.</p>

        <h2>6. Kontakt- und Beratungsanfragen</h2>
        <p>Im Kontaktformular verarbeiten wir Name, E-Mail-Adresse, Thema und Nachricht. Bei einer Beratungsanfrage verarbeiten wir zusätzlich Gebäudeart, Postleitzahl, gegebenenfalls Baujahr, Zahl der Einheiten, gewünschte Leistung, geplante Maßnahme, Beschreibung, gewünschten Kontaktweg und freiwillig die Telefonnummer. Zweck ist die Bearbeitung der von Ihnen gewünschten Kontaktaufnahme und die Einordnung Ihres Anliegens.</p>
        <p>Rechtsgrundlage ist Art. 6 Abs. 1 Buchst. b DSGVO, soweit Ihre Anfrage auf einen Vertrag oder vorvertragliche Maßnahmen gerichtet ist. In allen anderen Fällen ist sie Art. 6 Abs. 1 Buchst. f DSGVO; unser berechtigtes Interesse ist die sachgerechte Bearbeitung eingehender Anfragen. Eine automatische Weitergabe an Energieberater findet nicht statt. Vor einer möglichen Weitergabe nennen wir den konkreten Empfänger und holen, soweit erforderlich, eine gesonderte Bestätigung ein.</p>

        <h2>7. Anbieteranfragen</h2>
        <p>Bei einer Anbieteranfrage verarbeiten wir Unternehmensname, Kontaktperson, E-Mail-Adresse, freiwillige Website- und Listeneintragsadressen sowie die Leistungsbeschreibung. Zweck ist die Prüfung einer möglichen Aufnahme in das Verzeichnis. Rechtsgrundlage ist Art. 6 Abs. 1 Buchst. b DSGVO für vorvertragliche Maßnahmen sowie ergänzend Art. 6 Abs. 1 Buchst. f DSGVO für die nachvollziehbare Qualitätsprüfung. Eine Veröffentlichung erfolgt erst nach gesonderter Prüfung und Freigabe.</p>

        <h2>8. E-Mail-Versand</h2>
        <p>Formularnachrichten werden verschlüsselt per SMTP an <a href="mailto:info@energieexperten-bremen.de">info@energieexperten-bremen.de</a> übermittelt. E-Mail-Dienstleister ist die IONOS SE, Elgendorfer Str. 57, 56410 Montabaur. Die SMTP-Verbindung nutzt SSL/TLS. IONOS verarbeitet die Daten als Auftragsverarbeiter. Rechtsgrundlage ist entsprechend dem jeweiligen Anliegen Art. 6 Abs. 1 Buchst. b oder f DSGVO.</p>

        <h2>9. Empfänger und Drittlandübermittlung</h2>
        <p>Empfänger sind neu-protec Mediendesign sowie IONOS im Rahmen von Hosting und E-Mail-Betrieb. Weitere Empfänger erhalten personenbezogene Daten nur, wenn dies zur Bearbeitung erforderlich ist, eine gesetzliche Pflicht besteht oder Sie zuvor entsprechend informiert wurden. Die derzeit eingesetzten Dienste sind für eine Verarbeitung in Deutschland beziehungsweise der Europäischen Union konfiguriert. Eine Übermittlung außerhalb des Europäischen Wirtschaftsraums ist nicht vorgesehen.</p>

        <h2>10. Speicherdauer</h2>
        <p>Kontakt-, Beratungs- und Anbieteranfragen werden grundsätzlich spätestens sechs Monate nach Abschluss der Bearbeitung gelöscht. Eine längere Speicherung erfolgt nur, wenn sie für ein Vertragsverhältnis, die Geltendmachung oder Abwehr von Ansprüchen oder gesetzliche Aufbewahrungspflichten erforderlich ist. Sitzungscookies enden mit der Browsersitzung, die Begrenzung wiederholter Formularanfragen wirkt für eine Stunde und IONOS speichert die genannten Besucherdaten nach eigenen Angaben acht Wochen. Gesetzlich aufbewahrungspflichtige Geschäftsunterlagen werden für die jeweils vorgeschriebene Dauer gespeichert.</p>

        <h2>11. Keine Analyse, Werbung oder externen Medien</h2>
        <p>Wir verwenden keine Webanalyse, Werbepixel, extern geladenen Schriftarten, Karten, eingebetteten Videos, Social-Media-Plugins oder Marketingcookies. Die Website nutzt weder Local Storage noch Session Storage.</p>

        <h2>12. Ihre Rechte</h2>
        <p>Sie haben nach Maßgabe der gesetzlichen Voraussetzungen das Recht auf Auskunft (Art. 15 DSGVO), Berichtigung (Art. 16 DSGVO), Löschung (Art. 17 DSGVO), Einschränkung der Verarbeitung (Art. 18 DSGVO) und Datenübertragbarkeit (Art. 20 DSGVO). Erteilte Einwilligungen können Sie jederzeit mit Wirkung für die Zukunft widerrufen.</p>
        <p>Sie können einer Verarbeitung, die auf Art. 6 Abs. 1 Buchst. e oder f DSGVO beruht, aus Gründen Ihrer besonderen Situation jederzeit widersprechen (Art. 21 DSGVO). Gegen Direktwerbung können Sie jederzeit ohne Angabe von Gründen widersprechen; Direktwerbung findet auf dieser Website derzeit nicht statt.</p>
        <p>Zur Ausübung Ihrer Rechte schreiben Sie an <a href="mailto:info@neu-protec.de">info@neu-protec.de</a>. Sie haben außerdem nach Art. 77 DSGVO das Recht, sich bei einer Datenschutzaufsichtsbehörde zu beschweren. Zuständig ist insbesondere die Landesbeauftragte für Datenschutz und Informationsfreiheit Nordrhein-Westfalen, Postfach 20 04 44, 40102 Düsseldorf, <a href="https://www.ldi.nrw.de/kontakt" rel="noopener noreferrer">www.ldi.nrw.de/kontakt</a>.</p>

        <h2>13. Pflicht zur Bereitstellung und automatisierte Entscheidungen</h2>
        <p>Die als Pflichtfelder gekennzeichneten Angaben benötigen wir zur Bearbeitung Ihrer Anfrage. Ohne diese Angaben können wir das Formularanliegen nicht bearbeiten. Eine gesetzliche Pflicht zur Bereitstellung besteht nicht. Es finden keine automatisierte Entscheidungsfindung und kein Profiling im Sinne von Art. 22 DSGVO statt.</p>

        <h2>14. Stand</h2>
        <p>Stand: 22. Juli 2026. Wir passen diese Datenschutzerklärung an, wenn sich die Website, die eingesetzten Dienste oder die Rechtslage ändern.</p>
    </div></section>
</main>
<?php site_footer(); ?>
