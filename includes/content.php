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
                    'Wenn eine Förderung eine gelistete Fachperson verlangt, prüfen Sie die passende Eintragung direkt in der Energieeffizienz-Expertenliste des Bundes. Die Eintragung ist nach Tätigkeitsbereichen gegliedert. Eine Qualifikation für Wohngebäude umfasst nicht automatisch Nichtwohngebäude oder Baudenkmale.',
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
                'title' => 'Welcher Energieberater zu welchem Vorhaben passt',
                'paragraphs' => [
                    'Für ein Einfamilienhaus mit geplanter Dämmung werden andere Erfahrungen benötigt als für ein Mehrfamilienhaus, ein Baudenkmal oder eine Gewerbeimmobilie. Auch ein Heizungstausch, ein geförderter Sanierungsfahrplan und die Begleitung einer umfassenden Modernisierung stellen unterschiedliche Anforderungen an Berechnung, Nachweise und Projektorganisation.',
                    'Beschreiben Sie deshalb nicht nur die gewünschte Leistung, sondern auch Gebäudetyp, Baujahr, Nutzung, bekannte Schwachstellen und den geplanten Zeitraum. Anhand dieser Angaben lässt sich prüfen, ob die Fachperson die richtige Listenkategorie, vergleichbare Referenzen und ausreichend Kapazität besitzt.',
                ],
                'bullets' => ['Wohngebäude, Nichtwohngebäude oder gemischte Nutzung', 'Einzelmaßnahme oder schrittweise Gesamtsanierung', 'Beratung, Förderbegleitung oder Ausführungsplanung', 'Besondere Bauweise, Denkmalschutz oder Wohnungseigentümergemeinschaft', 'Gewünschter Beginn und realistische Bearbeitungszeit'],
            ],
            [
                'title' => 'So bereiten Sie das Erstgespräch vor',
                'paragraphs' => [
                    'Ein vorbereitetes Erstgespräch erleichtert eine belastbare Einschätzung und vergleichbare Angebote. Hilfreich sind vorhandene Pläne, Wohnflächen, Verbrauchsdaten, Angaben zur Heizung und Informationen über bereits ausgeführte Modernisierungen. Fehlende Unterlagen sollten offen benannt werden, damit zusätzlicher Erfassungsaufwand im Angebot berücksichtigt werden kann.',
                    'Notieren Sie außerdem, welche Entscheidung nach der Beratung möglich sein soll. Geht es um eine Kaufentscheidung, einen Förderantrag, eine Maßnahmenreihenfolge oder die konkrete Ausschreibung? Ein klares Ergebnisziel verhindert, dass eine allgemeine Beratung beauftragt wird, obwohl detaillierte Planung benötigt wird.',
                ],
            ],
            [
                'title' => 'Angebote sinnvoll vergleichen',
                'paragraphs' => [
                    'Vergleichen Sie nicht nur den Gesamtpreis. Entscheidend ist, welche Vor-Ort-Termine, Berechnungen, Varianten, Erläuterungen und Nacharbeiten enthalten sind. Auch die Begleitung bei Rückfragen von Förderstellen oder Fachunternehmen sollte eindeutig geregelt sein.',
                ],
                'bullets' => ['Ausgangslage und Beratungsziel', 'Enthaltene Vor-Ort-Termine', 'Berechnungen und Dokumente', 'Förderantrag und technische Bestätigungen', 'Fachplanung und Qualitätskontrolle', 'Zeitplan, Honorar und mögliche Zusatzkosten'],
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
            ['question' => 'Was beeinflusst das Honorar eines Energieberaters?', 'answer' => 'Gebäudegröße, vorhandene Unterlagen, gewünschte Berechnungen, Anzahl der Termine, Förderverfahren und zusätzliche Fachplanung beeinflussen den Aufwand. Vergleichen Sie deshalb Leistungsumfang und Ergebnis, nicht nur einen Endpreis.'],
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
                'title' => 'Welche Ergebnisse Sie erwarten können',
                'paragraphs' => [
                    'Das Ergebnis richtet sich nach dem vereinbarten Beratungsprodukt. Möglich sind eine mündliche Orientierung, ein schriftlicher Bericht, ein individueller Sanierungsfahrplan, Berechnungen zu Varianten oder eine Entscheidungsvorlage für Eigentümer. Im Angebot sollte stehen, welche Unterlagen übergeben werden und ob ein Abschlussgespräch enthalten ist.',
                    'Eine belastbare Beratung macht Annahmen und Unsicherheiten sichtbar. Sie erklärt nicht nur mögliche Einsparungen, sondern auch technische Voraussetzungen, Wechselwirkungen und die nächsten Planungsschritte. Pauschale Versprechen ohne dokumentierte Gebäudedaten sind keine verlässliche Grundlage für Investitionen.',
                ],
            ],
            [
                'title' => 'Maßnahmen als zusammenhängendes System bewerten',
                'paragraphs' => [
                    'Fenster, Dämmung, Luftdichtheit, Lüftung, Heizflächen und Wärmeerzeuger wirken zusammen. Werden beispielsweise erst Fenster ersetzt und Feuchte sowie Lüftung nicht berücksichtigt, können neue Risiken entstehen. Wird eine Heizung vor späterer Dämmung dimensioniert, kann ihre Leistung nach der Sanierung nicht mehr gut zum Gebäude passen.',
                    'Eine Energieberatung sollte diese Abhängigkeiten verständlich darstellen und eine sinnvolle Reihenfolge entwickeln. Für die spätere Ausführung sind dennoch Detailplanung, konkrete Angebote und gegebenenfalls weitere Fachdisziplinen erforderlich.',
                ],
                'cta' => ['label' => 'Sanierungsfahrplan in Bremen verstehen', 'url' => 'sanierungsfahrplan-bremen/'],
            ],
            [
                'title' => 'Kosten und Angebote einer Energieberatung vergleichen',
                'paragraphs' => [
                    'Der Aufwand hängt unter anderem von Größe und Komplexität des Gebäudes, der Qualität vorhandener Unterlagen, dem gewünschten Bericht und einer möglichen Förderabwicklung ab. Ein niedriger Preis ist wenig aussagekräftig, wenn Vor-Ort-Termin, Variantenvergleich oder Erläuterung fehlen.',
                    'Fordern Sie ein schriftliches Angebot mit Leistungsgrenzen, Ergebnisformat, Terminen und möglichen Zusatzkosten an. Klären Sie auch, ob Rückfragen nach Übergabe, Änderungen am Bericht oder die Vorbereitung weiterer Förderanträge enthalten sind.',
                ],
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
            ['question' => 'Was kostet eine Energieberatung in Bremen?', 'answer' => 'Ein pauschaler Preis wäre ohne Gebäude und Leistungsumfang nicht belastbar. Maßgeblich sind Größe, Komplexität, Unterlagen, Beratungsprodukt und zusätzliche Förder oder Planungsleistungen. Lassen Sie diese Bestandteile getrennt ausweisen.'],
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
                    ['title' => 'Vor-Ort-Aufnahme', 'text' => 'Bauteile, Anlagentechnik und bekannte Modernisierungen werden erfasst.'],
                    ['title' => 'Bilanz und Varianten', 'text' => 'Die Fachperson berechnet den Ausgangszustand und entwickelt abgestimmte Pakete.'],
                    ['title' => 'Dokumentation', 'text' => 'Sie erhalten die vorgesehenen Unterlagen mit Reihenfolge und Erläuterungen.'],
                    ['title' => 'Abschlussgespräch', 'text' => 'Ergebnisse, Unsicherheiten und nächste Entscheidungen werden besprochen.'],
                ],
            ],
            [
                'title' => 'Welche Unterlagen und Ergebnisse zum iSFP gehören',
                'paragraphs' => [
                    'Für die Bestandsaufnahme sind Pläne, Flächen, Verbrauchsdaten, Angaben zur Heizung und Nachweise bereits ausgeführter Maßnahmen hilfreich. Die Fachperson ergänzt diese Informationen durch den Vor-Ort-Termin und dokumentiert die energetisch relevanten Bauteile und Anlagen.',
                    'Ein geförderter individueller Sanierungsfahrplan wird nach den geltenden BAFA Vorgaben erstellt. Er soll sowohl den Ausgangszustand als auch aufeinander abgestimmte Sanierungsschritte verständlich darstellen. Lassen Sie sich die Ergebnisse erläutern und fragen Sie nach Annahmen, langfristig vorgesehenen Maßnahmen und Punkten, die vor einer Umsetzung genauer untersucht werden müssen.',
                ],
            ],
            [
                'title' => 'Vom Sanierungsfahrplan zur konkreten Maßnahme',
                'paragraphs' => [
                    'Vor der Umsetzung wird aus der strategischen Empfehlung eine konkrete Planung. Dazu können Bauteilaufbauten, Anschlussdetails, Wärmebrücken, Lüftung, Heizlast und technische Mindestanforderungen gehören. Erst auf dieser Grundlage lassen sich Angebote von Fachunternehmen sinnvoll vergleichen.',
                    'Wenn mehrere Jahre zwischen den Schritten liegen, sollten Gebäudestand, Preise, gesetzliche Anforderungen und Förderbedingungen jeweils neu geprüft werden. Dokumentieren Sie ausgeführte Maßnahmen, damit spätere Planer den tatsächlichen Stand kennen und weitere Schritte darauf abstimmen können.',
                ],
                'cta' => ['label' => 'Fachplanung und Baubegleitung ansehen', 'url' => 'baubegleitung-bremen/'],
            ],
            [
                'title' => 'Kostenfaktoren beim Sanierungsfahrplan',
                'paragraphs' => [
                    'Das Beratungshonorar wird insbesondere durch Gebäudegröße, Anzahl der Wohneinheiten, Bauweise, vorhandene Unterlagen und den Aufwand der Datenerfassung beeinflusst. Bei Wohnungseigentümergemeinschaften kommen Abstimmung und Ergebnispräsentation hinzu.',
                    'Fragen Sie, ob Antragstellung, Vor-Ort-Termin, Berechnung, iSFP-Dokumente, Abschlussgespräch und mögliche Nachbesserungen im Angebot enthalten sind. Eine Förderung reduziert gegebenenfalls den Eigenanteil, ersetzt aber nicht die Prüfung des vollständigen Honorars und der aktuellen Fördervoraussetzungen.',
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
            ['question' => 'Was ist der Unterschied zwischen iSFP und Energieberatung?', 'answer' => 'Energieberatung ist der Oberbegriff. Der individuelle Sanierungsfahrplan ist ein definiertes Beratungs und Dokumentationsformat für Wohngebäude, das den energetischen Ausgangszustand und abgestimmte Sanierungsschritte darstellt.'],
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
                'title' => 'Woran Sie einen sorgfältig erstellten Energieausweis erkennen',
                'paragraphs' => [
                    'Die Datengrundlage sollte zum Gebäude passen und nachvollziehbar erhoben werden. Prüfen Sie, ob Adresse, Gebäudeteil, Flächen, Baujahr, Anlagentechnik und Modernisierungen korrekt wiedergegeben sind. Unklare Angaben sollten vor der endgültigen Ausstellung geklärt werden.',
                    'Bei einem Bedarfsausweis ist eine belastbare Beschreibung von Gebäudehülle und Technik erforderlich. Beim Verbrauchsausweis müssen die verwendeten Abrechnungszeiträume und Daten vollständig sein. Ein besonders schneller Onlineprozess kann sinnvoll sein, wenn alle Informationen verlässlich vorliegen; er ersetzt jedoch keine Klärung fehlender oder widersprüchlicher Gebäudedaten.',
                ],
            ],
            [
                'title' => 'Welche Faktoren die Kosten beeinflussen',
                'paragraphs' => [
                    'Der Preis hängt vom Ausweistyp, der Gebäudegröße, der Anzahl der Einheiten, der Qualität vorhandener Unterlagen und dem notwendigen Erfassungsaufwand ab. Ein Bedarfsausweis erfordert üblicherweise mehr technische Daten als ein Verbrauchsausweis.',
                    'Lassen Sie sich vorab bestätigen, welcher Ausweis zulässig ist, welche Datenerhebung enthalten ist und ob ein Vor-Ort-Termin erforderlich oder angeboten wird. Auffällig niedrige Pauschalpreise sollten Sie insbesondere dann hinterfragen, wenn wesentliche Gebäudedaten noch fehlen.',
                ],
            ],
            [
                'title' => 'Angaben bei Verkauf und Vermietung vorbereiten',
                'paragraphs' => [
                    'Wer einen Verkauf oder eine Neuvermietung plant, sollte den Energieausweis frühzeitig beschaffen und die gesetzlich erforderlichen Angaben für Immobilienanzeigen vorbereiten. So bleibt Zeit, Unterlagen nachzureichen oder Unstimmigkeiten zu korrigieren.',
                    'Bei Eigentumswohnungen betrifft der Ausweis regelmäßig das Gebäude und nicht nur die einzelne Wohnung. Hausverwaltung oder Eigentümergemeinschaft können deshalb wichtige Ansprechpartner für vorhandene Dokumente und Verbrauchsdaten sein.',
                ],
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
            ['question' => 'Ist ein besonders günstiger Online Energieausweis ausreichend?', 'answer' => 'Entscheidend sind Zulässigkeit, korrekte Gebäudedaten und die Ausstellungsberechtigung. Ein Onlineprozess kann funktionieren, wenn die benötigten Angaben vollständig und plausibel sind. Fehlende Daten dürfen nicht durch ungesicherte Annahmen ersetzt werden.'],
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
                'title' => 'Was eine Fördermittelberatung leisten sollte',
                'paragraphs' => [
                    'Eine gute Beratung nennt nicht nur mögliche Programme. Sie ordnet das Vorhaben einem konkreten Förderweg zu, prüft die Antragsberechtigung und zeigt, welche technischen Anforderungen, Angebote und Bestätigungen benötigt werden. Ebenso wichtig ist eine klare Aussage dazu, welche Aufgaben die beratende Fachperson übernimmt und welche Schritte beim Eigentümer, Finanzierungspartner oder Fachunternehmen verbleiben.',
                    'Das Ergebnis sollte die zeitliche Reihenfolge von Planung, Antrag, Vertrag und Ausführung verständlich festhalten. Fördermöglichkeiten können sich ändern oder unter Haushaltsvorbehalt stehen. Deshalb muss erkennbar sein, zu welchem Datum die Bedingungen geprüft wurden und an welchen Stellen unmittelbar vor Antragstellung eine erneute Kontrolle erforderlich ist.',
                ],
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
                'title' => 'Unterlagen für Antrag und Nachweis vorbereiten',
                'paragraphs' => [
                    'Je nach Programm werden Gebäudedaten, Eigentumsnachweise, technische Projektbeschreibungen, Angebote und Bestätigungen einer qualifizierten Fachperson benötigt. Unvollständige oder nicht vergleichbare Angebote können den Ablauf verzögern. Fordern Sie deshalb Leistungsbeschreibungen an, die technische Qualität und förderfähige Positionen nachvollziehbar ausweisen.',
                    'Auch nach einer Zusage bleibt Dokumentation wichtig. Rechnungen, Zahlungsnachweise, technische Bestätigungen, Produktdaten und Änderungen während der Ausführung sollten geordnet aufbewahrt werden. Stimmen Sie Abweichungen vom beantragten Vorhaben vor der Umsetzung mit der zuständigen Stelle und der eingebundenen Fachperson ab.',
                ],
                'bullets' => ['Gebäude und Eigentumssituation', 'Technische Beschreibung der geplanten Maßnahme', 'Vollständige und vergleichbare Angebote', 'Erforderliche Fachunternehmer oder Expertenbestätigungen', 'Finanzierungsplan und mögliche Programmkombination', 'Nachweise für Abschluss und Verwendungsprüfung'],
            ],
            [
                'title' => 'Förderung ersetzt keine Wirtschaftlichkeitsprüfung',
                'paragraphs' => [
                    'Ein Zuschuss kann eine sinnvolle Maßnahme unterstützen, macht aber nicht jede technische Lösung automatisch wirtschaftlich. Vergleichen Sie Investition, laufende Kosten, Lebensdauer, Wartung und die Wirkung auf das gesamte Gebäude. Berücksichtigen Sie außerdem Maßnahmen, die ohnehin wegen Instandhaltung oder Komfort geplant sind.',
                    'Entscheidend ist die Lösung, die zum Gebäude und zur langfristigen Nutzung passt. Eine Fördermittelberatung sollte deshalb mit Energieberatung oder Fachplanung abgestimmt werden und nicht allein von der höchsten rechnerischen Förderung ausgehen.',
                ],
                'cta' => ['label' => 'Energieberatung als Grundlage ansehen', 'url' => 'energieberatung-bremen/'],
            ],
            [
                'title' => 'Aktueller Hinweis für Bremen',
                'paragraphs' => [
                    'Die früheren Bremer Landesprogramme zum Heizungstausch und zum Wärmeschutz im Wohngebäudebestand sind nach Angaben des Landes eingestellt. Für bereits fristgerecht gestellte Anträge nennt Bremen weiterhin die zuständigen Projektträger. Neue Vorhaben dürfen deshalb nicht mit diesen beendeten Programmen kalkuliert werden.',
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
            ['question' => 'Welche Förderprogramme gelten aktuell in Bremen?', 'answer' => 'Der Stand kann sich kurzfristig ändern. Die früheren Bremer Programme zum Heizungstausch und zum Wärmeschutz im Wohngebäudebestand sind eingestellt. Prüfen Sie neue Vorhaben in der offiziellen Bremer Förderübersicht sowie direkt bei BAFA und KfW.'],
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
                'title' => 'Leistungsumfang vor der Beauftragung festlegen',
                'paragraphs' => [
                    'Fachplanung und Baubegleitung sind keine einheitlichen Leistungspakete. Ein Angebot kann einzelne Berechnungen, die Vorbereitung einer Ausschreibung, Baustellentermine oder nur förderbezogene Bestätigungen enthalten. Beschreiben Sie deshalb, welche Entscheidungen vorbereitet und welche Ausführungsschritte tatsächlich kontrolliert werden sollen.',
                    'Vereinbaren Sie außerdem, wie Planänderungen, Rückfragen der Fachunternehmen und zusätzliche Termine behandelt werden. Bei mehreren Gewerken sollte klar sein, wer Schnittstellen koordiniert und wer Entscheidungen freigibt. Diese Abgrenzung schützt vor Lücken, die erst während der Bauarbeiten sichtbar werden.',
                ],
                'bullets' => ['Konkrete Planungsunterlagen und Berechnungen', 'Anzahl und Zeitpunkt der Baustellentermine', 'Prüfung von Angeboten oder Produktunterlagen', 'Dokumentationsform und Umgang mit Abweichungen', 'Zuständigkeit für Förderbestätigungen', 'Honorar für zusätzliche Leistungen'],
            ],
            [
                'title' => 'Kontrollen sinnvoll terminieren',
                'paragraphs' => [
                    'Viele Ausführungsdetails sind nach Fertigstellung verdeckt. Vereinbaren Sie deshalb Prüfzeitpunkte vor dem Schließen von Bauteilen, vor der Inbetriebnahme und vor der Schlussabnahme. Umfang und Stichprobentiefe gehören schriftlich in den Auftrag.',
                ],
            ],
            [
                'title' => 'Typische Prüfpunkte bei energetischen Maßnahmen',
                'paragraphs' => [
                    'Bei Dämmarbeiten sind Untergrund, Anschlüsse, Durchdringungen und Wärmebrücken entscheidend. Beim Fenstertausch müssen Einbaulage, Abdichtung und Lüftung zusammenpassen. Bei Wärmepumpen und anderen Heizsystemen beeinflussen Heizlast, Heizflächen, hydraulischer Abgleich, Regelung und Inbetriebnahme die spätere Effizienz.',
                    'Nicht jeder Prüfschritt erfordert denselben Aufwand. Die Fachperson sollte risikoreiche und später verdeckte Details priorisieren. Fotos, Messprotokolle und schriftlich festgehaltene Abweichungen erleichtern die Nachverfolgung und die spätere Gebäudedokumentation.',
                ],
            ],
            [
                'title' => 'Besonderheiten bei Sanierungen im Bremer Bestand',
                'paragraphs' => [
                    'Altbremer Häuser, dicht bebaute Reihenhäuser und Mehrfamilienhäuser stellen häufig besondere Anforderungen an Anschlüsse, Feuchteschutz, Schallschutz und die Abstimmung mit Nachbarbauteilen. Bei erhaltenswerter Fassade oder Denkmalschutz können innenseitige Lösungen und detaillierte bauphysikalische Prüfungen notwendig werden.',
                    'Auch Zugänglichkeit, bewohnter Zustand und enge Baustellenflächen beeinflussen Ablauf und Kontrolltermine. Eine frühzeitige Bestandsaufnahme hilft, diese Rahmenbedingungen in Planung, Ausschreibung und Terminfolge zu berücksichtigen.',
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
            ['question' => 'Was kostet eine energetische Baubegleitung?', 'answer' => 'Der Aufwand hängt von Maßnahme, Planungsumfang, Anzahl der Gewerke und vereinbarten Baustellenterminen ab. Lassen Sie Grundleistungen, Termine, Dokumentation und mögliche Zusatzleistungen getrennt anbieten.'],
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
                'title' => 'Beratungsziel und Systemgrenzen eindeutig festlegen',
                'paragraphs' => [
                    'Vor Beginn sollte geklärt werden, ob nur das Gebäude, einzelne technische Anlagen, betriebliche Prozesse oder der gesamte Standort betrachtet werden. Ohne eindeutige Systemgrenze lassen sich Kennwerte und Einsparpotenziale später nur schwer vergleichen. Bei vermieteten Objekten sind außerdem Zuständigkeiten und verfügbare Verbrauchsdaten früh abzustimmen.',
                    'Das Beratungsziel kann von einer schnellen Priorisierung gering investiver Maßnahmen bis zur Vorbereitung einer umfassenden Sanierung reichen. Für Unternehmen sind häufig auch Produktionsunterbrechungen, Komfortanforderungen, Mietverhältnisse und geplante Nutzungsänderungen entscheidend.',
                ],
            ],
            [
                'title' => 'Daten für eine belastbare Analyse',
                'bullets' => ['Energieverbräuche mit Zeitbezug', 'Nutzflächen, Zonen und Betriebszeiten', 'Pläne und Bauteilaufbauten', 'Daten zu Heizung, Lüftung, Kühlung und Beleuchtung', 'Prozesswärme und weitere betriebliche Verbraucher', 'Geplante Umbauten oder Nutzungsänderungen'],
            ],
            [
                'title' => 'Vom Verbrauchsprofil zu priorisierten Maßnahmen',
                'paragraphs' => [
                    'Jahressummen allein erklären noch nicht, wann und wodurch Energie verbraucht wird. Lastgänge, Betriebszeiten, Temperaturen und Nutzungszonen können zeigen, ob Anlagen außerhalb der Belegungszeiten laufen, Regelungen nicht passen oder einzelne Prozesse den Verbrauch dominieren.',
                    'Sinnvolle Empfehlungen unterscheiden zwischen organisatorischen Verbesserungen, Optimierung vorhandener Technik und investiven Maßnahmen. Jede Maßnahme sollte mit Voraussetzungen, möglicher Wechselwirkung, Umsetzungsfenster und einer nachvollziehbaren Priorität beschrieben werden.',
                ],
                'bullets' => ['Betriebszeiten und Regelparameter optimieren', 'Verbraucher und Lastspitzen transparent machen', 'Beleuchtung, Lüftung, Kälte und Wärme abstimmen', 'Gebäudehülle und Anlagentechnik gemeinsam bewerten', 'Investitionen mit ohnehin geplanten Umbauten verbinden'],
            ],
            [
                'title' => 'Ergebnisse in die betriebliche Umsetzung überführen',
                'paragraphs' => [
                    'Eine Beratung wird erst wirksam, wenn Verantwortlichkeiten, Budget und Termine festgelegt werden. Für priorisierte Maßnahmen sollten technische Planung, Beschaffung und mögliche Förderanträge in einer realistischen Reihenfolge organisiert werden. Verbrauchswerte nach der Umsetzung helfen zu prüfen, ob die erwartete Wirkung erreicht wird.',
                    'Bei mehreren Standorten oder größeren Organisationen ist ein einheitliches Daten und Maßnahmenmanagement sinnvoll. So können Entscheidungen nachvollzogen, Erfahrungen übertragen und weitere Effizienzpotenziale systematisch bearbeitet werden.',
                ],
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
            ['question' => 'Welche Daten sollte ein Unternehmen zuerst bereitstellen?', 'answer' => 'Hilfreich sind zeitlich zuordenbare Energieverbräuche, Flächen und Nutzungszonen, Betriebszeiten, Anlagendaten sowie Informationen zu geplanten Umbauten. Die Fachperson sollte vorab eine strukturierte Datenliste bereitstellen.'],
        ],
        'sources' => ['bafa_ebn', 'eee', 'kfw_beg'],
    ],
];
