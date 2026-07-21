<?php

declare(strict_types=1);

$pages = [
    'energieberater' => [
        'eyebrow' => 'Qualifikation und Auswahl',
        'title' => 'Energieberater in Bremen passend auswählen',
        'lead' => 'Ein geeigneter Energieberater verbindet fachliche Qualifikation mit Erfahrung für Ihr Gebäude und Ihr konkretes Vorhaben. Dieses Portal hilft Ihnen, Leistungen, Nachweise und Angebote nachvollziehbar zu vergleichen.',
        'service' => 'Suche und Auswahl qualifizierter Energieberater in Bremen',
        'sections' => [
            [
                'title' => 'Woran Sie einen geeigneten Experten erkennen',
                'paragraphs' => [
                    'Die Berufsbezeichnung allein sagt noch nicht, für welche Förderprogramme oder Gebäudetypen eine Person qualifiziert ist. Fragen Sie deshalb nach Ausbildung, Weiterbildung, Berufserfahrung, Referenzen und dem konkreten Leistungsumfang.',
                    'Wenn eine Förderung eine gelistete Fachperson verlangt, prüfen Sie die passende Eintragung direkt in der Energieeffizienz Expertenliste des Bundes. Die Eintragung ist nach Tätigkeitsbereichen gegliedert. Eine Qualifikation für Wohngebäude umfasst nicht automatisch Nichtwohngebäude oder Baudenkmale.',
                ],
                'bullets' => ['Passende Listenkategorie für das Vorhaben', 'Erfahrung mit dem Gebäudetyp und der geplanten Maßnahme', 'Schriftliches Angebot mit klaren Leistungen und Ergebnissen', 'Erklärung möglicher Interessenkonflikte', 'Nachvollziehbare Erreichbarkeit und Terminplanung'],
            ],
            [
                'title' => 'Welche Aufgaben ein Energieberater übernehmen kann',
                'paragraphs' => [
                    'Je nach Auftrag untersucht die Fachperson den energetischen Zustand, erfasst Bauteile und Anlagentechnik, bewertet Sanierungsvarianten und erläutert sinnvolle Reihenfolgen. Hinzukommen können Fördermittelberatung, Fachplanung, Nachweise und die Begleitung der Ausführung.',
                    'Klären Sie vor Auftragserteilung, ob nur eine erste Orientierung, ein vollständiger Sanierungsfahrplan, ein Energieausweis oder eine förderfähige Fachplanung benötigt wird. So vermeiden Sie Lücken und bezahlen nicht für Leistungen, die Sie nicht brauchen.',
                ],
            ],
            [
                'title' => 'Angebote sinnvoll vergleichen',
                'paragraphs' => [
                    'Vergleichen Sie nicht nur den Gesamtpreis. Entscheidend ist, welche Vor Ort Termine, Berechnungen, Varianten, Erläuterungen und Nacharbeiten enthalten sind. Auch die Begleitung bei Rückfragen von Förderstellen oder Fachunternehmen sollte eindeutig geregelt sein.',
                ],
                'bullets' => ['Ausgangslage und Beratungsziel', 'Enthaltene Vor Ort Termine', 'Berechnungen und Dokumente', 'Förderantrag und technische Bestätigungen', 'Fachplanung und Qualitätskontrolle', 'Zeitplan, Honorar und mögliche Zusatzkosten'],
            ],
            [
                'title' => 'So unterstützt das Portal',
                'paragraphs' => [
                    'Öffentliche Profile werden erst nach Prüfung wesentlicher Angaben freigeschaltet. Bezahlte Hervorhebungen ändern nicht die fachliche Prüfung und werden sichtbar als Premiumeintrag oder Anzeige gekennzeichnet.',
                    'Das Verzeichnis befindet sich im Aufbau. Bis reale und bestätigte Profile vorliegen, verweisen wir für die Suche zusätzlich auf die offizielle Expertenliste des Bundes.',
                ],
                'cta' => ['label' => 'Zum Expertenverzeichnis', 'url' => 'energieexperten/'],
            ],
        ],
        'faqs' => [
            ['question' => 'Ist jeder Energieberater für Förderanträge zugelassen?', 'answer' => 'Nein. Entscheidend sind das Förderprogramm, die Maßnahme und die dafür erforderliche Eintragung oder Qualifikation. Prüfen Sie den konkreten Tätigkeitsbereich in der offiziellen Expertenliste.'],
            ['question' => 'Sollte der Berater zugleich ausführender Fachbetrieb sein?', 'answer' => 'Das kann fachlich möglich sein, sollte aber transparent besprochen werden. Fragen Sie nach wirtschaftlichen Interessen und vereinbaren Sie eindeutig, wer Planung, Ausführung und Kontrolle übernimmt.'],
            ['question' => 'Wie viele Angebote sollte ich einholen?', 'answer' => 'Bei umfangreichen Beratungen oder Fachplanungen sind mehrere vergleichbare Angebote sinnvoll. Wichtig ist ein identischer oder zumindest klar abgegrenzter Leistungsumfang.'],
            ['question' => 'Sind Profile im Portal automatisch eine Empfehlung?', 'answer' => 'Nein. Ein Profil stellt bestätigte Angaben dar. Es ersetzt nicht Ihre eigene Auswahlentscheidung und keine individuelle fachliche oder rechtliche Prüfung.'],
        ],
        'sources' => ['eee', 'bafa_ebw'],
    ],
    'energieberatung' => [
        'eyebrow' => 'Gebäude als Gesamtsystem betrachten',
        'title' => 'Energieberatung in Bremen verständlich planen',
        'lead' => 'Eine Energieberatung untersucht Gebäudehülle, Heizung, Warmwasser und Nutzung im Zusammenhang. Sie schafft eine belastbare Grundlage, bevor einzelne Maßnahmen beauftragt werden.',
        'service' => 'Energieberatung für Wohngebäude in Bremen',
        'sections' => [
            [
                'title' => 'Wann eine Energieberatung sinnvoll ist',
                'paragraphs' => [
                    'Eine Beratung ist besonders hilfreich vor dem Kauf eines älteren Gebäudes, vor einem Heizungstausch, bei hohen Verbräuchen oder wenn mehrere Sanierungsschritte anstehen. Sie kann auch klären, welche Maßnahme zuerst sinnvoll ist und welche technischen Abhängigkeiten bestehen.',
                    'Bei einem Altbau sollten Fassade, Dach, Fenster, Lüftung und Wärmeverteilung gemeinsam betrachtet werden. Eine Einzelentscheidung ohne Gesamtbild kann spätere Arbeiten erschweren oder unnötig verteuern.',
                ],
            ],
            [
                'title' => 'Typischer Ablauf in fünf Schritten',
                'steps' => [
                    ['title' => 'Ziel klären', 'text' => 'Sie beschreiben Gebäude, Anlass, Budgetrahmen und geplante Maßnahmen.'],
                    ['title' => 'Unterlagen sichten', 'text' => 'Pläne, Verbrauchsdaten, Abrechnungen und Angaben zur Anlagentechnik werden vorbereitet.'],
                    ['title' => 'Gebäude aufnehmen', 'text' => 'Die Fachperson prüft Bauteile und Technik vor Ort und dokumentiert den Zustand.'],
                    ['title' => 'Varianten bewerten', 'text' => 'Maßnahmen, Reihenfolge, Wechselwirkungen und mögliche Förderwege werden eingeordnet.'],
                    ['title' => 'Ergebnisse besprechen', 'text' => 'Sie erhalten verständliche Unterlagen und klären offene Fragen sowie nächste Schritte.'],
                ],
            ],
            [
                'title' => 'Diese Unterlagen erleichtern die Beratung',
                'bullets' => ['Baupläne und Wohnflächenberechnung, sofern vorhanden', 'Energieverbrauch oder Brennstoffmengen der letzten Jahre', 'Schornsteinfegerprotokolle und Angaben zur Heizung', 'Rechnungen oder Nachweise früherer Sanierungen', 'Fotos schwer zugänglicher Bauteile', 'Ziele, Prioritäten und geplanter Zeitrahmen'],
                'paragraphs' => ['Fehlende Unterlagen schließen eine Beratung nicht grundsätzlich aus. Teilen Sie früh mit, was vorhanden ist. Die Fachperson kann dann den zusätzlichen Aufwand einschätzen.'],
            ],
            [
                'title' => 'Besonderheiten in Bremen',
                'paragraphs' => [
                    'In Bremen treffen ältere Reihenhäuser, Mehrfamilienhäuser, Nachkriegsbauten und neuere Gebäude auf unterschiedliche Wärmeversorgungen. Für eine belastbare Entscheidung sind deshalb die konkrete Bauweise, mögliche Feuchtefragen, Denkmalschutz und die örtliche Perspektive der Wärmeversorgung einzubeziehen.',
                    'Das Klima Bau Zentrum Bremen bietet eine kostenfreie Orientierung. Für förderfähige Berechnungen, Sanierungsfahrpläne oder Fachplanungen kann anschließend eine entsprechend qualifizierte Fachperson erforderlich sein.',
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'Ist eine Energieberatung vor dem Heizungstausch sinnvoll?', 'answer' => 'Ja, besonders wenn Gebäudehülle, Heizflächen oder Wärmeverteilung noch verändert werden könnten. Der künftige Wärmebedarf beeinflusst die passende Leistung und Betriebsweise der Heizung.'],
            ['question' => 'Wie lange dauert eine Energieberatung?', 'answer' => 'Das hängt von Gebäudegröße, Beratungsziel, Unterlagen und Leistungsumfang ab. Lassen Sie sich Terminplan und Ergebnisform vor Auftragserteilung schriftlich nennen.'],
            ['question' => 'Ersetzt eine erste Orientierung den Sanierungsfahrplan?', 'answer' => 'Nein. Eine Orientierungsberatung kann nächste Schritte klären, enthält aber nicht automatisch die detaillierte Bestandsaufnahme und Dokumentation eines individuellen Sanierungsfahrplans.'],
            ['question' => 'Gibt es eine Förderung für die Beratung?', 'answer' => 'Für bestimmte Energieberatungen bestehen Bundesprogramme. Bedingungen und Förderhöhe können sich ändern. Prüfen Sie den aktuellen Stand beim BAFA, bevor ein Auftrag verbindlich begonnen wird.'],
        ],
        'sources' => ['bafa_ebw', 'klimabauzentrum', 'bremen_geg'],
    ],
    'sanierungsfahrplan' => [
        'eyebrow' => 'Schritte sinnvoll abstimmen',
        'title' => 'Individueller Sanierungsfahrplan für Gebäude in Bremen',
        'lead' => 'Ein individueller Sanierungsfahrplan beschreibt, wie ein Wohngebäude schrittweise oder in einem Zug energetisch verbessert werden kann. Er ordnet Maßnahmen so, dass spätere Arbeiten bereits mitgedacht werden.',
        'service' => 'Individueller Sanierungsfahrplan für Wohngebäude in Bremen',
        'sections' => [
            [
                'title' => 'Was der Sanierungsfahrplan leistet',
                'paragraphs' => [
                    'Die Beratung beginnt mit einer Aufnahme des aktuellen Zustands. Daraus entwickelt die Fachperson Sanierungspakete, beschreibt deren Reihenfolge und erläutert Auswirkungen auf Energiebedarf, Technik und Gebäudehülle.',
                    'Der Plan ist eine Orientierung und kein Bauvertrag. Vor der Umsetzung müssen Maßnahmen technisch geplant, Angebote eingeholt und aktuelle Förderbedingungen geprüft werden.',
                ],
            ],
            [
                'title' => 'Wann sich ein Sanierungsfahrplan besonders anbietet',
                'bullets' => ['Mehrere Maßnahmen sind über einige Jahre verteilt geplant', 'Ein älteres Gebäude soll systematisch modernisiert werden', 'Heizung und Gebäudehülle müssen aufeinander abgestimmt werden', 'Beim Kauf einer Immobilie soll der Modernisierungsbedarf eingeordnet werden', 'Eine Wohnungseigentümergemeinschaft benötigt eine gemeinsame Entscheidungsgrundlage'],
            ],
            [
                'title' => 'Von der Bestandsaufnahme bis zur Erläuterung',
                'steps' => [
                    ['title' => 'Auftrag und Ziele', 'text' => 'Gebäude, Wünsche und Grenzen des Auftrags werden festgelegt.'],
                    ['title' => 'Vor Ort Aufnahme', 'text' => 'Bauteile, Anlagentechnik und bekannte Modernisierungen werden erfasst.'],
                    ['title' => 'Bilanz und Varianten', 'text' => 'Die Fachperson berechnet den Ausgangszustand und entwickelt abgestimmte Pakete.'],
                    ['title' => 'Dokumentation', 'text' => 'Sie erhalten die vorgesehenen Unterlagen mit Reihenfolge und Erläuterungen.'],
                    ['title' => 'Abschlussgespräch', 'text' => 'Ergebnisse, Unsicherheiten und nächste Entscheidungen werden besprochen.'],
                ],
            ],
            [
                'title' => 'Förderung und Aktualität',
                'paragraphs' => [
                    'Das BAFA fördert unter bestimmten Voraussetzungen Energieberatungen für Wohngebäude. Für die Anerkennung in weiteren Förderwegen müssen Form, Fachperson und Verfahren den aktuellen Vorgaben entsprechen.',
                    'Planen Sie nicht mit einem Bonus oder einer Förderquote, bevor die Originalquelle geprüft und die Förderfähigkeit des konkreten Vorhabens geklärt wurde. Änderungen können auch zwischen Beratung und Umsetzung eintreten.',
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'Muss ich alle vorgeschlagenen Maßnahmen umsetzen?', 'answer' => 'Nein. Der Plan unterstützt Ihre Entscheidungen. Welche Maßnahmen Sie wann beauftragen, bestimmen Sie unter Beachtung rechtlicher Anforderungen und technischer Abhängigkeiten selbst.'],
            ['question' => 'Wie lange ist ein Sanierungsfahrplan sinnvoll nutzbar?', 'answer' => 'Das Gebäudekonzept kann länger Orientierung geben. Förderregeln, Preise, Technik und gesetzliche Vorgaben müssen jedoch vor jeder Umsetzung neu geprüft werden.'],
            ['question' => 'Kann ein Sanierungsfahrplan für eine Eigentümergemeinschaft erstellt werden?', 'answer' => 'Ja, sofern Gebäude, Auftrag und Entscheidungswege geeignet sind. Die Erläuterung in der Eigentümerversammlung sollte von Beginn an vereinbart werden.'],
            ['question' => 'Ist der Sanierungsfahrplan eine Ausführungsplanung?', 'answer' => 'Nein. Für konkrete Baumaßnahmen sind je nach Vorhaben zusätzliche Fachplanung, Berechnungen, Ausschreibung und Qualitätskontrolle erforderlich.'],
        ],
        'sources' => ['bafa_ebw', 'bafa_isfp', 'eee'],
    ],
    'energieausweis' => [
        'eyebrow' => 'Energiekennwerte transparent machen',
        'title' => 'Energieausweis in Bremen richtig einordnen',
        'lead' => 'Ein Energieausweis beschreibt die energetische Qualität eines Gebäudes mit gesetzlich vorgegebenen Angaben. Welcher Ausweistyp zulässig oder erforderlich ist, hängt vom Gebäude und vom Anlass ab.',
        'service' => 'Ausstellung und Einordnung von Energieausweisen in Bremen',
        'sections' => [
            [
                'title' => 'Bedarfsausweis und Verbrauchsausweis',
                'paragraphs' => [
                    'Der Bedarfsausweis beruht auf einer technischen Bewertung von Gebäudehülle und Anlagentechnik. Der Verbrauchsausweis stützt sich auf dokumentierte Verbrauchsdaten und wird stärker vom Verhalten sowie von der Nutzung beeinflusst.',
                    'Die Wahl ist nicht in jedem Fall frei. Lassen Sie vor der Bestellung prüfen, welcher Typ für Gebäude, Baualter, Anzahl der Einheiten und Anlass zulässig ist. Maßgeblich ist die aktuelle gesetzliche Fassung.',
                ],
            ],
            [
                'title' => 'Typische Anlässe',
                'bullets' => ['Verkauf eines Gebäudes oder einer Einheit', 'Neu abgeschlossener Miet oder Pachtvertrag', 'Neubau oder bestimmte umfangreiche Änderungen', 'Freiwillige Einordnung im Rahmen einer Sanierungsplanung'],
                'paragraphs' => ['Es bestehen gesetzliche Ausnahmen. Verlassen Sie sich bei Sonderfällen, Denkmalen oder gemischt genutzten Gebäuden nicht auf pauschale Aussagen.'],
            ],
            [
                'title' => 'Welche Angaben benötigt werden',
                'bullets' => ['Adresse, Baujahr und Gebäudenutzung', 'Flächen und Anzahl der Nutzungseinheiten', 'Aufbau von Wänden, Dach, Decken und Fenstern', 'Heizung, Warmwasser und Energieträger', 'Verbrauchsabrechnungen für den erforderlichen Zeitraum, sofern relevant', 'Nachweise über Modernisierungen'],
            ],
            [
                'title' => 'Energieausweis und Energieberatung sind nicht dasselbe',
                'paragraphs' => [
                    'Der Ausweis schafft eine standardisierte energetische Einordnung. Er enthält jedoch nicht automatisch eine ausführliche Planung, Kostenbewertung oder abgestimmte Sanierungsstrategie.',
                    'Wenn konkrete Maßnahmen bevorstehen, kann eine weitergehende Beratung sinnvoll sein. So werden nicht nur Kennwerte dokumentiert, sondern Varianten und Reihenfolge auf das Gebäude abgestimmt.',
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'Wie lange ist ein Energieausweis gültig?', 'answer' => 'Die Gültigkeit und mögliche Gründe für eine vorzeitige Neuerstellung richten sich nach der aktuellen gesetzlichen Regelung. Prüfen Sie Ausstellungsdatum und Gebäudeveränderungen mit einer berechtigten Fachperson.'],
            ['question' => 'Kann ich den Ausweistyp frei wählen?', 'answer' => 'Nicht immer. Gebäudeart, Größe, Baualter und energetischer Zustand können die zulässige Form bestimmen.'],
            ['question' => 'Darf jeder Energieberater einen Energieausweis ausstellen?', 'answer' => 'Die Ausstellungsberechtigung richtet sich nach gesetzlichen Qualifikationsanforderungen. Lassen Sie sich die Berechtigung für den konkreten Ausweis bestätigen.'],
            ['question' => 'Reicht ein Energieausweis für eine Sanierungsentscheidung?', 'answer' => 'In der Regel nicht. Für eine abgestimmte Sanierung sind eine genauere Bestandsaufnahme, Varianten und gegebenenfalls Fachplanung sinnvoll.'],
        ],
        'sources' => ['bremen_geg', 'eee'],
    ],
    'foerdermittel' => [
        'eyebrow' => 'Anträge vor dem Vorhaben planen',
        'title' => 'Fördermittelberatung für Sanierungen in Bremen',
        'lead' => 'Eine Fördermittelberatung ordnet Programme, Voraussetzungen und Antragsschritte für Ihr konkretes Vorhaben. Sie sollte beginnen, bevor Lieferungen, Leistungen oder Bauarbeiten förderschädlich beauftragt werden.',
        'service' => 'Fördermittelberatung für energetische Maßnahmen in Bremen',
        'sections' => [
            [
                'title' => 'Bund und Land getrennt prüfen',
                'paragraphs' => [
                    'Bundesprogramme unterstützen je nach Vorhaben Energieberatung, einzelne Sanierungsmaßnahmen, Heizungstechnik oder die Sanierung zu einem Effizienzgebäude. Zuständigkeiten liegen je nach Programm beim BAFA oder bei der KfW.',
                    'Das Land Bremen veröffentlicht eigene Förderangebote und deren aktuellen Status. Manche Programme können beendet oder ausgesetzt sein. Veraltete Zusammenfassungen sind deshalb keine sichere Entscheidungsgrundlage.',
                ],
            ],
            [
                'title' => 'Diese Fragen gehören an den Anfang',
                'bullets' => ['Wer ist antragsberechtigt?', 'Welcher Gebäudetyp und welche Nutzung liegen vor?', 'Welche technischen Anforderungen gelten?', 'Wann gilt das Vorhaben als begonnen?', 'Welche Fachperson muss eingebunden werden?', 'Sind Programme kombinierbar?', 'Welche Nachweise sind bis zum Abschluss erforderlich?'],
            ],
            [
                'title' => 'Sicherer Ablauf',
                'steps' => [
                    ['title' => 'Vorhaben abgrenzen', 'text' => 'Maßnahmen, Gebäude und Eigentumssituation werden eindeutig beschrieben.'],
                    ['title' => 'Originalquellen prüfen', 'text' => 'Aktuelle Richtlinie, Merkblatt und Produktseite werden gemeinsam ausgewertet.'],
                    ['title' => 'Fachperson klären', 'text' => 'Erforderliche Qualifikation und Aufgaben werden vor dem Antrag festgelegt.'],
                    ['title' => 'Antrag vorbereiten', 'text' => 'Angebote, Bestätigungen und technische Daten werden vollständig zusammengestellt.'],
                    ['title' => 'Erst danach umsetzen', 'text' => 'Aufträge und Beginn folgen in der für das Programm zulässigen Reihenfolge.'],
                ],
            ],
            [
                'title' => 'Aktueller Hinweis für Bremen',
                'paragraphs' => [
                    'Das frühere Bremer Landesprogramm zum Heizungstausch ist nach Angaben des Landes eingestellt. Andere Angebote, etwa zum Wärmeschutz im Wohngebäudebestand, werden in der offiziellen Förderübersicht geführt. Prüfen Sie Status und Antragsannahme unmittelbar vor Ihrer Entscheidung.',
                    'Auch Bundesbedingungen wurden am 21. Juli 2026 angepasst. Dieses Portal nennt daher nur eingeordnete Grundsätze und verlinkt für Beträge und Bedingungen direkt zu den zuständigen Stellen.',
                ],
                'callout' => 'Beginnen Sie keine Maßnahme allein aufgrund einer allgemeinen Förderübersicht. Maßgeblich sind die Bedingungen am relevanten Antragszeitpunkt und die Situation Ihres Vorhabens.',
            ],
        ],
        'faqs' => [
            ['question' => 'Kann eine Förderung nach Beginn beantragt werden?', 'answer' => 'Das hängt vom Programm ab und ist häufig ausgeschlossen oder nur unter eng definierten Bedingungen möglich. Prüfen Sie die Reihenfolge vor jeder verbindlichen Beauftragung.'],
            ['question' => 'Garantiert eine Beratung die Förderung?', 'answer' => 'Nein. Eine Beratung kann die Antragstellung vorbereiten. Über die Bewilligung entscheidet die zuständige Stelle nach den geltenden Bedingungen.'],
            ['question' => 'Sind Bundes und Landesmittel kombinierbar?', 'answer' => 'Eine Kombination kann möglich, begrenzt oder ausgeschlossen sein. Prüfen Sie beide Richtlinien und die zulässige Förderhöchstgrenze für das konkrete Vorhaben.'],
            ['question' => 'Wer stellt technische Bestätigungen aus?', 'answer' => 'Das richtet sich nach Programm und Maßnahme. Häufig ist eine dafür qualifizierte Energieeffizienz Fachperson oder ein Fachunternehmen einzubinden.'],
        ],
        'sources' => ['kfw_beg', 'bafa_ebw', 'bremen_funding'],
    ],
    'baubegleitung' => [
        'eyebrow' => 'Vom Konzept zur fachgerechten Ausführung',
        'title' => 'Energetische Fachplanung und Baubegleitung in Bremen',
        'lead' => 'Fachplanung übersetzt ein Sanierungsziel in ausführbare Vorgaben. Baubegleitung prüft wichtige Schritte, dokumentiert die Umsetzung und hilft, Abweichungen früh zu erkennen.',
        'service' => 'Energetische Fachplanung und Baubegleitung in Bremen',
        'sections' => [
            [
                'title' => 'Warum Planung vor der Ausführung wichtig ist',
                'paragraphs' => [
                    'Dämmung, Fenster, Luftdichtheit, Lüftung, Heizflächen und Wärmeerzeuger beeinflussen sich gegenseitig. Fachplanung legt Anschlüsse, Qualitäten, Berechnungen und Schnittstellen fest, bevor auf der Baustelle entschieden werden muss.',
                    'Bei mehreren Gewerken sollte klar sein, wer die Gesamtkoordination übernimmt. Ein Sanierungsfahrplan allein ersetzt diese Detailarbeit nicht.',
                ],
            ],
            [
                'title' => 'Mögliche Leistungen',
                'bullets' => ['Prüfung vorhandener Unterlagen und Planungsziele', 'Wärmeschutz und Wärmebrückenplanung', 'Luftdichtheits und Lüftungskonzept', 'Heizlast, Heizflächen und Anlagenabstimmung', 'Technische Leistungsbeschreibung für Angebote', 'Prüfung ausgewählter Ausführungsschritte', 'Dokumentation und Bestätigung für Förderverfahren'],
            ],
            [
                'title' => 'Kontrollen sinnvoll terminieren',
                'paragraphs' => [
                    'Viele Ausführungsdetails sind nach Fertigstellung verdeckt. Vereinbaren Sie deshalb Prüfzeitpunkte vor dem Schließen von Bauteilen, vor der Inbetriebnahme und vor der Schlussabnahme. Umfang und Stichprobentiefe gehören schriftlich in den Auftrag.',
                ],
            ],
            [
                'title' => 'Abgrenzung zur Bauleitung',
                'paragraphs' => [
                    'Der Begriff Baubegleitung beschreibt nicht automatisch eine umfassende Bauleitung oder Objektüberwachung. Klären Sie Verantwortlichkeiten, Anwesenheit, Haftung und Dokumentation ausdrücklich. Das gilt besonders bei Umbauten im bewohnten Bestand und bei mehreren ausführenden Unternehmen.',
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'Ist Baubegleitung förderfähig?', 'answer' => 'Für bestimmte Förderprogramme können Fachplanung und Baubegleitung berücksichtigt werden. Voraussetzungen und Höchstgrenzen müssen vor Beauftragung in der aktuellen Richtlinie geprüft werden.'],
            ['question' => 'Wie oft sollte die Fachperson auf die Baustelle kommen?', 'answer' => 'Das richtet sich nach Maßnahme, Risiken und Bauablauf. Entscheidend sind die prüfbaren Meilensteine, nicht eine pauschale Zahl von Besuchen.'],
            ['question' => 'Wer behebt festgestellte Mängel?', 'answer' => 'Die ausführenden Vertragspartner schulden ihre vereinbarte Leistung. Die Fachperson dokumentiert im beauftragten Umfang und unterstützt bei der fachlichen Einordnung.'],
            ['question' => 'Kann der Energieberater die Planung aller Gewerke übernehmen?', 'answer' => 'Nur wenn Qualifikation, Auftrag und Kapazität das abdecken. Für Statik, Brandschutz, Elektroplanung oder andere Fachgebiete können zusätzliche Planer erforderlich sein.'],
        ],
        'sources' => ['kfw_beg', 'eee'],
    ],
    'nichtwohngebaeude' => [
        'eyebrow' => 'Unternehmen und größere Gebäude',
        'title' => 'Energieberatung für Nichtwohngebäude in Bremen',
        'lead' => 'Büros, Praxen, Handel, Produktion und kommunale Gebäude erfordern eine Beratung, die Nutzung, Betriebszeiten, Gebäudehülle und technische Anlagen gemeinsam bewertet.',
        'service' => 'Energieberatung für Nichtwohngebäude in Bremen',
        'sections' => [
            [
                'title' => 'Andere Nutzung, andere Bilanz',
                'paragraphs' => [
                    'Bei Nichtwohngebäuden prägen Beleuchtung, Lüftung, Kühlung, Prozesse und wechselnde Nutzungszeiten den Energiebedarf. Deshalb lassen sich Vorgehen und Ergebnisse einer Wohngebäudeberatung nicht einfach übertragen.',
                    'Gemischt genutzte Gebäude benötigen eine saubere Abgrenzung. Bereits zu Beginn sollte geklärt werden, welche Gebäudeteile, Anlagen und Verbräuche in den Auftrag einbezogen werden.',
                ],
            ],
            [
                'title' => 'Mögliche Beratungswege',
                'bullets' => ['Energieaudit nach DIN EN 16247', 'Energieberatung nach DIN V 18599', 'Contracting Orientierungsberatung', 'Sanierung zu einem Effizienzgebäude', 'Fachplanung einzelner technischer oder baulicher Maßnahmen'],
                'paragraphs' => ['Welcher Weg passt, hängt von Unternehmensgröße, rechtlichen Pflichten, Gebäude, Ziel und möglichem Förderprogramm ab. Eine erste Abgrenzung verhindert doppelte Datenerhebung.'],
            ],
            [
                'title' => 'Daten für eine belastbare Analyse',
                'bullets' => ['Energieverbräuche mit Zeitbezug', 'Nutzflächen, Zonen und Betriebszeiten', 'Pläne und Bauteilaufbauten', 'Daten zu Heizung, Lüftung, Kühlung und Beleuchtung', 'Prozesswärme und weitere betriebliche Verbraucher', 'Geplante Umbauten oder Nutzungsänderungen'],
            ],
            [
                'title' => 'Förderung und fachliche Zuständigkeit',
                'paragraphs' => [
                    'Das BAFA führt ein Programm für Energieberatung für Nichtwohngebäude, Anlagen und Systeme. Geförderte Beratung nach DIN V 18599 soll Energieeffizienz und erneuerbare Energien in Planung und Entscheidung einbeziehen.',
                    'Prüfen Sie die passende Listenkategorie der Fachperson. Eine Eintragung für Wohngebäude genügt nicht automatisch für Beratung und Förderbegleitung bei Nichtwohngebäuden.',
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'Was gilt als Nichtwohngebäude?', 'answer' => 'Entscheidend ist die überwiegende Nutzung. Bei gemischten Gebäuden muss fachlich und rechtlich geprüft werden, wie die Bereiche behandelt werden.'],
            ['question' => 'Ist ein Energieaudit dasselbe wie eine Gebäudeberatung?', 'answer' => 'Nein. Ziele, Normgrundlage, Datentiefe und mögliche gesetzliche Pflichten unterscheiden sich. Lassen Sie den passenden Auftrag vorab abgrenzen.'],
            ['question' => 'Welche Förderung gibt es für die Beratung?', 'answer' => 'Das BAFA beschreibt aktuelle Module und Bedingungen. Förderfähigkeit und Höhe hängen unter anderem vom Vorhaben und der Gebäudegröße ab.'],
            ['question' => 'Müssen Produktionsprozesse einbezogen werden?', 'answer' => 'Wenn sie für Ziel, Audit oder Energiebilanz relevant sind, ja. Gebäude und Prozesse sollten so abgegrenzt werden, dass keine wesentlichen Verbräuche übersehen werden.'],
        ],
        'sources' => ['bafa_ebn', 'eee', 'kfw_beg'],
    ],
];

