# ========================================================
# German Translation phrases for phpVideoPro
# ========================================================

UPDATE languages SET charset='iso-8859-1' WHERE lang_id='de';
INSERT INTO lang (message_id,lang,content) VALUES ('not_yet_implemented','de','Sorry - leider noch nicht verf�gbar.');
INSERT INTO lang VALUES('medium','de','Medium');
INSERT INTO lang VALUES('nr','de','Nr');
INSERT INTO lang VALUES('title','de','Titel');
INSERT INTO lang VALUES('length','de','L�nge');
INSERT INTO lang VALUES('year','de','Jahr');
INSERT INTO lang VALUES('date_rec','de','Aufnahmedatum');
INSERT INTO lang VALUES('category','de','Kategorie');
INSERT INTO lang VALUES('medialist','de','Medienliste');
INSERT INTO lang VALUES('enter_min_free','de','Mindestgr��e des freien Platzes in Minuten:');
INSERT INTO lang VALUES('display','de','Anzeigen');
INSERT INTO lang VALUES('free_space_on_media','de','Auf folgenden Medien sind noch mindestens %1 Minuten frei:');
INSERT INTO lang VALUES('free','de','Frei');
INSERT INTO lang VALUES('content','de','Inhalt');
INSERT INTO lang VALUES('filter_setup','de','Filter Setup');
INSERT INTO lang VALUES('mediatype','de','MedienTyp');
INSERT INTO lang VALUES('screen','de','Bildformat');
INSERT INTO lang VALUES('picture','de','Farbformat');
INSERT INTO lang VALUES('tone','de','Tonformat');
INSERT INTO lang VALUES('longplay','de','LongPlay');
INSERT INTO lang VALUES('fsk','de','FSK');
INSERT INTO lang VALUES('staff','de','Besetzung');
INSERT INTO lang VALUES('actor','de','Schauspieler');
INSERT INTO lang VALUES('actors','de','Schauspieler');
INSERT INTO lang VALUES('director','de','Regie');
INSERT INTO lang VALUES('directors','de','Regie');
INSERT INTO lang VALUES('composer','de','Musik');
INSERT INTO lang VALUES('music','de','Musik');
INSERT INTO lang VALUES('min','de','min');
INSERT INTO lang VALUES('max','de','max');
INSERT INTO lang VALUES('s/w','de','s/w');
INSERT INTO lang VALUES('farbe','de','Farbe');
INSERT INTO lang VALUES('3d','de','3D');
INSERT INTO lang VALUES('edit_entry','de','Bearbeite Datensatz %1');
INSERT INTO lang VALUES('view_entry','de','Anzeige des Datensatzes %1');
INSERT INTO lang VALUES('add_entry','de','Neuer Datensatz');
INSERT INTO lang VALUES('unknown','de','unbekannt');
INSERT INTO lang VALUES('country','de','Land');
INSERT INTO lang VALUES('medianr','de','MediaNr');
INSERT INTO lang VALUES('highest_db_entries','de','letzte DB-Eintr�ge');
INSERT INTO lang VALUES('no','de','Nein');
INSERT INTO lang VALUES('yes','de','Ja');
INSERT INTO lang VALUES('medialength','de','Bandl�nge');
INSERT INTO lang VALUES('minute_abbrev','de','min');
INSERT INTO lang VALUES('source','de','Quelle');
INSERT INTO lang VALUES('name','de','Name');
INSERT INTO lang VALUES('first_name','de','Vorname');
INSERT INTO lang VALUES('in_list','de','in Liste');
INSERT INTO lang VALUES('comments','de','Anmerkungen');
INSERT INTO lang VALUES('cancel','de','Abbrechen');
INSERT INTO lang VALUES('create','de','Erstellen');
INSERT INTO lang VALUES('update','de','Aktualisieren');
INSERT INTO lang VALUES('edit','de','Bearbeiten');
INSERT INTO lang VALUES('delete','de','L�schen');
INSERT INTO lang VALUES('invalid_media_nr','de','Die angegebene MediaNr ist entweder unvollst�ndig oder ung�ltig. Es mu� eine <b>Zahl</b> in <b>beiden</b> MediaNr Feldern eingegeben werden.');
INSERT INTO lang VALUES('warning','de','Warnung');
INSERT INTO lang VALUES('of_aquiration','de','der Aufnahme');
INSERT INTO lang VALUES('wrong_date','de','Das angegebene Datum %1 (%2) ist ung�ltig. Bitte geben Sie den Tag in das erste, den Monat in das zweite und das Jahr in das dritte Datumsfeld ein, und verwenden Sie ausschlie�lich Ziffern. Ist Ihnen der Wert f�r eines oder mehrere der Felder unbekannt (Sie wissen z.B. nur noch, dass Sie das Medium irgendwann im Februar 2002 erworben haben, erinnern sich jedoch nicht genau an den Tag), tragen Sie hierf�r Nullen ein (im genannten Beispiel "00" im Tagesfeld, "02" im Monats- und "2002" im Jahresfeld).');
INSERT INTO lang VALUES('incomplete_date','de','Ist das exakte Datum nicht bekannt (sondern z.B. nur die Jahreszahl "2000"), sind die unbekannten Werte durch Nullen zu ersetzen - im genannten Beispiel entspr�che das den Eingaben "00" "00" "2000".');
INSERT INTO lang VALUES('hit_back_to_correct','de','Bitte auf den "Zur�ck" Button des Browsers klicken, um die Eingabe zu korrigieren.');
INSERT INTO lang VALUES('dupe_id_entered','de','Es existiert bereits ein Datensatz mit der angegebenen MediaNr in der Datenbank. Zur Korrektur der Eingabe bitte den "Zur�ck" Button des Browsers bet�tigen. Hinweis: direkt neben dem Eingabefeld f�r die MediaNr befindet sich eine Auswahlbox. Diese gibt die h�chste vergebene ID f�r jedes Medium an. Normalerweise ist es eine gute Idee, f�r ein neues Medium die erste (vierstellige) Zahl, bzw. f�r einen neuen Film auf dem gleichen Medium die zweite (zweistellige) Zahl um 1 zu erh�hen.');
INSERT INTO lang VALUES('create_success','de','Datensatz erfolgreich erstellt');
INSERT INTO lang VALUES('update_failed','de','Datensatz konnte nicht aktualisiert werden');
INSERT INTO lang VALUES('update_success','de','Datensatz erfolgreich aktualisiert');
INSERT INTO lang VALUES('about','de','About');
INSERT INTO lang VALUES('history','de','History');
INSERT INTO lang VALUES('deleting_entry','de','L�sche Datensatz %1');
INSERT INTO lang VALUES('free_space_title','de','Verf�gbarer Platz auf Medien');
INSERT INTO lang VALUES('filter','de','Filter');
INSERT INTO lang VALUES('set_filter','de','Filter setzen');
INSERT INTO lang VALUES('unset_filter','de','Filter l�schen');
INSERT INTO lang VALUES('view','de','Anzeigen');
INSERT INTO lang VALUES('taperest_absolute','de','Bandrest (absolut)');
INSERT INTO lang VALUES('taperest_filtered','de','Bandrest (gefiltert)');
INSERT INTO lang VALUES('help','de','Hilfe');
INSERT INTO lang VALUES('general','de','Allgemein');
INSERT INTO lang VALUES('sure_to_delete','de','Alle Daten f�r %1 werden gel�scht! Fortfahren');
INSERT INTO lang VALUES('nobody_named','de','Es gibt keinen weiteren Film unter Mitwirkung von %1 %2 %3 in der Datenbank - dieser Name wird also aus der Tabelle gel�scht.');
INSERT INTO lang VALUES('compose_person','de','Komponist');
INSERT INTO lang VALUES('director_person','de','Regisseur');
INSERT INTO lang VALUES('check_completed','de','Pr�fung abgeschlossen');
INSERT INTO lang VALUES('delete_remaining','de','alle verbleibenden Daten dieses Films werden nun gel�scht');
INSERT INTO lang VALUES('ok','de','OK');
INSERT INTO lang VALUES('not_ok','de','Fehler');
INSERT INTO lang VALUES('recalc_free','de','Berechne freien Platz auf dem Medium');
INSERT INTO lang VALUES('tapelist_update_failed','de','Liste mit verf�gbarer Restzeit konnte nicht aktualisiert werden');
INSERT INTO lang VALUES('no_entry_in_tapelist','de','Fehlgeschlagen - kein Eintrag in Restzeit-Liste');
INSERT INTO lang VALUES('finnished','de','Fertig');
INSERT INTO lang VALUES('time_left','de','%1 Minuten frei');
INSERT INTO lang VALUES('configuration','de','Konfiguration');
INSERT INTO lang VALUES('index','de','Index');
INSERT INTO lang VALUES('intro','de','Einleitung');
INSERT INTO lang VALUES('menues','de','Men�s');
INSERT INTO lang VALUES('back','de','Zur�ck');
INSERT INTO lang VALUES('close','de','Schlie�en');
INSERT INTO lang VALUES('help_about','de','Hilfe zum Thema');
INSERT INTO lang VALUES('actors_list','de','Liste der Schauspieler');
INSERT INTO lang VALUES('directors_list','de','Liste der Regisseure');
INSERT INTO lang VALUES('music_list','de','Liste der Komponisten');
INSERT INTO lang VALUES('no_entries_found','de','Kein Datensatz gefunden');
INSERT INTO lang VALUES('no_space_of','de','Es konnte kein Medium mit mindestens %1 Minuten freiem Platz in der Datenbank gefunden werden.');
INSERT INTO lang VALUES('howto','de','HowTo\'s');
INSERT INTO lang VALUES('howto_lang','de','Wie erstelle ich eine neue Sprachdatei?');
INSERT INTO lang VALUES('howto_help','de','Wie erstelle ich eine Hilfedatei?');
INSERT INTO lang VALUES('howto_templates','de','Wie erstelle ich ein neues Template Set?');
INSERT INTO lang VALUES('language_settings','de','Spracheinstellungen');
INSERT INTO lang VALUES('scan_new_lang_files','de','Nach neuen Sprachdateien suchen?');
INSERT INTO lang VALUES('scan_new_lang_comment','de','(Nach Bereitstellung neuer Sprachdateien im Setup-Verzeichnis veranla�t dies phpVideoPro, diese zu aktivieren)');
INSERT INTO lang VALUES('select_add_lang','de','Zus�tzliche Sprache installieren');
INSERT INTO lang VALUES('select_add_lang_comment','de','(Englisch ist bereits installiert und wird generell ben�tigt - siehe n�chster Punkt. Bez�glich anderer bereits installierter Sprachen: siehe ebenfalls n�chster Punkt.)');
INSERT INTO lang VALUES('no_add_lang','de','Keine zus�tzliche Sprache verf�gbar.');
INSERT INTO lang VALUES('refresh_lang','de','�bersetzungen erneut einlesen');
INSERT INTO lang VALUES('refresh_lang_comment','de','(alte �bersetzungen l�schen und Sprachdatei erneut importieren)');
INSERT INTO lang VALUES('none','de','Keine');
INSERT INTO lang VALUES('select_primary_lang','de','Prim�re Sprache ausw�hlen');
INSERT INTO lang VALUES('select_primary_lang_comment','de','(Bei fehlenden �bersetzungen erfolgt ein Fall-Back zur Englischen Sprache)');
INSERT INTO lang VALUES('colors','de','Farben');
INSERT INTO lang VALUES('page_bg','de','Seiten-Hintergrund');
INSERT INTO lang VALUES('table_bg','de','Tabellen-Hintergrund');
INSERT INTO lang VALUES('th_bg','de','Tabellenkopf-Hintergrund');
INSERT INTO lang VALUES('feedback_ok','de','Positive Abfrage-Ergebnisse');
INSERT INTO lang VALUES('feedback_err','de','Negative Abfrage-Ergebnisse');
INSERT INTO lang VALUES('template_set','de','Template Set');
INSERT INTO lang VALUES('start_pvp','de','phpVideoPro starten');
INSERT INTO lang VALUES('goto_entry','de','Zeige folgenden Eintrag an:');
INSERT INTO lang VALUES('start_page','de','Startseite');
INSERT INTO lang VALUES('invalid_fsk','de','Der eingegebene Wert f�r %1 ist ung�ltig.<br>%1 steht f�r Freiwillige Selbst-Kontrolle und gibt das Mindestalter an, ab dem der Film zur Betrachtung freigegeben ist.');
INSERT INTO lang VALUES('counter_start_stop','de','Z�hler Start/Stop');
INSERT INTO lang VALUES('other_pages','de','Andere Seiten');
INSERT INTO lang VALUES('commercials','de','Werbung');
INSERT INTO lang VALUES('cut_off','de','entfernt');
INSERT INTO lang VALUES('display_limit','de','Datens�tze pro Seite');
INSERT INTO lang VALUES('display_limit_comment','de','(gibt an, wie viele Zeilen pro Seite bei Listen angezeigt werden sollen)');
INSERT INTO lang VALUES('print_label','de','Etikett drucken:');
INSERT INTO lang VALUES('howto_label','de','Wie erstelle/konfiguriere ich Vorlagen f�r Labels?');
INSERT INTO lang VALUES('label','de','Etikett');
INSERT INTO lang VALUES('print','de','Drucken');
INSERT INTO lang VALUES('medialist_num','de','Numerisch sortierte Medienliste');
INSERT INTO lang VALUES('medialist_alpha','de','Alphabetisch sortierte Medienliste');
INSERT INTO lang VALUES('lines_per_page','de','Zeilen pro Seite');
INSERT INTO lang VALUES('lines_per_page_comment','de','Dieser Wert gibt an, wieviele Textzeilen auf ein Blatt Papier passen (f�r den Listendruck).');
INSERT INTO lang VALUES('date_format','de','Datumsformat');
INSERT INTO lang VALUES('date_format_comment','de','Gibt an, in welchem Format Datumsangaben angezeigt werden sollen. Zur Verf�gung stehen die Formate y-m-d, d.m.y and d/m/y');
INSERT INTO lang VALUES('listgen','de','Listengenerator');
INSERT INTO lang VALUES('list','de','Liste');
INSERT INTO lang VALUES('format','de','Format');
INSERT INTO lang VALUES('line_count','de','Zeilen');
INSERT INTO lang VALUES('catlist_alpha','de','Nach Kategorien sortierte alphabetische Medienliste');
INSERT INTO lang VALUES('lists','de','Listen');
INSERT INTO lang VALUES('labels','de','Etiketten');
INSERT INTO lang VALUES('cat_adventure','de','Abenteuer');
INSERT INTO lang VALUES('cat_action','de','Action');
INSERT INTO lang VALUES('cat_agents','de','Agentenfilm');
INSERT INTO lang VALUES('cat_bible','de','Bibelfilm');
INSERT INTO lang VALUES('cat_biography','de','Biografie');
INSERT INTO lang VALUES('cat_stage','de','B�hnenst�ck');
INSERT INTO lang VALUES('cat_documentary','de','Dokumentarfilm');
INSERT INTO lang VALUES('cat_drama','de','Drama');
INSERT INTO lang VALUES('cat_fantasy','de','Fantasy');
INSERT INTO lang VALUES('cat_party','de','Feier');
INSERT INTO lang VALUES('cat_scary','de','Gruselfilm');
INSERT INTO lang VALUES('cat_history','de','Historie');
INSERT INTO lang VALUES('cat_horror','de','Horror');
INSERT INTO lang VALUES('cat_judaica','de','Judaistik');
INSERT INTO lang VALUES('cat_camera','de','Kamera');
INSERT INTO lang VALUES('cat_catastrophe','de','Katastrophe');
INSERT INTO lang VALUES('cat_children','de','Kinder');
INSERT INTO lang VALUES('cat_comedy','de','Kom�die');
INSERT INTO lang VALUES('cat_concert','de','Konzert');
INSERT INTO lang VALUES('cat_war','de','Kriegsfilm');
INSERT INTO lang VALUES('cat_crime','de','Krimi');
INSERT INTO lang VALUES('cat_love','de','Liebesfilm');
INSERT INTO lang VALUES('cat_fairytale','de','M�rchen');
INSERT INTO lang VALUES('cat_melodrama','de','Melodrama');
INSERT INTO lang VALUES('cat_monumental','de','Monumentalfilm');
INSERT INTO lang VALUES('cat_musical','de','Musical');
INSERT INTO lang VALUES('cat_music','de','Musik');
INSERT INTO lang VALUES('cat_videoclip','de','Videoclip');
INSERT INTO lang VALUES('cat_musicmovie','de','Musikfilm');
INSERT INTO lang VALUES('cat_nature','de','Naturfilm');
INSERT INTO lang VALUES('cat_opera','de','Oper');
INSERT INTO lang VALUES('cat_operetta','de','Operette');
INSERT INTO lang VALUES('cat_problem','de','Problemfilm');
INSERT INTO lang VALUES('cat_report','de','Reportage');
INSERT INTO lang VALUES('cat_satire','de','Satire');
INSERT INTO lang VALUES('cat_misc','de','Sonstige');
INSERT INTO lang VALUES('cat_sf','de','Science Fiction');
INSERT INTO lang VALUES('cat_show','de','Show');
INSERT INTO lang VALUES('cat_spy','de','Spionage');
INSERT INTO lang VALUES('cat_thriller','de','Thriller');
INSERT INTO lang VALUES('cat_animal','de','Tier');
INSERT INTO lang VALUES('cat_animals','de','Tierfilm');
INSERT INTO lang VALUES('cat_travesty','de','Travestie');
INSERT INTO lang VALUES('cat_vacation','de','Urlaub');
INSERT INTO lang VALUES('cat_xmas','de','Weihnachten');
INSERT INTO lang VALUES('cat_western','de','Western');
INSERT INTO lang VALUES('cat_westerncomedy','de','Western-Kom�die');
INSERT INTO lang VALUES('cat_cartoon','de','Zeichentrick');
INSERT INTO lang VALUES('db_stats','de','Statistiken');
INSERT INTO lang VALUES('stat_counts','de','Summen');
INSERT INTO lang VALUES('stat_ranks','de','Ranking');
INSERT INTO lang VALUES('movies','de','Filme');
INSERT INTO lang VALUES('media','de','Medien');
INSERT INTO lang VALUES('compose_persons','de','Komponisten');
INSERT INTO lang VALUES('director_persons','de','Regisseure');
INSERT INTO lang VALUES('actor_persons','de','Schauspieler');
INSERT INTO lang VALUES('categories','de','Kategorien');
INSERT INTO lang VALUES('countries','de','L�nder');
INSERT INTO lang VALUES('stat_categories','de','Kategorien (benutzt/alle)');
INSERT INTO lang VALUES('stats','de','Statistiken');
