<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Language Lines
    |--------------------------------------------------------------------------
    |
    | Main language lines sorted by files
    | Lines are used multiple times, when they are similar in different views.
    | That means that new lines in this file only appear, when they appeared 
    | for the first time while locating the files.
    |
    | -Structure,etc. can be changed, but remember to change all trans() and strings accordingly
    |
    | You want to add a new language? Steps:
    | in config/language.php add it in the following form: 'de' => 'Deutsch',
    | in lara/resources/lang add a new folder + file in this style
    |
    |
    */

    // /app
    // /resources/views
    // /resources/views/errors

    //-----------------------------------------------------------------------------------------------------

    // /resources/views/layouts/master.blade.php
    'notWorkingMail'        => 'Eine Planke ist lose? Versende :Name eine Taube!',
    //'moreInfos'           => 'Mehr Infos? Besuche die ',
    //'projectsite'         => 'Projektseite auf GitHub',
    'moreInfosProjectsite'  => 'Land in sicht? Kletter\' in den Mast!',
    
    //-----------------------------------------------------------------------------------------------------

    // resources/views
    // resources/views/clubEventView.blade.php

    //Event types ------------------------------------
    'type'                  => 'Fall',
    'normalProgramm'        => 'Seemanslieder singen',
    'information'           => 'Ausschau halten',
    'special'               => 'Festmahl',
    'LiveBandDJ'            => 'Seeschlacht',
    'internalEvent'         => 'Feirn im engsten Kreise',
    'utilization'           => 'Passagierbeförderung',
    'flooding'              => 'Deck schrubben',
    'flyersPlacard'         => 'Rum verteilen',
    'marketingFlyersPlacard'=> 'Anhoyern', //used in legend.blade.php
    'preSale'               => 'Seelenverkäufer',
    'others'                => 'Sonstiges',
    
    //----------------------------------------------
    
    'begin'                 => 'Beginn',
    'end'                   => 'Ende',
    
    'DV-Time'               => 'An Bord sein',
    'club'                  => 'Schiff',
    'internalEventP'        => 'Feirn im engsten Kreise', // Placeholder string
    'internEventP'          => 'Feirn im engsten Kreise', // Placeholder string for example used in monthCell.blade.php
    
    'willShowFor'           => 'Ahoi an',
    
    'changeEvent'           => 'Veranstaltung ändern',
    'seeAttendanceList'    =>  'Gefangenenliste ansehen',
    'deleteEvent'           => 'Veranstaltung löschen',
    'confirmDeleteEvent'    => 'Diese Veranstaltung wirklich entfernen? Diese Aktion kann nicht rückgängig gemacht werden!',
    'createGuestAttendanceList'=>'Gäste/Anwesenheitsliste erstellen',
    'additionalInfo'        => 'Flaschenpost',
    'moreDetails'           => 'Ansagen vom Kapitän',
    
    //Button
    'showMore'              => 'Mehr!',
    'showLess'              => 'Verschwinde!',
    
    'Guestlist'             => 'Matrosenliste',
    'Attendancelist'        => 'Gefangenenliste',
    'Schedule'              => 'Meuterplan',

    'hideTimes'             => 'Gläser wegpacken',
    
    'addComment'            => 'Blödsinn ausrufen',  //not used Line ClubEventView ~270 Placeholder message and similar
    
    //List of Changes
    'listChanges'           => 'Schiffsregister',

    'work'                  => 'Dienst',
    'whatChanged'           => 'Was wurde geändert?',
    'oldEntry'              => 'Alter Eintrag',
    'newEntry'              => 'Neuer Eintrag',
    'whoBlame'              => 'Wer ist schuld?',
    'whenWasIt'             => 'Wann war das?',

    //-------------------------------------------------------------------------------------------------------
    
    // resources/views/createClubEventView.blade.php
    'createNewVEvent'       => 'Neue Veranstaltung erstellen',
    'createNewEvent'        => 'Neues Event erstellen',
    'template'              => 'Vorlage',
    'templateNewSaveQ'      => 'Als neue Vorlage speichern?',
    'title'                 => 'Titel',
    'subTitle'              => 'Subtitel',
    'error'                 => 'Fehler',
    
    'showExtern'            => 'Für Externe sichtbar machen?',

    'survey'                => 'Umfrage',

    //blockString line~168
    'showForLoggedInMember'     => 'Dieses Event wird nur für eingeloggte Mitglieder sichtbar sein!',
    'showForExternOrChangeType' => 'Um sie für Externe sichtbar zu machen oder den Typ zu ändern,',
    'askTheCLOrMM'              => 'frage die Admiralität oder den Smutje.',

    'section'               => 'Abteil',
    'showFor'               => 'Zeige für',
    
    'passwordEntry'         => 'Passwort zum Eintragen',
    'passwordRepeat'        => 'Passwort wiederholen',
    'passwordDeleteMessage' => 'Um das Passwort zu löschen trage in beide Felder "delete" ein (ohne Anführungszeichen).',

    'moreInfos'             => 'Weitere Details',
    'public'                => 'öffentlich',
    'details'               => 'Interne Information',
    'showOnlyIntern'        => 'nur intern sichtbar',
    
    'backWithoutChange'     => 'Ohne Änderung zurück',
    
    //---------------------------------------------------------------------------------------------------------
    
    // resources/views/editClubEventView.blade.php
    'changeEventJob'        => 'Veranstaltung/Aufgabe ändern',
    
    //Lines for editing only with permission
    'noNotThisWay'          => 'Ne, das geht so nicht...',
    'onlyThe'               => 'Nur die',
    'only'                  => 'Nur',
    'clubManagement'        => 'Admiral',
    'orThe'                 => 'oder die',
    'marketingManager'      => 'Smutje',
    'canChangeEventJob'     => 'dürfen diese Veranstaltung/Aufgabe ändern.',
    'commaThe'              => ', die ', //line number ~332
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/createSurveyView.blade.php
    'createNewSurvey'       => 'Neue Umfrage erstellen',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/editSurveyView.blade.php
    'editSurvey'            => 'Umfrage editieren',
    'confirmDeleteSurvey'   => 'Möchtest du die Umfrage ":title" wirklich löschen?',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/surveyView.blade.php
    'description'           => 'Beschreibung',
    'surveyDeadlineTo'      => 'Die Umfrage läuft noch bis',
    'um'                    => 'um', //better translation needed 
    
    //result messages; can be changed with pluralization
    'noPersonAnswered'      => 'Es hat noch keine Person abgestimmt.',
    'onePersonAnswered'     => 'Es hat bereits eine Person abgestimmt.',
    'fewPersonAnswered1'    => 'Es haben bereits',
    'fewPersonAnswered2'    => 'Personen abgestimmt.',
    
    //tableau (head)
    'name'                  => 'Name',
    'myClub'                => 'Schiff',

    'addMe'                 => 'Anhoyern!',
    'surname'               => 'Stammnamen',
    'firstname'             => 'Ich-Namen',
    
    //Answers
    'yes'                   => 'Ja',
    'no'                    => 'Nein',
    'noInformation'         => 'keine Angabe',
    
    'noClub'                => 'Extern',
    
    'confirmDeleteAnswer'   => 'Möchtest Du diese Antwort wirklich löschen?',
    
    //evaluation; can be changed with pluralization
    'evaluation'            => 'Auswertung',
    'personDidNotAnswer'    => 'Person wollte keine Angaben machen.',
    'personsDidNotAnswer'   => 'Personen wollten keine Angaben machen.',
    'personAnswered'        => 'Person stimmte für',
    'personsAnswered'       => 'Personen stimmten für',
    
    //List of Changes
    'who'                   => 'Wer',
    'summary'               => 'Zusammenfassung',
    'affectedColumn'        => 'Betroffene Spalte',
    'oldValue'              => 'Alter Wert',
    'newValue'              => 'Neuer Wert',
    'when'                  => 'Wann',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/monthView.blade.php
    //short weekdays + CW
    'Cw' => 'KW',
    'Mo' => 'Manendach',
    'Tu' => 'Dinxendach',
    'We' => 'Woensdach',
    'Th' => 'Donresdach',
    'Fr' => 'Vridach',
    'Sa' => 'Saterdagh',
    'Su' => 'Sonnendach',


    // resources/view/partials/calendarLinkEvent.blade.php
    'addToCalendar' => 'Schiffroute auf dem Rücken tätowieren',

    // resources/views/partials/month/day.blade.php
    'createEventOnThisDate' => 'Neue Fahrt an diesem Tag ansagen',

    // resources/views/partials/month/monthCell.blade.php
    'showDetails' => 'Die Mannschaft besuchen',

    // resources/views/monthView.blade.php
    'showWeek' => 'Detaillierte Ansicht dieser Woche anzeigen',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/createSurveyView.blade.php
    'noEventsThisWeek'  => 'Keine Veranstaltungen diese Woche',
    'noSurveysThisWeek' => 'Keine Umfragen diese Woche',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/listView.blade.php
    'for'               => 'Für',
    'noEventsPlanned'   => 'sind keine Veranstaltungen geplant',
    'noEventsOn'        => 'Keine Veranstaltungen am',
    'EventsFor'         => 'Veranstaltungen für',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/log.blade.php
    // not translated - international view
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials
    // /resources/views/partials/clubEventByIdSmall.blade.php
    'noResults'             => 'Keine Treffer',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/editSchedule.blade.php
    'adjustRoster'          => 'Dienstplan anpassen',
    'serviceTypeEnter'      => 'Diensttyp hier eingeben',
    'weight'                => 'Gewicht (für Statistik)',
    'statisticalEvaluation' => 'Kombüse',
    'editAttendanceList'    => 'Gefangenenliste erstellen',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/filter.blade.php
    'allSections'           => 'Alle Schiffe',
    'comments'              => 'Ausrufe',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/legend.blade.php
    //handled in the event type part in the /resources/views/clubEventView.blade.php part
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/monthCell.blade.php
    'internalSurvey'        => 'Interne Umfrage',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/navigation.blade.php
    'month'                 => 'Jahreszwölftel',
    'week'                  => 'Trinkzeit',
    //not translated the term 'logs'
    'manageClub'            => 'Schiffe verwalten',
    'manageJobType'         => 'Diensttypen verwalten', 
    // TODO use Job for Service - german: Dienst maybe change to Shift - Schicht
    
    'manageTemplate'        => 'Vorlagen verwalten',
    
    //create button text
    'createNewEvent'           => 'Neue Fahrt ansagen',
    'createNewSurvey'          => 'Die Mannschaft fragen',
    
    //Member types
    'candidate'             => 'Frischling',
    'veteran'               => 'Seebär',
    'ex-member'             => 'Einbeiniger',
    'active'                => 'Matrose',
    'external'              => 'Landratte',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/scheduleEntryName.blade.php
    'IDoIt'                 => 'Anhoyern!', //Ich mach's!
    
    // /resources/views/partials/scheduleEntryStatus.blade.php
    'jobFree'               => 'Dienst frei',

    // /resources/views/partials/statisticsLeaderboards.blade.php
    'totalShifts'           => 'Flaschen',
    'leaderBoards'          => 'Bestenliste',
    'allClubs'              => 'Alle',

    // /resources/view/partials/statistics/amountOfShiftsDisplay.blade.php
    'shiftsInOtherSection'      => 'Dienste auf anderen Schiffen',
    'shiftsInOwnSection'        => 'Dienste auf eigenem Schiff',

    // /resources/views/partials/clubStatistics.blade.php
    'infoFor'               => 'Thekenrechnung',

    // /resources/views/partials/personalStatistics.blade.php
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/surveyAnswerStatus.blade.php
    //no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/surveyForm.blade.php
    'showOnlyForLoggedInMember' => 'nur für Crewmitglieder sichtbar',
    'showResultsOnlyForCreator' => 'Ergebnisse sind nur für den Umfragenersteller sichtbar',
    'showResultsAfterFillOut'   => 'Ergebnisse sind erst nach dem Ausfüllen sichtbar',
    
    'passwordSetOptional'       => 'Das Setzen eines Passworts ist optional',
    
    //Answer and Question options
    'answerOption'              => 'Antwortmöglichkeit',
    'question'                  => 'Frage',
    
    //Questionoptions
    'freeText'                  => 'Freitext',
    'checkbox'                  => 'Checkbox',
    'dropdown'                  => 'Dropdown',
    
    'required'                  => 'erforderlich',
    'addAnswerOption'           => 'Antwortmöglichkeit hinzufügen',
    'addQuestion'               => 'Frage hinzufügen',
    
       //-----------------------------------------------------------------------------------------------------------
     // /resources/views/partials/clubEventAttendanceList.blade.php
    'sort'                       => 'Sortieren', 
    'sortByName'                 => 'nach dem Namen', 
    'sortByClub'                 => 'nach Schiff', 
    'sortByAttendancestatus'     => 'nach dem Gefangenheitsstatus', 
    
 //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellFull.blade.php
    'hide' => 'Ausblenden',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellHidden.blade.php
    'moreDetailsAfterLogInMessage'      => 'Darüber reden wir erst wenn du an Bord gehst!',
    // 'moreDetailsAfterLogInMessage2'  => 'nach dem Einloggen zugänglich.', 
    // Merged with line above but there is now way to break the line (format is still ok) 
    // ToDo find a solution

    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellProtected.blade.php
    //no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellSurvey.blade.php
    //no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /public/js ToDo add these strings
    // Maybe To do translate Javascript, tricky, " " can throw error messages
    // /public/js/vedst-script.js
    'errorMessageForgotFilter'              => 'Den Filter vergessen! Bitte setze mindestens eine Sektion, der diese Veranstaltung/Aufgabe gezeigt werden soll.',
    'errorMessageEnterPasswordForShiftPlan' => 'Bitte noch das Passwort für diesen Dienstplan eingeben:',
    'shiftTime'                             => 'Deckzeit',
    //'hideTimes' already exists
    
    'weekStart'                             => 'Manendach - Sonnendach',
    'hideTakenShifts'                       => 'Nur FREIe Dienste',
    
    //-----------------------------------------------------------------------------------------------------------
    
    //Controller  ToDo add these strings
    //ScheduleEntryController
    //action description
    'addedComment'              => 'Kommentar hinzugefügt',
    'deletedComment'            => 'Kommentar gelöscht',
    'changedComment'            => 'Kommentar geändert',

    'errorMessageAbortDeletion' => 'Fehler: Löschvorgang abgebrochen - der Dienstplaneintrag existiert nicht.',

    //SurveyController
    'messageSurveyDeleted'      => 'Umfrage gelöscht!',

    //SurveyAnswerController
    'messageSuccessfulVoted'    => 'Erfolgreich abgestimmt!',
    'messageSuccessfulDeleted'  => 'Erfolgreich gelöscht!',

    //-----------------------------------------------------------------------------------------------------------
    
    //placeholder strings (e.g. used in buttons or text fields)
    
    /*
    | instead of { trans('message.key' }} use  Lang::get('message.key') in the view
    */
    
    //ClubEvent
    'addCommentHere'                => 'Blödsinn ausrufen',
    'enterPasswordHere'             => 'Passwort hier eingeben',
    'placeholderTitleWineEvening'   => 'z.B. Weinabend', 
    //'placeholderTitleWineEvening'
    
    'placeholderSubTitleWineEvening'=> 'z.B. Das Leben ist zu kurz, um schlechten Grogg zu trinken',
    //'placeholderSubTitleWineEvening'
    
    'placeholderPublicInfo'         => 'z.B. Karten nur im Vorverkauf',
    'placeholderPrivateDetails'     => 'z.B. DJ-Tisch wird gebraucht',
    
    //Survey
    'addAnswerHere'                 => 'Antwort hier hinzufügen',
    'createSurvey'                  => 'Umfrage erstellen', //Button text
    
    //Partials
    //Navigation
    'clubNumber'                    => 'Matrose',
    'password'                      => 'Das geheime Wort',
    'logIn'                         => 'An Bord gehen',
    'logOut'                        => 'Über Bord gehen',
    //ScheduleEntryName
    '=FREI='                        => '=FREI=', //not used yet
    //surveyForm
    'placeholderSurveyTitle'        => 'Titel:',
    'placeholderTitleSurvey'        => 'z.B. Teilnahme an der Clubfahrt',
    'placeholderDescription'        => 'Beschreibung:',
    'placeholderActiveUntil'        => 'Aktiv bis:',
    
    // Misc.
    'guest'                         => 'Passagier',
    'accessDenied'                  => 'Moment mal... Nur eingeloggte Crewmitglieder mit ausreichendem Rang dürfen hier rein! Logge dich ein, oder komm zur nächsten Versammlung und heuer an.',



    ////////////////
    // Management //
    ////////////////

    'management'                    => 'Verwaltung',
    'jobType'                       => 'Diensttyp',
    'jobtypes'                      => 'Diensttypen',
    'shift'                         => 'Dienst',
    'start'                         => 'Beginn',
    'end'                           => 'Ende',
    'weight'                        => 'Wert',
    'actions'                       => 'Aktionen',
    'deleteConfirmation'            => 'Möchtest du folgenden Diensttyp wirklich löschen:',
    'warningNotReversible'          => 'Diese Aktion kann man nicht rückgängig machen!',
    'editDetails'                   => 'Details anpassen',
    'deleteThisJobtype'             => 'Entfernen',

    'reset'                         => 'Zurücksetzen',
    'update'                        => 'Änderungen speichern',
    'delete'                        => 'löschen',
    'jobtypeNeverUsed'              => 'Dieser Diensttyp wird bei keinem einzigen Event benutzt... Traurig, so was... Vielleicht wäre es sinnvoll, ihn einfach zu',
    'jobtypeUsedInFollowingEvents'  => 'Dieser Dienstyp wird bei folgenden Events eingesetzt. Um ihn zu entfernen, ersetze jede Instanz erst mit einem anderen Diensttyp.',
    'event'                         => 'Event',
    'date'                          => 'Datum',
    'substituteThisInstance'        => 'Ersetzen durch...',

    'cantTouchThis'                 => 'Netter Versuch - du darfst das nicht einfach ändern! Frage die Clubleitung oder Markleting ;)',
    'cantBeBlank'                   => 'Diese Werte dürfen nicht leer sein.',
    'nonNumericStats'               => 'Statistische Wertung muss man mit Ziffern eingeben ;)',
    'negativeStats'                 => 'Statistische Wertung darf nicht negativ sein.',
    'changesSaved'                  => 'Änderungen erfolgreich gespeichert.',
    'deleteFailedJobtypeInUse'      => 'Diensttyp wurde NICHT gelöscht, weil er noch im Einsatz ist. Hier kannst du es ändern.',
    
    
    //////////
    // ICal //
    //////////
    
    'icalfeeds'                     =>  'Kalenderfeed im iCal-Format',
    'publishEvent'                  =>  'Event veröffentlichen',
    'unpublishEvent'                =>  'War alles nur Seemansgarn',
    'createAndPublish'              =>  'Anker los und Angreifen',
    'createUnpublished'             =>  'Leinen los und Schleichfahrt',
    'eventIsPublished'              =>  'Angriff - über diese Fahrt werden Lieder bereits gesungen',
    'eventIsUnpublished'            =>  'Schleichfahrt - dieses Abenteuer wird von Barden nicht erwähnt',
    'confirmPublishingEvent'        =>  'Möchtest du dieses Event wirklich zum Kalenderfeed hinzufügen?',
    'confirmUnpublishingEvent'      =>  'Möchtest du dieses Event aus dem Kalenderfeed wirklich entfernen?',
    'iCal'                          =>  'iCal'

];